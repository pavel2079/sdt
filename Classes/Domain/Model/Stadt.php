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
 * Stadt
 */
class Stadt extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * plz
     * 
     * @var string
     */
    protected $plz = '';

    /**
     * nameStadt
     * 
     * @var string
     */
    protected $nameStadt = '';

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
     * Returns the nameStadt
     * 
     * @return string $nameStadt
     */
    public function getNameStadt()
    {
        return $this->nameStadt;
    }

    /**
     * Sets the nameStadt
     * 
     * @param string $nameStadt
     * @return void
     */
    public function setNameStadt($nameStadt)
    {
        $this->nameStadt = $nameStadt;
    }
}
