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
 * Auto
 */
class Auto extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * admName
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $admName = '';

    /**
     * kurzName
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $kurzName = '';

    /**
     * klass
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $klass = '';

    /**
     * tab
     * 
     * @var string
     */
    protected $tab = '';

    /**
     * name
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * maxPerson
     * 
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $maxPerson = 0;

    /**
     * maxKoffer
     * 
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $maxKoffer = 0;

    /**
     * preis
     * 
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $preis = 0;

    /**
     * koef20b40
     * 
     * @var float
     */
    protected $koef20b40 = 0.0;

    /**
     * koef40b50
     * 
     * @var float
     */
    protected $koef40b50 = 0.0;

    /**
     * koef50b70
     * 
     * @var float
     */
    protected $koef50b70 = 0.0;

    /**
     * koef70b100
     * 
     * @var float
     */
    protected $koef70b100 = 0.0;

    /**
     * koef100
     * 
     * @var float
     */
    protected $koef100 = 0.0;

    /**
     * beschreibung
     * 
     * @var string
     */
    protected $beschreibung = '';

    /**
     * beschreibungRu
     * 
     * @var string
     */
    protected $beschreibungRu = '';

    /**
     * beschreibungEn
     * 
     * @var string
     */
    protected $beschreibungEn = '';

    /**
     * provPausch
     * 
     * @var int
     */
    protected $provPausch = 0;

    /**
     * provProz
     * 
     * @var int
     */
    protected $provProz = 0;

    /**
     * img
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $img = '';

    /**
     * imgBig
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $imgBig = '';

    /**
     * Dinamische Preise des Transfers
     * 
     * @var int
     */
    protected $trPreis = 0;

    /**
     * Returns the admName
     * 
     * @return string $admName
     */
    public function getAdmName()
    {
        return $this->admName;
    }

    /**
     * Sets the admName
     * 
     * @param string $admName
     * @return void
     */
    public function setAdmName($admName)
    {
        $this->admName = $admName;
    }

    /**
     * Returns the kurzName
     * 
     * @return string $kurzName
     */
    public function getKurzName()
    {
        return $this->kurzName;
    }

    /**
     * Sets the kurzName
     * 
     * @param string $kurzName
     * @return void
     */
    public function setKurzName($kurzName)
    {
        $this->kurzName = $kurzName;
    }

    /**
     * Returns the klass
     * 
     * @return string $klass
     */
    public function getKlass()
    {
        return $this->klass;
    }

    /**
     * Sets the klass
     * 
     * @param string $klass
     * @return void
     */
    public function setKlass($klass)
    {
        $this->klass = $klass;
    }

    /**
     * Returns the tab
     * 
     * @return string $tab
     */
    public function getTab()
    {
        return $this->tab;
    }

    /**
     * Sets the tab
     * 
     * @param string $tab
     * @return void
     */
    public function setTab($tab)
    {
        $this->tab = $tab;
    }

    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the maxPerson
     * 
     * @return int $maxPerson
     */
    public function getMaxPerson()
    {
        return $this->maxPerson;
    }

    /**
     * Sets the maxPerson
     * 
     * @param int $maxPerson
     * @return void
     */
    public function setMaxPerson($maxPerson)
    {
        $this->maxPerson = $maxPerson;
    }

    /**
     * Returns the maxKoffer
     * 
     * @return int $maxKoffer
     */
    public function getMaxKoffer()
    {
        return $this->maxKoffer;
    }

    /**
     * Sets the maxKoffer
     * 
     * @param int $maxKoffer
     * @return void
     */
    public function setMaxKoffer($maxKoffer)
    {
        $this->maxKoffer = $maxKoffer;
    }

    /**
     * Returns the preis
     * 
     * @return int $preis
     */
    public function getPreis()
    {
        return $this->preis;
    }

    /**
     * Sets the preis
     * 
     * @param int $preis
     * @return void
     */
    public function setPreis($preis)
    {
        $this->preis = $preis;
    }

    /**
     * Returns the koef20b40
     * 
     * @return float $koef20b40
     */
    public function getKoef20b40()
    {
        return $this->koef20b40;
    }

    /**
     * Sets the koef20b40
     * 
     * @param float $koef20b40
     * @return void
     */
    public function setKoef20b40($koef20b40)
    {
        $this->koef20b40 = $koef20b40;
    }

    /**
     * Returns the koef40b50
     * 
     * @return float $koef40b50
     */
    public function getKoef40b50()
    {
        return $this->koef40b50;
    }

    /**
     * Sets the koef40b50
     * 
     * @param float $koef40b50
     * @return void
     */
    public function setKoef40b50($koef40b50)
    {
        $this->koef40b50 = $koef40b50;
    }

    /**
     * Returns the koef50b70
     * 
     * @return float $koef50b70
     */
    public function getKoef50b70()
    {
        return $this->koef50b70;
    }

    /**
     * Sets the koef50b70
     * 
     * @param float $koef50b70
     * @return void
     */
    public function setKoef50b70($koef50b70)
    {
        $this->koef50b70 = $koef50b70;
    }

    /**
     * Returns the koef70b100
     * 
     * @return float $koef70b100
     */
    public function getKoef70b100()
    {
        return $this->koef70b100;
    }

    /**
     * Sets the koef70b100
     * 
     * @param float $koef70b100
     * @return void
     */
    public function setKoef70b100($koef70b100)
    {
        $this->koef70b100 = $koef70b100;
    }

    /**
     * Returns the koef100
     * 
     * @return float $koef100
     */
    public function getKoef100()
    {
        return $this->koef100;
    }

    /**
     * Sets the koef100
     * 
     * @param float $koef100
     * @return void
     */
    public function setKoef100($koef100)
    {
        $this->koef100 = $koef100;
    }

    /**
     * Returns the beschreibung
     * 
     * @return string $beschreibung
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

    /**
     * Sets the beschreibung
     * 
     * @param string $beschreibung
     * @return void
     */
    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;
    }

    /**
     * Returns the beschreibungRu
     * 
     * @return string $beschreibungRu
     */
    public function getBeschreibungRu()
    {
        return $this->beschreibungRu;
    }

    /**
     * Sets the beschreibungRu
     * 
     * @param string $beschreibungRu
     * @return void
     */
    public function setBeschreibungRu($beschreibungRu)
    {
        $this->beschreibungRu = $beschreibungRu;
    }

    /**
     * Returns the beschreibungEn
     * 
     * @return string $beschreibungEn
     */
    public function getBeschreibungEn()
    {
        return $this->beschreibungEn;
    }

    /**
     * Sets the beschreibungEn
     * 
     * @param string $beschreibungEn
     * @return void
     */
    public function setBeschreibungEn($beschreibungEn)
    {
        $this->beschreibungEn = $beschreibungEn;
    }

    /**
     * Returns the provPausch
     * 
     * @return int $provPausch
     */
    public function getProvPausch()
    {
        return $this->provPausch;
    }

    /**
     * Sets the provPausch
     * 
     * @param int $provPausch
     * @return void
     */
    public function setProvPausch($provPausch)
    {
        $this->provPausch = $provPausch;
    }

    /**
     * Returns the provProz
     * 
     * @return int $provProz
     */
    public function getProvProz()
    {
        return $this->provProz;
    }

    /**
     * Sets the provProz
     * 
     * @param int $provProz
     * @return void
     */
    public function setProvProz($provProz)
    {
        $this->provProz = $provProz;
    }

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
    }

    /**
     * Returns the img
     * 
     * @return string $img
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Sets the img
     * 
     * @param string $img
     * @return void
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * Returns the imgBig
     * 
     * @return string $imgBig
     */
    public function getImgBig()
    {
        return $this->imgBig;
    }

    /**
     * Sets the imgBig
     * 
     * @param string $imgBig
     * @return void
     */
    public function setImgBig($imgBig)
    {
        $this->imgBig = $imgBig;
    }

    /**
     * Returns the trPreis
     * 
     * @return int $trPreis
     */
    public function getTrPreis()
    {
        return $this->trPreis;
    }

    /**
     * Sets the trPreis
     * 
     * @param int $trPreis
     * @return void
     */
    public function setTrPreis($trPreis)
    {
        $this->trPreis = $trPreis;
    }
}
