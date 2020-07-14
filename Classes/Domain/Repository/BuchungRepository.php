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
 * The repository for Buchungs
 */
class BuchungRepository extends Repository
{
    public function getKode()
    {
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable('country_phone_code');
        $queryBuilder = $connection->createQueryBuilder();
        $query = $queryBuilder->select('*')->from('country_phone_code');
        return $query->execute()->fetchAll();
    }

    /**
     * @param $uid
     */
    public function getUser($uid)
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('fe_users');
        $statement = $queryBuilder->select('*')->from('fe_users')->where($queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($uid, \PDO::PARAM_INT)))->execute()->fetch();
        return $statement;
    }
}
