<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung',
        'label' => 'id_user',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
        ],
        'searchFields' => 'name,name_kunde,telefon,tel_kunde,email,email_kunde,adresse,staat,stadt,plz,start,end,start_zuruck,end_zuruck,von,von_adress,von_adress_zuruck,nach,nach_adress,nach_adress_zuruck,z_art,flug_nr,flug_nr_zuruck,schild,kommentar',
        'iconfile' => 'EXT:transfer_mietwagen/Resources/Public/Icons/tx_transfermietwagen_domain_model_buchung.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, id_user, id_fahrer, name, name_kunde, telefon, tel_kunde, email, email_kunde, adresse, staat, stadt, plz, zeit_control, start, end, start_mkt, start_zuruck, end_zuruck, start_zuruck_mkt, ab, abzuruck, bis, biszuruck, von, von_adress, von_adress_zuruck, nach, nach_adress, nach_adress_zuruck, aid, distance, distance_erw, art, z_art, back, person, koffer, rent_time, kindersitz, von_flug, zur_flug, flug_nr, flug_zeit, flug_nr_zuruck, flug_zeit_zuruck, grundpreis, summa, provision, mwst, bezahlt, vorkasse, schild, status, kommentar, agent, auto',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, id_user, id_fahrer, name, name_kunde, telefon, tel_kunde, email, email_kunde, adresse, staat, stadt, plz, zeit_control, start, end, start_mkt, start_zuruck, end_zuruck, start_zuruck_mkt, ab, abzuruck, bis, biszuruck, von, von_adress, von_adress_zuruck, nach, nach_adress, nach_adress_zuruck, aid, distance, distance_erw, art, z_art, back, person, koffer, rent_time, kindersitz, von_flug, zur_flug, flug_nr, flug_zeit, flug_nr_zuruck, flug_zeit_zuruck, grundpreis, summa, provision, mwst, bezahlt, vorkasse, schild, status, kommentar, agent, auto'],
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
                'foreign_table' => 'tx_transfermietwagen_domain_model_buchung',
                'foreign_table_where' => 'AND {#tx_transfermietwagen_domain_model_buchung}.{#pid}=###CURRENT_PID### AND {#tx_transfermietwagen_domain_model_buchung}.{#sys_language_uid} IN (-1,0)',
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

        'id_user' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.id_user',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'id_fahrer' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.id_fahrer',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'name_kunde' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.name_kunde',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'telefon' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.telefon',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'tel_kunde' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.tel_kunde',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'email' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'nospace,email,required'
            ]
        ],
        'email_kunde' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.email_kunde',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'nospace,email'
            ]
        ],
        'adresse' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.adresse',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'staat' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.staat',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'stadt' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.stadt',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'plz' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.plz',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'zeit_control' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.zeit_control',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'start' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.start',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'end' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.end',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'start_mkt' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.start_mkt',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'start_zuruck' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.start_zuruck',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'end_zuruck' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.end_zuruck',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'start_zuruck_mkt' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.start_zuruck_mkt',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'ab' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.ab',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'abzuruck' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.abzuruck',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'bis' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.bis',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'biszuruck' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.biszuruck',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'von' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.von',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'von_adress' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.von_adress',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'von_adress_zuruck' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.von_adress_zuruck',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'nach' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.nach',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'nach_adress' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.nach_adress',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'nach_adress_zuruck' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.nach_adress_zuruck',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'aid' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.aid',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'distance' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.distance',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'distance_erw' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.distance_erw',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'art' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.art',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int,required'
            ]
        ],
        'z_art' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.z_art',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'back' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.back',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'person' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.person',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int,required'
            ]
        ],
        'koffer' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.koffer',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'rent_time' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.rent_time',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'kindersitz' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.kindersitz',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'von_flug' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.von_flug',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'zur_flug' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.zur_flug',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'flug_nr' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.flug_nr',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'flug_zeit' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.flug_zeit',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'flug_nr_zuruck' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.flug_nr_zuruck',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'flug_zeit_zuruck' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.flug_zeit_zuruck',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'grundpreis' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.grundpreis',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'summa' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.summa',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2,required'
            ]
        ],
        'provision' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.provision',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'mwst' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.mwst',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'bezahlt' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.bezahlt',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'vorkasse' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.vorkasse',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'schild' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.schild',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'status' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.status',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int,required'
            ]
        ],
        'kommentar' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.kommentar',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'agent' => [
            'exclude' => false,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.agent',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'auto' => [
            'exclude' => true,
            'label' => 'LLL:EXT:transfer_mietwagen/Resources/Private/Language/locallang_db.xlf:tx_transfermietwagen_domain_model_buchung.auto',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_transfermietwagen_domain_model_auto',
                'minitems' => 0,
                'maxitems' => 1,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],
        ],
    
    ],
];
