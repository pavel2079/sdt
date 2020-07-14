<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Sdt.TransferMietwagen',
            'Buchungtransfer',
            'Transfer Buchung'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Sdt.TransferMietwagen',
            'Transferverwaltung',
            'Transfer Verwaltung'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Sdt.TransferMietwagen',
            'Stadtverwaltung',
            'Stadt Verwaltung'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Sdt.TransferMietwagen',
            'Autopark',
            'Autopark'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('transfer_mietwagen', 'Configuration/TypoScript', 'Transfer und Mietwagen');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_transfermietwagen_domain_model_buchung', 'EXT:transfer_mietwagen/Resources/Private/Language/locallang_csh_tx_transfermietwagen_domain_model_buchung.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_transfermietwagen_domain_model_buchung');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_transfermietwagen_domain_model_stadt', 'EXT:transfer_mietwagen/Resources/Private/Language/locallang_csh_tx_transfermietwagen_domain_model_stadt.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_transfermietwagen_domain_model_stadt');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_transfermietwagen_domain_model_auto', 'EXT:transfer_mietwagen/Resources/Private/Language/locallang_csh_tx_transfermietwagen_domain_model_auto.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_transfermietwagen_domain_model_auto');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_transfermietwagen_domain_model_flughafen', 'EXT:transfer_mietwagen/Resources/Private/Language/locallang_csh_tx_transfermietwagen_domain_model_flughafen.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_transfermietwagen_domain_model_flughafen');

    }
);
