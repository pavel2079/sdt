<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Sdt.TransferMietwagen',
            'Buchungtransfer',
            [
                'Buchung' => 'mainFormular, showStrecke, formTransfer, formMietwagen, reservierung, bestatigung'
            ],
            // non-cacheable actions
            [
                'Buchung' => 'mainFormular, showStrecke, formTransfer, formMietwagen, reservierung, bestatigung'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Sdt.TransferMietwagen',
            'Transferverwaltung',
            [
                'Buchung' => 'list, show, edit, delete, editZahlung, editStrecke, provision, leistungen, besteller, fahrer'
            ],
            // non-cacheable actions
            [
                'Buchung' => 'list, show, edit, delete, editZahlung, editStrecke, provision, leistungen, besteller, fahrer'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Sdt.TransferMietwagen',
            'Stadtverwaltung',
            [
                'Stadt' => 'list, new, delete'
            ],
            // non-cacheable actions
            [
                'Stadt' => 'list, new, delete'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Sdt.TransferMietwagen',
            'Autopark',
            [
                'Auto' => 'list, show, new, edit, delete'
            ],
            // non-cacheable actions
            [
                'Auto' => 'list, show, new, edit, delete'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    buchungtransfer {
                        iconIdentifier = transfer_mietwagen-plugin-buchungtransfer
                        title = LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfer_mietwagen_buchungtransfer.name
                        description = LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfer_mietwagen_buchungtransfer.description
                        tt_content_defValues {
                            CType = list
                            list_type = transfermietwagen_buchungtransfer
                        }
                    }
                    transferverwaltung {
                        iconIdentifier = transfer_mietwagen-plugin-transferverwaltung
                        title = LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfer_mietwagen_transferverwaltung.name
                        description = LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfer_mietwagen_transferverwaltung.description
                        tt_content_defValues {
                            CType = list
                            list_type = transfermietwagen_transferverwaltung
                        }
                    }
                    stadtverwaltung {
                        iconIdentifier = transfer_mietwagen-plugin-stadtverwaltung
                        title = LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfer_mietwagen_stadtverwaltung.name
                        description = LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfer_mietwagen_stadtverwaltung.description
                        tt_content_defValues {
                            CType = list
                            list_type = transfermietwagen_stadtverwaltung
                        }
                    }
                    autopark {
                        iconIdentifier = transfer_mietwagen-plugin-autopark
                        title = LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfer_mietwagen_autopark.name
                        description = LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfer_mietwagen_autopark.description
                        tt_content_defValues {
                            CType = list
                            list_type = transfermietwagen_autopark
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

			$iconRegistry->registerIcon(
				'transfer_mietwagen-plugin-buchungtransfer',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:transfer_mietwagen/Resources/Public/Icons/user_plugin_buchungtransfer.svg']
			);

			$iconRegistry->registerIcon(
				'transfer_mietwagen-plugin-transferverwaltung',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:transfer_mietwagen/Resources/Public/Icons/user_plugin_transferverwaltung.svg']
			);

			$iconRegistry->registerIcon(
				'transfer_mietwagen-plugin-stadtverwaltung',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:transfer_mietwagen/Resources/Public/Icons/user_plugin_stadtverwaltung.svg']
			);

			$iconRegistry->registerIcon(
				'transfer_mietwagen-plugin-autopark',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:transfer_mietwagen/Resources/Public/Icons/user_plugin_autopark.svg']
			);

    }
);
