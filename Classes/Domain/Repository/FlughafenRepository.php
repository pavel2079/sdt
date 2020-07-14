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
 * The repository for Stadts
 */
class FlughafenRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    public function getFlughafens()
    {
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('tx_transfermietwagen_domain_model_flughafen');
        $queryBuilder = $connection->createQueryBuilder();
        $query = $queryBuilder->select('*')->from('tx_transfermietwagen_domain_model_flughafen');
        return $query->execute()->fetchAll();
    }

    /**
     * @param $lang
     */
    public function getAirports($lang)
    {
      $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_transfermietwagen_domain_model_flughafen');

      $statement = $queryBuilder->select('*')->from('tx_transfermietwagen_domain_model_flughafen')
                   ->where($queryBuilder->expr()
                   ->eq('sys_language_uid', $queryBuilder->createNamedParameter($lang, \PDO::PARAM_INT)))
                   ->execute()
                   ->fetch();

      return $statement;
    }

}
