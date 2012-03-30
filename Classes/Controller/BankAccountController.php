<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Daniel Lienert <daniel@lienert.cc>, Daniel Lienert
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package dl_accounting
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_DlAccounting_Controller_BankAccountController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * bankAccountRepository
	 *
	 * @var Tx_DlAccounting_Domain_Repository_BankAccountRepository
	 */
	protected $bankAccountRepository;

	/**
	 * injectBankAccountRepository
	 *
	 * @param Tx_DlAccounting_Domain_Repository_BankAccountRepository $bankAccountRepository
	 * @return void
	 */
	public function injectBankAccountRepository(Tx_DlAccounting_Domain_Repository_BankAccountRepository $bankAccountRepository) {
		$this->bankAccountRepository = $bankAccountRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$bankAccounts = $this->bankAccountRepository->findAll();
		$this->view->assign('bankAccounts', $bankAccounts);
	}

	/**
	 * action show
	 *
	 * @param $bankAccount
	 * @return void
	 */
	public function showAction(Tx_DlAccounting_Domain_Model_BankAccount $bankAccount) {
		$this->view->assign('bankAccount', $bankAccount);
	}

	/**
	 * action new
	 *
	 * @param $newBankAccount
	 * @dontvalidate $newBankAccount
	 * @return void
	 */
	public function newAction(Tx_DlAccounting_Domain_Model_BankAccount $newBankAccount = NULL) {
		$this->view->assign('newBankAccount', $newBankAccount);
	}

	/**
	 * action create
	 *
	 * @param $newBankAccount
	 * @return void
	 */
	public function createAction(Tx_DlAccounting_Domain_Model_BankAccount $newBankAccount) {
		$this->bankAccountRepository->add($newBankAccount);
		$this->flashMessageContainer->add('Your new BankAccount was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $bankAccount
	 * @return void
	 */
	public function editAction(Tx_DlAccounting_Domain_Model_BankAccount $bankAccount) {
		$this->view->assign('bankAccount', $bankAccount);
	}

	/**
	 * action update
	 *
	 * @param $bankAccount
	 * @return void
	 */
	public function updateAction(Tx_DlAccounting_Domain_Model_BankAccount $bankAccount) {
		$this->bankAccountRepository->update($bankAccount);
		$this->flashMessageContainer->add('Your BankAccount was updated.');
		$this->redirect('list');
	}

}
?>