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
 * Flughafen
 */
class Flughafen extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * nameAus
     * 
     * @var string
     */
    protected $nameAus = '';

    /**
     * nameAusRu
     * 
     * @var string
     */
    protected $nameAusRu = '';

    /**
     * nm
     * 
     * @var string
     */
    protected $nm = '';

    /**
     * airport
     * 
     * @var int
     */
    protected $airport = 0;

    /**
     * Returns the nameAus
     * 
     * @return string $nameAus
     */
    public function getNameAus()
    {
        return $this->nameAus;
    }

    /**
     * Sets the nameAus
     * 
     * @param string $nameAus
     * @return void
     */
    public function setNameAus($nameAus)
    {
        $this->nameAus = $nameAus;
    }

    /**
     * Returns the nameAusRu
     * 
     * @return string $nameAusRu
     */
    public function getNameAusRu()
    {
        return $this->nameAusRu;
    }

    /**
     * Sets the nameAusRu
     * 
     * @param string $nameAusRu
     * @return void
     */
    public function setNameAusRu($nameAusRu)
    {
        $this->nameAusRu = $nameAusRu;
    }

    /**
     * Returns the nm
     * 
     * @return string $nm
     */
    public function getNm()
    {
        return $this->nm;
    }

    /**
     * Sets the nm
     * 
     * @param string $nm
     * @return void
     */
    public function setNm($nm)
    {
        $this->nm = $nm;
    }

    /**
     * Returns the airport
     * 
     * @return int $airport
     */
    public function getAirport()
    {
        return $this->airport;
    }

    /**
     * Sets the airport
     * 
     * @param int $airport
     * @return void
     */
    public function setAirport($airport)
    {
        $this->airport = $airport;
    }
}
