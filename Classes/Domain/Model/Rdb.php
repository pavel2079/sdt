<?php
namespace Sdt\TransferMietwagen\Domain\Model;


/***
 *
 * This file is part of the "Transfer und Mietwagen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Stolberg <p.stolberg@gmx.de>
 *
 ***/
/**
 * Rdb
 */
class Rdb {


    private $con = false; // Идентификатор
    private $Queryes = 0; // Число запросов
    private $MySQLErrors = array(); // Массив с ошибками
    private $TimeQuery = 0; // Всемя запросов
    private $MaxExTime = 0; // Максимальное время за 1 запрос
    private $ListQueryes = ""; // Список запросов
    private $HardQuery = ""; // Самый тяжелый запрос
    private $LastQuery = false; // Ресурс запрос
    private $ConnectData = array(); // Данные соединения


    /*======================================================================*\
    Function:	__construct
    Descriiption: Выполняется при создании экземпляра класса
    \*======================================================================*/
    public function __construct($host, $user, $pass, $base){
        $this->Connect($host, $user, $pass, $base);
        $this->query("SET NAMES 'utf8'");
        $this->query("SET CHARACTER SET 'utf8'");
    }

    /*======================================================================*\
    Function:	Stats
    Descriiption: Возвращает статистику по запросам
    \*======================================================================*/
    public function Stats(){

        $sD = array();
        $sD["TimeQuery"] = $this->TimeQuery;
        $sD["MaxExTime"] = $this->MaxExTime;
        $sD["ListQueryes"] = $this->ListQueryes;
        $sD["HardQuery"] = $this->HardQuery;
        $sD["Queryes"] = $this->Queryes;
        return $sD;
    }

    /*======================================================================*\
    Function:	GetError
    Descriiption: Выводит описание ошибки в поток
    \*======================================================================*/
    private function GetError($TextError){
        $this->MySQLErrors[] = $TextError;
        die($TextError);
    }


    /*======================================================================*\
    Function:	query
    Descriiption: Запрос
    \*======================================================================*/
    public function query($query, $FreeMemory = false, $write_last = true){

        $TimeA = $this->get_time();
        $xxt_res = mysqli_query($this->con, $query) or $this->GetError(mysqli_error($this->con));

        if($write_last) $this->LastQuery = $xxt_res;

        $TimeB = $this->get_time() - $TimeA;
        $this->TimeQuery += $TimeB;

        if($TimeB > $this->MaxExTime){$this->HardQuery = $query; $this->MaxExTime = $TimeB;}

        if( empty($this->ListQueryes) ) $this->ListQueryes = $query; else $this->ListQueryes .= "\n".$query;

        $this->Queryes++;

        if(!$FreeMemory){
            return $this->LastQuery;
        }else return $this->FreeMemory();


    }

    /*======================================================================*\
    Function:	Connect
    Descriiption: Соединяется с ДБ
    \*======================================================================*/
    private function Connect($host, $user, $pass, $base){
        $this->con =  @mysqli_connect($host, $user, $pass, $base) or $this->GetError(mysqli_connect_error());
    }


    /*======================================================================*\
    Function:	MultiQuery
    Descriiption: Множественный запрос
    \*======================================================================*/
    function MultiQuery($query){

        $TimeA = $this->get_time();

        mysqli_multi_query($this->con, $query) or $this->GetError(mysqli_connect_error());
        $TimeB = $this->get_time() - $TimeA;
        $ret_data = array();
        $counter = 0;
        do{

            if ($result = mysqli_store_result($this->con)) {

                while ($row = mysqli_fetch_array($result)) {
                    $ret_data[$counter][] = $row;
                }
                mysqli_free_result($result);
                $counter++;
            }


        }while(mysqli_next_result($this->con));



        $this->TimeQuery += $TimeB;

        if($TimeB > $this->MaxExTime){$this->HardQuery = $query; $this->MaxExTime = $TimeB;}

        if( empty($this->ListQueryes) ) $this->ListQueryes = $query; else $this->ListQueryes .= "\n".$query;

        $this->Queryes++;

        return $ret_data;
    }

    /*======================================================================*\
    Function:	get_time
    Descriiption: Возвращает строку времени
    \*======================================================================*/
    private function get_time()
    {
        list($seconds, $microSeconds) = explode(' ', microtime());
        return ((float) $seconds + (float) $microSeconds);
    }

    /*======================================================================*\
    Function:	__destruct
    Descriiption: Выполняется при уничтожении экземпляра класса
    \*======================================================================*/
    function __destruct(){

        if( !count($this->MySQLErrors) ) mysqli_close($this->con);

    }

