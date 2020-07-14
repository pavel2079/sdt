<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_stadt',
        'label' => 'plz',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'enablecolumns' => [
        ],
        'searchFields' => 'plz,name_stadt',
        'iconfile' => 'EXT:transfer_mietwagen/Resources/Public/Icons/tx_transfermietwagen_domain_model_stadt.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, plz, name_stadt',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, plz, name_stadt'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_transfermietwagen_domain_model_stadt',
                'foreign_table_where' => 'AND {#tx_transfermietwagen_domain_model_stadt}.{#pid}=###CURRENT_PID### AND {#tx_transfermietwagen_domain_model_stadt}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],

        'plz' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_stadt.plz',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'name_stadt' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_stadt.name_stadt',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
    
    ],
];
