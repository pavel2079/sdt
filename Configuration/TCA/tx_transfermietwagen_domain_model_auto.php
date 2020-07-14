<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto',
        'label' => 'adm_name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'adm_name,kurz_name,klass,tab,name,beschreibung,beschreibung_ru,beschreibung_en,img,img_big',
        'iconfile' => 'EXT:transfer_mietwagen/Resources/Public/Icons/tx_transfermietwagen_domain_model_auto.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, adm_name, kurz_name, klass, tab, name, max_person, max_koffer, preis, koef20b40, koef40b50, koef50b70, koef70b100, koef100, beschreibung, beschreibung_ru, beschreibung_en, prov_pausch, prov_proz, img, img_big, tr_preis',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, adm_name, kurz_name, klass, tab, name, max_person, max_koffer, preis, koef20b40, koef40b50, koef50b70, koef70b100, koef100, beschreibung, beschreibung_ru, beschreibung_en, prov_pausch, prov_proz, img, img_big, tr_preis'],
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
                'foreign_table' => 'tx_transfermietwagen_domain_model_auto',
                'foreign_table_where' => 'AND {#tx_transfermietwagen_domain_model_auto}.{#pid}=###CURRENT_PID### AND {#tx_transfermietwagen_domain_model_auto}.{#sys_language_uid} IN (-1,0)',
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
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],

        'adm_name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.adm_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'kurz_name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.kurz_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'klass' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.klass',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'tab' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.tab',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'max_person' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.max_person',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int,required'
            ]
        ],
        'max_koffer' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.max_koffer',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int,required'
            ]
        ],
        'preis' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.preis',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int,required'
            ]
        ],
        'koef20b40' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.koef20b40',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'koef40b50' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.koef40b50',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'koef50b70' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.koef50b70',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'koef70b100' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.koef70b100',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'koef100' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.koef100',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'beschreibung' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.beschreibung',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'beschreibung_ru' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.beschreibung_ru',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'beschreibung_en' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.beschreibung_en',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'prov_pausch' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.prov_pausch',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'prov_proz' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.prov_proz',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'img' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.img',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'img_big' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.img_big',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'tr_preis' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_auto.tr_preis',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
    
    ],
];
