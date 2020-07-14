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
 * Buchung
 */
class Buchung extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * idUser
     * 
     * @var int
     */
    protected $idUser = 0;

    /**
     * idFahrer
     * 
     * @var int
     */
    protected $idFahrer = 0;

    /**
     * name
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = 0;

    /**
     * nameKunde
     * 
     * @var string
     */
    protected $nameKunde = '';

    /**
     * telefon
     * 
     * @var string
     */
    protected $telefon = '';

    /**
     * telKunde
     * 
     * @var string
     */
    protected $telKunde = '';

    /**
     * email
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $email = '';

    /**
     * emailKunde
     * 
     * @var string
     */
    protected $emailKunde = '';

    /**
     * adresse
     * 
     * @var string
     */
    protected $adresse = '';

    /**
     * staat
     * 
     * @var string
     */
    protected $staat = '';

    /**
     * stadt
     * 
     * @var string
     */
    protected $stadt = '';

    /**
     * plz
     * 
     * @var string
     */
    protected $plz = '';

    /**
     * zeitControl
     * 
     * @var int
     */
    protected $zeitControl = null;

    /**
     * start
     * 
     * @var string
     */
    protected $start = null;

    /**
     * end
     * 
     * @var string
     */
    protected $end = null;

    /**
     * startMkt
     * 
     * @var int
     */
    protected $startMkt = null;

    /**
     * startZuruck
     * 
     * @var string
     */
    protected $startZuruck = null;

    /**
     * endZuruck
     * 
     * @var string
     */
    protected $endZuruck = null;

    /**
     * startZuruckMkt
     * 
     * @var int
     */
    protected $startZuruckMkt = null;

    /**
     * ab
     * 
     * @var int
     */
    protected $ab = null;

    /**
     * abzuruck
     * 
     * @var int
     */
    protected $abzuruck = null;

    /**
     * bis
     * 
     * @var int
     */
    protected $bis = null;

    /**
     * biszuruck
     * 
     * @var int
     */
    protected $biszuruck = null;

    /**
     * von
     * 
     * @var string
     */
    protected $von = '';

    /**
     * vonAdress
     * 
     * @var string
     */
    protected $vonAdress = '';

    /**
     * vonAdressZuruck
     * 
     * @var string
     */
    protected $vonAdressZuruck = '';

    /**
     * nach
     * 
     * @var string
     */
    protected $nach = '';

    /**
     * nachAdress
     * 
     * @var string
     */
    protected $nachAdress = '';

    /**
     * nachAdressZuruck
     * 
     * @var string
     */
    protected $nachAdressZuruck = '';

    /**
     * aid
     * 
     * @var int
     */
    protected $aid = 0;

    /**
     * distance
     * 
     * @var int
     */
    protected $distance = 0;

    /**
     * distanceErw
     * 
     * @var int
     */
    protected $distanceErw = 0;

    /**
     * art
     * 
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $art = 0;

    /**
     * zArt
     * 
     * @var string
     */
    protected $zArt = 0;

    /**
     * back
     * 
     * @var int
     */
    protected $back = 0;

    /**
     * person
     * 
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $person = 0;

    /**
     * koffer
     * 
     * @var int
     */
    protected $koffer = 0;

    /**
     * rentTime
     * 
     * @var int
     */
    protected $rentTime = null;

    /**
     * kindersitz
     * 
     * @var int
     */
    protected $kindersitz = 0;

    /**
     * vonFlug
     * 
     * @var int
     */
    protected $vonFlug = 0;

    /**
     * zurFlug
     * 
     * @var int
     */
    protected $zurFlug = 0;

    /**
     * flugNr
     * 
     * @var string
     */
    protected $flugNr = '';

    /**
     * flugZeit
     * 
     * @var int
     */
    protected $flugZeit = null;

    /**
     * flugNrZuruck
     * 
     * @var string
     */
    protected $flugNrZuruck = '';

    /**
     * flugZeitZuruck
     * 
     * @var int
     */
    protected $flugZeitZuruck = null;

    /**
     * grundpreis
     * 
     * @var float
     */
    protected $grundpreis = 0.0;

    /**
     * summa
     * 
     * @var float
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $summa = 0.0;

    /**
     * provision
     * 
     * @var float
     */
    protected $provision = 0.0;

    /**
     * mwst
     * 
     * @var int
     */
    protected $mwst = 0;

    /**
     * bezahlt
     * 
     * @var float
     */
    protected $bezahlt = 0.0;

    /**
     * vorkasse
     * 
     * @var int
     */
    protected $vorkasse = 0;

    /**
     * schild
     * 
     * @var string
     */
    protected $schild = '';

    /**
     * status
     * 
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $status = 0;

    /**
     * kommentar
     * 
     * @var string
     */
    protected $kommentar = '';

    /**
     * agent
     * 
     * @var int
     */
    protected $agent = 0;

    /**
     * auto
     * 
     * @var \Sdt\TransferMietwagen\Domain\Model\Auto
     */
    protected $auto = null;

    /**
     * Returns the idUser
     * 
     * @return int $idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Sets the idUser
     * 
     * @param int $idUser
     * @return void
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * Returns the idFahrer
     * 
     * @return int $idFahrer
     */
    public function getIdFahrer()
    {
        return $this->idFahrer;
    }

    /**
     * Sets the idFahrer
     * 
     * @param int $idFahrer
     * @return void
     */
    public function setIdFahrer($idFahrer)
    {
        $this->idFahrer = $idFahrer;
    }

    /**
     * Returns the nameKunde
     * 
     * @return string $nameKunde
     */
    public function getNameKunde()
    {
        return $this->nameKunde;
    }

    /**
     * Sets the nameKunde
     * 
     * @param string $nameKunde
     * @return void
     */
    public function setNameKunde($nameKunde)
    {
        $this->nameKunde = $nameKunde;
    }

    /**
     * Returns the telefon
     * 
     * @return string $telefon
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Sets the telefon
     * 
     * @param string $telefon
     * @return void
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    }

    /**
     * Returns the telKunde
     * 
     * @return string $telKunde
     */
    public function getTelKunde()
    {
        return $this->telKunde;
    }

    /**
     * Sets the telKunde
     * 
     * @param string $telKunde
     * @return void
     */
    public function setTelKunde($telKunde)
    {
        $this->telKunde = $telKunde;
    }

    /**
     * Returns the email
     * 
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     * 
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the emailKunde
     * 
     * @return string $emailKunde
     */
    public function getEmailKunde()
    {
        return $this->emailKunde;
    }

    /**
     * Sets the emailKunde
     * 
     * @param string $emailKunde
     * @return void
     */
    public function setEmailKunde($emailKunde)
    {
        $this->emailKunde = $emailKunde;
    }

    /**
     * Returns the adresse
     * 
     * @return string $adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Sets the adresse
     * 
     * @param string $adresse
     * @return void
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * Returns the staat
     * 
     * @return string $staat
     */
    public function getStaat()
    {
        return $this->staat;
    }

    /**
     * Sets the staat
     * 
     * @param string $staat
     * @return void
     */
    public function setStaat($staat)
    {
        $this->staat = $staat;
    }

    /**
     * Returns the stadt
     * 
     * @return string $stadt
     */
    public function getStadt()
    {
        return $this->stadt;
    }

    /**
     * Sets the stadt
     * 
     * @param string $stadt
     * @return void
     */
    public function setStadt($stadt)
    {
        $this->stadt = $stadt;
    }

    /**
     * Returns the plz
     * 
     * @return string $plz
     */
    public function getPlz()
    {
        return $this->plz;
    }

    /**
     * Sets the plz
     * 
     * @param string $plz
     * @return void
     */
    public function setPlz($plz)
    {
        $this->plz = $plz;
    }

    /**
     * Returns the von
     * 
     * @return string $von
     */
    public function getVon()
    {
        return $this->von;
    }

    /**
     * Sets the von
     * 
     * @param string $von
     * @return void
     */
    public function setVon($von)
    {
        $this->von = $von;
    }

    /**
     * Returns the vonAdress
     * 
     * @return string $vonAdress
     */
    public function getVonAdress()
    {
        return $this->vonAdress;
    }

    /**
     * Sets the vonAdress
     * 
     * @param string $vonAdress
     * @return void
     */
    public function setVonAdress($vonAdress)
    {
        $this->vonAdress = $vonAdress;
    }

    /**
     * Returns the vonAdressZuruck
     * 
     * @return string $vonAdressZuruck
     */
    public function getVonAdressZuruck()
    {
        return $this->vonAdressZuruck;
    }

    /**
     * Sets the vonAdressZuruck
     * 
     * @param string $vonAdressZuruck
     * @return void
     */
    public function setVonAdressZuruck($vonAdressZuruck)
    {
        $this->vonAdressZuruck = $vonAdressZuruck;
    }

    /**
     * Returns the nach
     * 
     * @return string $nach
     */
    public function getNach()
    {
        return $this->nach;
    }

    /**
     * Sets the nach
     * 
     * @param string $nach
     * @return void
     */
    public function setNach($nach)
    {
        $this->nach = $nach;
    }

    /**
     * Returns the nachAdress
     * 
     * @return string $nachAdress
     */
    public function getNachAdress()
    {
        return $this->nachAdress;
    }

    /**
     * Sets the nachAdress
     * 
     * @param string $nachAdress
     * @return void
     */
    public function setNachAdress($nachAdress)
    {
        $this->nachAdress = $nachAdress;
    }

    /**
     * Returns the nachAdressZuruck
     * 
     * @return string $nachAdressZuruck
     */
    public function getNachAdressZuruck()
    {
        return $this->nachAdressZuruck;
    }

    /**
     * Sets the nachAdressZuruck
     * 
     * @param string $nachAdressZuruck
     * @return void
     */
    public function setNachAdressZuruck($nachAdressZuruck)
    {
        $this->nachAdressZuruck = $nachAdressZuruck;
    }

    /**
     * Returns the aid
     * 
     * @return int $aid
     */
    public function getAid()
    {
        return $this->aid;
    }

    /**
     * Sets the aid
     * 
     * @param int $aid
     * @return void
     */
    public function setAid($aid)
    {
        $this->aid = $aid;
    }

    /**
     * Returns the distance
     * 
     * @return int $distance
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Sets the distance
     * 
     * @param int $distance
     * @return void
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
    }

    /**
     * Returns the distanceErw
     * 
     * @return int $distanceErw
     */
    public function getDistanceErw()
    {
        return $this->distanceErw;
    }

    /**
     * Sets the distanceErw
     * 
     * @param int $distanceErw
     * @return void
     */
    public function setDistanceErw($distanceErw)
    {
        $this->distanceErw = $distanceErw;
    }

    /**
     * Returns the art
     * 
     * @return int $art
     */
    public function getArt()
    {
        return $this->art;
    }

    /**
     * Sets the art
     * 
     * @param int $art
     * @return void
     */
    public function setArt($art)
    {
        $this->art = $art;
    }

    /**
     * Returns the back
     * 
     * @return int $back
     */
    public function getBack()
    {
        return $this->back;
    }

    /**
     * Sets the back
     * 
     * @param int $back
     * @return void
     */
    public function setBack($back)
    {
        $this->back = $back;
    }

    /**
     * Returns the person
     * 
     * @return int $person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Sets the person
     * 
     * @param int $person
     * @return void
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * Returns the koffer
     * 
     * @return int $koffer
     */
    public function getKoffer()
    {
        return $this->koffer;
    }

    /**
     * Sets the koffer
     * 
     * @param int $koffer
     * @return void
     */
    public function setKoffer($koffer)
    {
        $this->koffer = $koffer;
    }

    /**
     * Returns the kindersitz
     * 
     * @return int $kindersitz
     */
    public function getKindersitz()
    {
        return $this->kindersitz;
    }

    /**
     * Sets the kindersitz
     * 
     * @param int $kindersitz
     * @return void
     */
    public function setKindersitz($kindersitz)
    {
        $this->kindersitz = $kindersitz;
    }

    /**
     * Returns the vonFlug
     * 
     * @return int $vonFlug
     */
    public function getVonFlug()
    {
        return $this->vonFlug;
    }

    /**
     * Sets the vonFlug
     * 
     * @param int $vonFlug
     * @return void
     */
    public function setVonFlug($vonFlug)
    {
        $this->vonFlug = $vonFlug;
    }

    /**
     * Returns the zurFlug
     * 
     * @return int $zurFlug
     */
    public function getZurFlug()
    {
        return $this->zurFlug;
    }

    /**
     * Sets the zurFlug
     * 
     * @param int $zurFlug
     * @return void
     */
    public function setZurFlug($zurFlug)
    {
        $this->zurFlug = $zurFlug;
    }

    /**
     * Returns the flugNr
     * 
     * @return string $flugNr
     */
    public function getFlugNr()
    {
        return $this->flugNr;
    }

    /**
     * Sets the flugNr
     * 
     * @param string $flugNr
     * @return void
     */
    public function setFlugNr($flugNr)
    {
        $this->flugNr = $flugNr;
    }

    /**
     * Returns the flugNrZuruck
     * 
     * @return string $flugNrZuruck
     */
    public function getFlugNrZuruck()
    {
        return $this->flugNrZuruck;
    }

    /**
     * Sets the flugNrZuruck
     * 
     * @param string $flugNrZuruck
     * @return void
     */
    public function setFlugNrZuruck($flugNrZuruck)
    {
        $this->flugNrZuruck = $flugNrZuruck;
    }

    /**
     * Returns the grundpreis
     * 
     * @return float $grundpreis
     */
    public function getGrundpreis()
    {
        return $this->grundpreis;
    }

    /**
     * Sets the grundpreis
     * 
     * @param float $grundpreis
     * @return void
     */
    public function setGrundpreis($grundpreis)
    {
        $this->grundpreis = $grundpreis;
    }

    /**
     * Returns the summa
     * 
     * @return float $summa
     */
    public function getSumma()
    {
        return $this->summa;
    }

    /**
     * Sets the summa
     * 
     * @param float $summa
     * @return void
     */
    public function setSumma($summa)
    {
        $this->summa = $summa;
    }

    /**
     * Returns the provision
     * 
     * @return float $provision
     */
    public function getProvision()
    {
        return $this->provision;
    }

    /**
     * Sets the provision
     * 
     * @param float $provision
     * @return void
     */
    public function setProvision($provision)
    {
        $this->provision = $provision;
    }

    /**
     * Returns the mwst
     * 
     * @return int $mwst
     */
    public function getMwst()
    {
        return $this->mwst;
    }

    /**
     * Sets the mwst
     * 
     * @param int $mwst
     * @return void
     */
    public function setMwst($mwst)
    {
        $this->mwst = $mwst;
    }

    /**
     * Returns the bezahlt
     * 
     * @return float $bezahlt
     */
    public function getBezahlt()
    {
        return $this->bezahlt;
    }

    /**
     * Sets the bezahlt
     * 
     * @param float $bezahlt
     * @return void
     */
    public function setBezahlt($bezahlt)
    {
        $this->bezahlt = $bezahlt;
    }

    /**
     * Returns the vorkasse
     * 
     * @return int $vorkasse
     */
    public function getVorkasse()
    {
        return $this->vorkasse;
    }

    /**
     * Sets the vorkasse
     * 
     * @param int $vorkasse
     * @return void
     */
    public function setVorkasse($vorkasse)
    {
        $this->vorkasse = $vorkasse;
    }

    /**
     * Returns the schild
     * 
     * @return string $schild
     */
    public function getSchild()
    {
        return $this->schild;
    }

    /**
     * Sets the schild
     * 
     * @param string $schild
     * @return void
     */
    public function setSchild($schild)
    {
        $this->schild = $schild;
    }

    /**
     * Returns the status
     * 
     * @return int $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     * 
     * @param int $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Returns the kommentar
     * 
     * @return string $kommentar
     */
    public function getKommentar()
    {
        return $this->kommentar;
    }

    /**
     * Sets the kommentar
     * 
     * @param string $kommentar
     * @return void
     */
    public function setKommentar($kommentar)
    {
        $this->kommentar = $kommentar;
    }

    /**
     * Returns the agent
     * 
     * @return int $agent
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Sets the agent
     * 
     * @param int $agent
     * @return void
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;
    }

    /**
     * Returns the auto
     * 
     * @return \Sdt\TransferMietwagen\Domain\Model\Auto $auto
     */
    public function getAuto()
    {
        return $this->auto;
    }

    /**
     * Sets the auto
     * 
     * @param \Sdt\TransferMietwagen\Domain\Model\Auto $auto
     * @return void
     */
    public function setAuto(\Sdt\TransferMietwagen\Domain\Model\Auto $auto)
    {
        $this->auto = $auto;
    }

    /**
     * Returns the zeitControl
     * 
     * @return int zeitControl
     */
    public function getZeitControl()
    {
        return $this->zeitControl;
    }

    /**
     * Sets the zeitControl
     * 
     * @param $zeitControl
     * @return void
     */
    public function setZeitControl($zeitControl)
    {
        $this->zeitControl = $zeitControl;
    }

    /**
     * Returns the startMkt
     * 
     * @return int startMkt
     */
    public function getStartMkt()
    {
        return $this->startMkt;
    }

    /**
     * Sets the startMkt
     * 
     * @param int $startMkt
     * @return void
     */
    public function setStartMkt($startMkt)
    {
        $this->startMkt = $startMkt;
    }

    /**
     * Returns the startZuruckMkt
     * 
     * @return int startZuruckMkt
     */
    public function getStartZuruckMkt()
    {
        return $this->startZuruckMkt;
    }

    /**
     * Sets the startZuruckMkt
     * 
     * @param $startZuruckMkt
     * @return void
     */
    public function setStartZuruckMkt($startZuruckMkt)
    {
        $this->startZuruckMkt = $startZuruckMkt;
    }

    /**
     * Returns the ab
     * 
     * @return int ab
     */
    public function getAb()
    {
        return $this->ab;
    }

    /**
     * Sets the ab
     * 
     * @param int $ab
     * @return void
     */
    public function setAb($ab)
    {
        $this->ab = $ab;
    }

    /**
     * Returns the abzuruck
     * 
     * @return int abzuruck
     */
    public function getAbzuruck()
    {
        return $this->abzuruck;
    }

    /**
     * Sets the abzuruck
     * 
     * @param $abzuruck
     * @return void
     */
    public function setAbzuruck($abzuruck)
    {
        $this->abzuruck = $abzuruck;
    }

    /**
     * Returns the bis
     * 
     * @return int bis
     */
    public function getBis()
    {
        return $this->bis;
    }

    /**
     * Sets the bis
     * 
     * @param $bis
     * @return void
     */
    public function setBis($bis)
    {
        $this->bis = $bis;
    }

    /**
     * Returns the biszuruck
     * 
     * @return int biszuruck
     */
    public function getBiszuruck()
    {
        return $this->biszuruck;
    }

    /**
     * Sets the biszuruck
     * 
     * @param $biszuruck
     * @return void
     */
    public function setBiszuruck($biszuruck)
    {
        $this->biszuruck = $biszuruck;
    }

    /**
     * Returns the rentTime
     * 
     * @return int rentTime
     */
    public function getRentTime()
    {
        return $this->rentTime;
    }

    /**
     * Sets the rentTime
     * 
     * @param $rentTime
     * @return void
     */
    public function setRentTime($rentTime)
    {
        $this->rentTime = $rentTime;
    }

    /**
     * Returns the flugZeit
     * 
     * @return int flugZeit
     */
    public function getFlugZeit()
    {
        return $this->flugZeit;
    }

    /**
     * Sets the flugZeit
     * 
     * @param $flugZeit
     * @return void
     */
    public function setFlugZeit($flugZeit)
    {
        $this->flugZeit = $flugZeit;
    }

    /**
     * Returns the flugZeitZuruck
     * 
     * @return int flugZeitZuruck
     */
    public function getFlugZeitZuruck()
    {
        return $this->flugZeitZuruck;
    }

    /**
     * Sets the flugZeitZuruck
     * 
     * @param $flugZeitZuruck
     * @return void
     */
    public function setFlugZeitZuruck($flugZeitZuruck)
    {
        $this->flugZeitZuruck = $flugZeitZuruck;
    }

    /**
     * Returns the start
     * 
     * @return string start
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Sets the start
     * 
     * @param string $start
     * @return void
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * Returns the end
     * 
     * @return string end
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Sets the end
     * 
     * @param string $end
     * @return void
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * Returns the startZuruck
     * 
     * @return string startZuruck
     */
    public function getStartZuruck()
    {
        return $this->startZuruck;
    }

    /**
     * Sets the startZuruck
     * 
     * @param string $startZuruck
     * @return void
     */
    public function setStartZuruck($startZuruck)
    {
        $this->startZuruck = $startZuruck;
    }

    /**
     * Returns the endZuruck
     * 
     * @return string endZuruck
     */
    public function getEndZuruck()
    {
        return $this->endZuruck;
    }

    /**
     * Sets the endZuruck
     * 
     * @param string $endZuruck
     * @return void
     */
    public function setEndZuruck($endZuruck)
    {
        $this->endZuruck = $endZuruck;
    }

    /**
     * Returns the name
     * 
     * @return string name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param int $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the zArt
     * 
     * @return string zArt
     */
    public function getZArt()
    {
        return $this->zArt;
    }

    /**
     * Sets the zArt
     * 
     * @param int $zArt
     * @return void
     */
    public function setZArt($zArt)
    {
        $this->zArt = $zArt;
    }
}
