<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_dlaccounting_domain_model_bankaccount'] = array(
	'ctrl' => $TCA['tx_dlaccounting_domain_model_bankaccount']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, first_name, last_name, city, account_no, bank_code, user, payment_comment',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, first_name, last_name, city, account_no, bank_code, user, payment_comment--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_dlaccounting_domain_model_bankaccount',
				'foreign_table_where' => 'AND tx_dlaccounting_domain_model_bankaccount.pid=###CURRENT_PID### AND tx_dlaccounting_domain_model_bankaccount.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'first_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:dl_accounting/Resources/Private/Language/locallang_db.xml:tx_dlaccounting_domain_model_bankaccount.first_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'last_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:dl_accounting/Resources/Private/Language/locallang_db.xml:tx_dlaccounting_domain_model_bankaccount.last_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'city' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:dl_accounting/Resources/Private/Language/locallang_db.xml:tx_dlaccounting_domain_model_bankaccount.city',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'account_no' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:dl_accounting/Resources/Private/Language/locallang_db.xml:tx_dlaccounting_domain_model_bankaccount.account_no',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'bank_code' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:dl_accounting/Resources/Private/Language/locallang_db.xml:tx_dlaccounting_domain_model_bankaccount.bank_code',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'user' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:dl_accounting/Resources/Private/Language/locallang_db.xml:tx_dlaccounting_domain_model_bankaccount.user',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'fe_users',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapse' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'payment_comment' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:dl_accounting/Resources/Private/Language/locallang_db.xml:tx_dlaccounting_domain_model_bankaccount.paymentComment',
			'config' => array(
				'type' => 'input',
				'size' => 50,
				'eval' => 'trim'
			),
		),
	),
);

?>