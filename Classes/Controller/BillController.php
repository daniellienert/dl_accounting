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
class Tx_DlAccounting_Controller_BillController extends Tx_DlAccounting_Controller_AbstractController {

	/**
	 * billRepository
	 *
	 * @var Tx_DlAccounting_Domain_Repository_BillRepository
	 */
	protected $billRepository;


	/**
	 * @var Tx_Extbase_Domain_Repository_FrontendUserRepository
	 */
	protected $userRepository;


	/**
	 * @var Tx_DlAccounting_Domain_Repository_BankAccountRepository
	 */
	protected $bankAccountRepository;


	/**
	 * @var Tx_DlAccounting_Domain_Repository_DepartmentRepository
	 */
	protected $departmentRepository;



	/**
	 * @param Tx_DlAccounting_Domain_Repository_DepartmentRepository $departmentRepository
	 */
	public function injectDepartmentRepository(Tx_DlAccounting_Domain_Repository_DepartmentRepository $departmentRepository) {
		$this->departmentRepository = $departmentRepository;
	}



	/**
	 * @param Tx_Extbase_Domain_Repository_FrontendUserRepository $userRepository
	 */
	public function injectUserRepository(Tx_Extbase_Domain_Repository_FrontendUserRepository $userRepository) {
		$this->userRepository = $userRepository;
	}


	/**
	 * injectBillRepository
	 *
	 * @param Tx_DlAccounting_Domain_Repository_BillRepository $billRepository
	 * @return void
	 */
	public function injectBillRepository(Tx_DlAccounting_Domain_Repository_BillRepository $billRepository) {
		$this->billRepository = $billRepository;
	}



	/**
	 * @param Tx_DlAccounting_Domain_Repository_BankAccountRepository $bankAccountRepository
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
		$positionList = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration($this->settings['extlist']['bill'], 'bill');
		$this->view->assignMultiple($positionList->getAllListTemplateParts());
	}



	/**
	 * action show
	 *
	 * @param $bill
	 * @return void
	 */
	public function showAction(Tx_DlAccounting_Domain_Model_Bill $bill) {
		$this->view->assign('bill', $bill);
	}



	/**
	 * action new
	 *
	 * @param $department
	 * @dontvalidate $department
	 * @return void
	 */
	public function newAction(Tx_DlAccounting_Domain_Model_Department $department = NULL) {
		if($department == NULL) {
			$this->forward('selectDepartment');
		} else {
			$bill = $this->objectManager->get('Tx_DlAccounting_Domain_Model_Bill'); /** @var Tx_DlAccounting_Domain_Model_Bill $bill */

			$bill->setDepartment($department);
			$bill->setUser($this->getCurrentUser());

			$this->billRepository->add($bill);
			$this->objectManager->get('Tx_Extbase_Persistence_Manager')->persistAll();

			$this->redirect('edit', NULL, NULL, array('bill' => $bill));
		}
	}



	/**
	 * Select a department
	 */
	public function selectDepartmentAction() {
		$departments = $this->departmentRepository->findAll();

		$this->view->assign('departments', $departments);
	}



	/**
	 * @param Tx_DlAccounting_Domain_Model_Bill $bill
	 */
	public function printViewAction(Tx_DlAccounting_Domain_Model_Bill $bill) {
		if(!$this->checkAccessOnBill($bill)) {
			$this->forward('list');
		}

		$bankAccount = $this->bankAccountRepository->findOneByUser($this->getCurrentUser());
		$this->view->assign('bankAccount', $bankAccount);

		$positionList = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration($this->settings['extlist']['billPositionsPrint'], 'billPositions');
		$positionList->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('bill')->getFilterByFilterIdentifier('billFilter')->setFilterValue($bill->getUid())->init();
		$this->view->assignMultiple($positionList->getAllListTemplateParts());

		$this->view->assign('bill', $bill);

		$this->view->assign('currentDate', date('d.m.Y'));
		$this->view->assign('currentYear', date('Y'));
	}



