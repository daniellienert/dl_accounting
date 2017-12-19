<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    $_EXTKEY,
    'Acc',
    array(
        'Bill' => 'list, new, edit, update, delete, selectDepartment, printView, downloadPdf,sort',
        'BankAccount' => 'list, show, new, create, edit, update',
        'BillPosition' => 'list, show, new, create, edit, update, delete',
        'AccountCode' => 'list, show, new, create, edit, update, delete',
        'Department' => 'list, show, new, create, edit, update, delete',
        'CostType' => 'list, show, new, create, edit, update, delete',

    ),
    // non-cacheable actions
    array(
        'Bill' => 'list, new, edit, update, delete, selectDepartment, printView, downloadPdf,sort',
        'BankAccount' => 'list, show, new, create, edit, update',
        'BillPosition' => 'list, show, new, create, edit, update, delete',
        'AccountCode' => 'list, show, new, create, edit, update, delete',
        'Department' => 'list, show, new, create, edit, update, delete',
        'CostType' => 'list, show, new, create, edit, update, delete',

    )
);
