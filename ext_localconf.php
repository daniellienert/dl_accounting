<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Acc',
	array(
		'Bill' => 'list, show, new, create, edit, update, delete, selectDepartment',
		'BankAccount' => 'list, show, new, create, edit, update',
		'BillPosition' => 'list, show, new, create, edit, update, delete',
		'AccountCode' => 'list, show, new, create, edit, update, delete',
		'Department' => 'list, show, new, create, edit, update, delete',
		'CostType' => 'list, show, new, create, edit, update, delete',
		
	),
	// non-cacheable actions
	array(
		'Bill' => 'create, update, delete',
		'BankAccount' => 'create, update',
		'BillPosition' => 'create, update, delete',
		'AccountCode' => 'create, update, delete',
		'Department' => 'create, update, delete',
		'CostType' => 'create, update, delete',
		
	)
);

?>