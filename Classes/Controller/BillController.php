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
class Tx_DlAccounting_Controller_BillController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * billRepository
	 *
	 * @var Tx_DlAccounting_Domain_Repository_BillRepository
	 */
	protected $billRepository;



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
	 * injectBillRepository
	 *
	 * @param Tx_DlAccounting_Domain_Repository_BillRepository $billRepository
	 * @return void
	 */
	public function injectBillRepository(Tx_DlAccounting_Domain_Repository_BillRepository $billRepository) {
		$this->billRepository = $billRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$bills = $this->billRepository->findAll();
		$this->view->assign('bills', $bills);
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
	 * @param $newBill
	 * @dontvalidate $newBill
	 * @return void
	 */
	public function newAction(Tx_DlAccounting_Domain_Model_Department $department = NULL) {
		if($department == NULL) {
			$this->forward('selectDepartmentAction');
		} else {
			$bil = $this->objectManager->get('Tx_DlAccounting_Domain_Model_Bill');
			$this->billRepository->add('bill');
			$this->view->assign('bill', $bill);
		}
	}



	/**
	 * Select a department
	 */
	public function selectDepartmentAction() {
		$departments = $this->departmentRepository->findAll();

		$this->view->add('departments', $departments);
	}



	/**
	 * action create
	 *
	 * @param $newBill
	 * @return void
	 */
	public function createAction(Tx_DlAccounting_Domain_Model_Bill $newBill) {
		$this->billRepository->add($newBill);
		$this->flashMessageContainer->add('Your new Bill was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $bill
	 * @return void
	 */
	public function editAction(Tx_DlAccounting_Domain_Model_Bill $bill) {
		$this->view->assign('bill', $bill);
	}

	/**
	 * action update
	 *
	 * @param $bill
	 * @return void
	 */
	public function updateAction(Tx_DlAccounting_Domain_Model_Bill $bill) {
		$this->billRepository->update($bill);
		$this->flashMessageContainer->add('Your Bill was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $bill
	 * @return void
	 */
	public function deleteAction(Tx_DlAccounting_Domain_Model_Bill $bill) {
		$this->billRepository->remove($bill);
		$this->flashMessageContainer->add('Your Bill was removed.');
		$this->redirect('list');
	}

}
?>