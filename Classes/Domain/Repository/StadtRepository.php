<?php
namespace Sdt\TransferMietwagen\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

//use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
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
 * The repository for Stadts
 */
class StadtRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @param $from
     * @param $to
     * @param $back
     */
    public function createStrecke($from, $to, $back)
    {
        $sprache = 'de';
        $massFromLeft = explode('(', trim($from));
        $massFromRight = explode(')', $massFromLeft[1]);
        $indexFrom = $massFromRight[0];
        if ($indexFrom && iconv_strlen($indexFrom) > 6) {
            $punktA = $indexFrom;
        } else {
            $punktA = trim($massFromLeft[0]);
        }
        $massToLeft = explode('(', trim($to));
        $massToRight = explode(')', $massToLeft[1]);
        $indexTo = $massToRight[0];
        if ($indexTo && iconv_strlen($indexTo) > 6) {
            $punktB = $indexTo;
        } else {
            $punktB = trim($massToLeft[0]);
        }

        ## Ausnahme
        if ($punktA == 'Frankfurt Airport') {
            $punktA = 'DE-60547';
        }
        if ($punktB == 'Frankfurt Airport') {
            $punktB = 'DE-60547';
        }
        if ($punktA == 'Frankfurt am Main City') {
            $punktA = 'DE-60329';
        }
        if ($punktB == 'Frankfurt am Main City') {
            $punktB = 'DE-60329';
        }
        if ($punktA == 'Hahn Airport') {
            $punktA = 'DE-55483';
        }
        if ($punktB == 'Hahn Airport') {
            $punktB = 'DE-55483';
        }
        if ($punktA == 'Hannover Airport') {
            $punktA = 'DE-30855';
        }
        if ($punktB == 'Hannover Airport') {
            $punktB = 'DE-30855';
        }
        if ($punktA == 'Düsseldorf Airport') {
            $punktA = 'DE-40474';
        }
        if ($punktB == 'Düsseldorf Airport') {
            $punktB = 'DE-40474';
        }
        $arrStrecke = array(
        'origin' => $punktA,
        'destination' => $punktB
        );
        $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&language=" . $sprache . "&origins=" . $punktA . "&destinations=" . $punktB . "&key=AIzaSyCvvm7iXZibbQaPtMTrGwCaBXYtcTQKjYY");
        $data = json_decode($api);
        $entfernung = (int) $data->rows[0]->elements[0]->distance->value / 1000;
        $arrStrecke['entfernung'] = round($entfernung);
        $arrStrecke['dauer'] = $data->rows[0]->elements[0]->duration->text;
        if (!$entfernung) {
            $arrStrecke['err'] = ' Fehler bei Angabe der Abholort/Zielort. Sie müssen aus Dropdown-Liste eine Ort auswählen.';
        } else {
            $arrStrecke['err'] = '';
        }
        if (!$err) {

            ## вычисляем расстояния от автопарка до начального пункта
            $park = 'DE-65396';

            ## von Walluf (Dreieck)
            $api2 = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&language=" . $sprache . "&origins=" . $park . "&destinations=" . $punktA . "&key=AIzaSyCvvm7iXZibbQaPtMTrGwCaBXYtcTQKjYY");
            $data2 = json_decode($api2);
            $entfernung2 = (int) $data2->rows[0]->elements[0]->distance->value / 1000;
            $arrStrecke['entfernung_2'] = round($entfernung2);

            ## вычисляем расстояния от конечного пункта до автопарка
            $api3 = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&language=" . $sprache . "&origins=" . $punktB . "&destinations=" . $park . "&key=AIzaSyCvvm7iXZibbQaPtMTrGwCaBXYtcTQKjYY");
            $data3 = json_decode($api3);
            $entfernung3 = (int) $data3->rows[0]->elements[0]->distance->value / 1000;
            $arrStrecke['entfernung_3'] = round($entfernung3);
        }
        $arrStrecke['hinMitWaluf'] = $arrStrecke['entfernung_2'] + $arrStrecke['entfernung'] + $arrStrecke['entfernung_3'];

        ## Если туда и обратно, то умножаем на 2
        if ($back) {
            $arrStrecke['gesamtKM'] = 2 * $arrStrecke['hinMitWaluf'];
            $arrStrecke['back'] = $back;
        } else {
            $arrStrecke['gesamtKM'] = $arrStrecke['hinMitWaluf'];
            $arrStrecke['back'] = 0;
        }
        if (!$arrStrecke['gesamtKM']) {
            $arrStrecke['err'] .= ' Es gibt keine Strecke mit angegebenen Städten. Versuchen Sie bitte mit anderen Städten anzugeben!';
        }
        return $arrStrecke;
    }


    public function getStadts()
    {
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('tx_transfermietwagen_domain_model_stadt');
        $queryBuilder = $connection->createQueryBuilder();
        $query = $queryBuilder->select('*')->from('tx_transfermietwagen_domain_model_stadt');
        return $query->execute()->fetchAll();
    }
}
