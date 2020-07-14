<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_strecke',
        'label' => 'punkt_a',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'enablecolumns' => [
        ],
        'searchFields' => 'punkt_a,punkt_b',
        'iconfile' => 'EXT:transfer_mietwagen/Resources/Public/Icons/tx_transfermietwagen_domain_model_strecke.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, punkt_a, punkt_b, distance, distance_erw',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, punkt_a, punkt_b, distance, distance_erw'],
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
                'foreign_table' => 'tx_transfermietwagen_domain_model_strecke',
                'foreign_table_where' => 'AND {#tx_transfermietwagen_domain_model_strecke}.{#pid}=###CURRENT_PID### AND {#tx_transfermietwagen_domain_model_strecke}.{#sys_language_uid} IN (-1,0)',
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

        'punkt_a' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_strecke.punkt_a',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'punkt_b' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_strecke.punkt_b',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'distance' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_strecke.distance',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'distance_erw' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_strecke.distance_erw',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
    
    ],
];