	/**
	 * @param Tx_DlAccounting_Domain_Model_Bill $bill
	 */
	public function downloadPdfAction(Tx_DlAccounting_Domain_Model_Bill $bill) {
		if (!$this->checkAccessOnBill($bill)) {
			$this->forward('list');
		}

		$bankAccount = $this->bankAccountRepository->findOneByUser($this->getCurrentUser());
		$this->view->assign('bankAccount', $bankAccount);

		$positionList = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration($this->settings['extlist']['billPositionsPrint'], 'billPositions');
		$positionList->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('bill')->getFilterByFilterIdentifier('billFilter')->setFilterValue($bill->getUid())->init();
		$this->view->assignMultiple($positionList->getAllListTemplateParts());

		$this->view->assign('bill', $bill);

		$this->view->assign('currentDate', date('d.m.Y'));
		$this->view->assign('currentYear', date('Y'));
	}



	/**
	 * action edit
	 *
	 * @param $bill
	 * @return void
	 */
	public function editAction(Tx_DlAccounting_Domain_Model_Bill $bill) {

		if(!$this->checkAccessOnBill($bill)) {
			$this->forward('list');
		}

		$bankAccount = $this->bankAccountRepository->findOneByUser($this->getCurrentUser());
		if(!$bankAccount) {
			$bankAccount = $this->objectManager->get('Tx_DlAccounting_Domain_Model_BankAccount'); /** @var Tx_DlAccounting_Domain_Model_BankAccount $bankAccount  */
			$bankAccount->setUser($this->getCurrentUser());
			$this->bankAccountRepository->add($bankAccount);
			$this->objectManager->get('Tx_Extbase_Persistence_Manager')->persistAll();
		}
		$this->view->assign('bankAccount', $bankAccount);

		$positionList = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration($this->settings['extlist']['billPositions'], 'billPositions');
		$positionList->getFilterBoxCollection()->getFilterboxByFilterboxIdentifier('bill')->getFilterByFilterIdentifier('billFilter')->setFilterValue($bill->getUid())->init();
		$this->view->assignMultiple($positionList->getAllListTemplateParts());

		$this->view->assign('bill', $bill);
	}



	/**
	 * action update
	 *
	 * @param $bill
	 * @return void
	 */
	public function updateAction(Tx_DlAccounting_Domain_Model_Bill $bill) {

		if(!$this->checkAccessOnBill($bill)) {
			$this->forward('list');
		}

		$this->billRepository->update($bill);
		$this->flashMessageContainer->add('Die Abrechnung wurde gespeichert.');
		$this->redirect('list');
	}



	/**
	 * action delete
	 *
	 * @param $bill
	 * @return void
	 */
	public function deleteAction(Tx_DlAccounting_Domain_Model_Bill $bill) {

		if(!$this->checkAccessOnBill($bill)) {
			$this->forward('list');
		}

		$this->billRepository->remove($bill);
		$this->flashMessageContainer->add('Die Abrechnung wurde gelöscht	.');
		$this->redirect('list');
	}


	/**
	 * Sorting action used to change sorting of a list
	 *
	 * @return string Rendered sorting action
	 */
	public function sortAction() {

		// EVIL HACK FOLLOWING:
		if(array_key_exists('billPositions', t3lib_div::_GET('tx_dlaccounting_acc'))) {
			$listContext = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration($this->settings['extlist']['billPositions'], 'billPositions');
			$forwardTo = 'edit';
		} else {
			$listContext = Tx_PtExtlist_ExtlistContext_ExtlistContextFactory::getContextByCustomConfiguration($this->settings['extlist']['bill'], 'bill');
			$forwardTo = 'list';
		}

		$listContext->getDataBackend()->resetListDataCache();
		$listContext->getDataBackend()->getSorter()->reset();

		if($forwardTo == 'list') {
			$this->forward($forwardTo);
		}
	}
}
?>