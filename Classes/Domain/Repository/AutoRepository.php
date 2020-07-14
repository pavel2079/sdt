<?php
namespace Sdt\TransferMietwagen\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

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
 * The repository for Autos
 */
class AutoRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @param $arrStrecke
     */
    public function findAllMitTransferPreise($arrStrecke)
    {
        $arrAutos = $this->getAutos();
        $arrNewAutos = array();

        foreach ($arrAutos as $auto) {
            if ($arrStrecke['hinMitWaluf'] <= 40) {
                $preis = round($arrStrecke['gesamtKM'] * $auto['koef20b40']);
            }
            if ($arrStrecke['hinMitWaluf'] > 40 && $arrStrecke['entfernung'] <= 50) {
                $preis = round($arrStrecke['gesamtKM'] * $auto['koef40b50']);
            }
            if ($arrStrecke['hinMitWaluf'] > 50 && $arrStrecke['entfernung'] <= 70) {
                $preis = round($arrStrecke['gesamtKM'] * $auto['koef50b70']);
            }
            if ($arrStrecke['hinMitWaluf'] > 70 && $arrStrecke['entfernung'] <= 100) {
                $preis = round($arrStrecke['gesamtKM'] * $auto['koef70b100']);
            }
            if ($arrStrecke['hinMitWaluf'] > 100) {
                $preis = round($arrStrecke['gesamtKM'] * $auto['koef100']);
            }

            if ($preis) {
                  $auto['trPreis'] = $preis;    //$auto->setTrPreis($preis);
            } else {
                $auto['trPreis'] = 0;  // $auto->setTrPreis(0);
            }

            $arrNewAutos[] = $auto;
        }

        return $arrNewAutos;
    }


    public function getAutos()
    {
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('tx_transfermietwagen_domain_model_auto');
        $queryBuilder = $connection->createQueryBuilder();
        $query = $queryBuilder->select('*')->from('tx_transfermietwagen_domain_model_auto');
        return $query->execute()->fetchAll();
    }
}