    /*======================================================================*\
    Function:	FreeMemory
    Descriiption: Освобождает память
    \*======================================================================*/
    function FreeMemory()
    {
        $tr = ($this->LastQuery) ? true : false;
        @mysqli_free_result($this->LastQuery);
        return $tr;
    }

    /*======================================================================*\
    Function:	RealEscape
    Descriiption: Фильтрация )
    \*======================================================================*/
    function RealEscape($string)
    {
        if ($this->con) return mysqli_real_escape_string ($this->con, $string);
        else return mysql_escape_string($string);
    }

    /*======================================================================*\
    Function:	NumRows
    Descriiption: Подсчет числа строк
    \*======================================================================*/
    function NumRows()
    {
        return mysqli_num_rows($this->LastQuery);
    }

    /*======================================================================*\
    Function:	fetch_array
    Descriiption: Возвращ массив, создает циферные ключи...
    \*======================================================================*/
    function FetchArray(){
        //if($this->LastQuery)
        return mysqli_fetch_array($this->LastQuery);
    }

    /*======================================================================*\
    Function:	NumRows
    Descriiption: Возвращает результат
    \*======================================================================*/
    function FetchRow(){
        $xres = mysqli_fetch_row($this->LastQuery);

        return (count($xres) > 1) ? $xres :  $xres[0];
    }


    /*======================================================================*\
    Function:	FinStats
    Descriiption: Запись в финансовую статистику
    \*======================================================================*/
    function FinStats($user_id, $user, $sum, $type, $comment){

        $da = time();
        $dd = $da + 60*60*24*180;
        $type = ($type == "+") ? 1 : 2;
        $comment = $this->RealEscape($comment);
        $sum = (float)sprintf("%.2f",$sum);

        $this->Query("INSERT INTO db_finstory (user, user_id, sum, plus, comment, date_add, date_del) VALUES ('$user','$user_id','$sum','$type','$comment','$da','$dd')");

    }

    /*======================================================================*\
    Function:	LastInsert()
    Descriiption: Возвращает последний ID вставки
    \*======================================================================*/
    function LastInsert(){

        return @mysqli_insert_id($this->con);

    }


    /*======================================================================*\
    Function:	alle_mensch()
    Descriiption: Возвращает количество человек в личной структуре в глубину
    \*======================================================================*/
    function alle_mensch($num_mat){

        $this->Query("SELECT * FROM db_matrix WHERE id = '$num_mat'");
        $unten_data = $this->FetchArray();

        $all = $all + $unten_data['all_users']-1;

        // для первого нельзя- зацикливание и нет необходимости, так как текущая матрица и есть матрица 1-го
        if ($unten_data['user_id_2']) {
            $this->Query("SELECT current_mat_{$unten_data['plan']} FROM db_users_b WHERE id = '".$unten_data['user_id_2']."'");
            $num_mat_2 = $this->FetchRow();
            if ($num_mat_2) $all = $all + $this->alle_mensch($num_mat_2);
        }

        if ($unten_data['user_id_3']) {
            $this->Query("SELECT current_mat_{$unten_data['plan']} FROM db_users_b WHERE id = '".$unten_data['user_id_3']."'");
            $num_mat_3 = $this->FetchRow();
            if ($num_mat_3) $all = $all + $this->alle_mensch($num_mat_3);
        }

        if ($unten_data['user_id_4']) {
            $this->Query("SELECT current_mat_{$unten_data['plan']} FROM db_users_b WHERE id = '".$unten_data['user_id_4']."'");
            $num_mat_4 = $this->FetchRow();
            if ($num_mat_4) $all = $all + $this->alle_mensch($num_mat_4);
        }

        if ($unten_data['user_id_5']) {
            $this->Query("SELECT current_mat_{$unten_data['plan']} FROM db_users_b WHERE id = '".$unten_data['user_id_5']."'");
            $num_mat_5 = $this->FetchRow();
            if ($num_mat_5) $all = $all + $this->alle_mensch($num_mat_5);
        }

        if ($unten_data['user_id_6']) {
            $this->Query("SELECT current_mat_{$unten_data['plan']} FROM db_users_b WHERE id = '".$unten_data['user_id_6']."'");
            $num_mat_6 = $this->FetchRow();
            if ($num_mat_6) $all = $all + $this->alle_mensch($num_mat_6);
        }

        if ($unten_data['user_id_7']) {
            $this->Query("SELECT current_mat_{$unten_data['plan']} FROM db_users_b WHERE id = '".$unten_data['user_id_7']."'");
            $num_mat_7 = $this->FetchRow();
            if ($num_mat_7) $all = $all + $this->alle_mensch($num_mat_7);
        }
        return $all;
    }

}