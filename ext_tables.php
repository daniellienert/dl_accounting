<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Acc',
	'Accounting'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Accounting module');

			t3lib_extMgm::addLLrefForTCAdescr('tx_dlaccounting_domain_model_bill', 'EXT:dl_accounting/Resources/Private/Language/locallang_csh_tx_dlaccounting_domain_model_bill.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_dlaccounting_domain_model_bill');
			$TCA['tx_dlaccounting_domain_model_bill'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:dl_accounting/Resources/Private/Language/locallang_db.xml:tx_dlaccounting_domain_model_bill',
					'label' => 'user',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Bill.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_dlaccounting_domain_model_bill.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_dlaccounting_domain_model_bankaccount', 'EXT:dl_accounting/Resources/Private/Language/locallang_csh_tx_dlaccounting_domain_model_bankaccount.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_dlaccounting_domain_model_bankaccount');
			$TCA['tx_dlaccounting_domain_model_bankaccount'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:dl_accounting/Resources/Private/Language/locallang_db.xml:tx_dlaccounting_domain_model_bankaccount',
					'label' => 'first_name',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/BankAccount.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_dlaccounting_domain_model_bankaccount.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_dlaccounting_domain_model_billposition', 'EXT:dl_accounting/Resources/Private/Language/locallang_csh_tx_dlaccounting_domain_model_billposition.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_dlaccounting_domain_model_billposition');
			$TCA['tx_dlaccounting_domain_model_billposition'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:dl_accounting/Resources/Private/Language/locallang_db.xml:tx_dlaccounting_domain_model_billposition',
					'label' => 'date',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/BillPosition.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_dlaccounting_domain_model_billposition.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_dlaccounting_domain_model_accountcode', 'EXT:dl_accounting/Resources/Private/Language/locallang_csh_tx_dlaccounting_domain_model_accountcode.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_dlaccounting_domain_model_accountcode');
			$TCA['tx_dlaccounting_domain_model_accountcode'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:dl_accounting/Resources/Private/Language/locallang_db.xml:tx_dlaccounting_domain_model_accountcode',
					'label' => 'title',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/AccountCode.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_dlaccounting_domain_model_accountcode.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_dlaccounting_domain_model_department', 'EXT:dl_accounting/Resources/Private/Language/locallang_csh_tx_dlaccounting_domain_model_department.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_dlaccounting_domain_model_department');
			$TCA['tx_dlaccounting_domain_model_department'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:dl_accounting/Resources/Private/Language/locallang_db.xml:tx_dlaccounting_domain_model_department',
					'label' => 'title',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Department.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_dlaccounting_domain_model_department.gif'
				),
			);

			t3lib_extMgm::addLLrefForTCAdescr('tx_dlaccounting_domain_model_costtype', 'EXT:dl_accounting/Resources/Private/Language/locallang_csh_tx_dlaccounting_domain_model_costtype.xml');
			t3lib_extMgm::allowTableOnStandardPages('tx_dlaccounting_domain_model_costtype');
			$TCA['tx_dlaccounting_domain_model_costtype'] = array(
				'ctrl' => array(
					'title'	=> 'LLL:EXT:dl_accounting/Resources/Private/Language/locallang_db.xml:tx_dlaccounting_domain_model_costtype',
					'label' => 'title',
					'tstamp' => 'tstamp',
					'crdate' => 'crdate',
					'cruser_id' => 'cruser_id',
					'dividers2tabs' => TRUE,
					'versioningWS' => 2,
					'versioning_followPages' => TRUE,
					'origUid' => 't3_origuid',
					'languageField' => 'sys_language_uid',
					'transOrigPointerField' => 'l10n_parent',
					'transOrigDiffSourceField' => 'l10n_diffsource',
					'delete' => 'deleted',
					'enablecolumns' => array(
						'disabled' => 'hidden',
						'starttime' => 'starttime',
						'endtime' => 'endtime',
					),
					'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/CostType.php',
					'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_dlaccounting_domain_model_costtype.gif'
				),
			);

?>