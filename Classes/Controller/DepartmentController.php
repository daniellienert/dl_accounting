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
class Tx_DlAccounting_Controller_DepartmentController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$departments = $this->departmentRepository->findAll();
		$this->view->assign('departments', $departments);
	}

	/**
	 * action show
	 *
	 * @param $department
	 * @return void
	 */
	public function showAction(Tx_DlAccounting_Domain_Model_Department $department) {
		$this->view->assign('department', $department);
	}

	/**
	 * action new
	 *
	 * @param $newDepartment
	 * @dontvalidate $newDepartment
	 * @return void
	 */
	public function newAction(Tx_DlAccounting_Domain_Model_Department $newDepartment = NULL) {
		$this->view->assign('newDepartment', $newDepartment);
	}

	/**
	 * action create
	 *
	 * @param $newDepartment
	 * @return void
	 */
	public function createAction(Tx_DlAccounting_Domain_Model_Department $newDepartment) {
		$this->departmentRepository->add($newDepartment);
		$this->flashMessageContainer->add('Your new Department was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $department
	 * @return void
	 */
	public function editAction(Tx_DlAccounting_Domain_Model_Department $department) {
		$this->view->assign('department', $department);
	}

	/**
	 * action update
	 *
	 * @param $department
	 * @return void
	 */
	public function updateAction(Tx_DlAccounting_Domain_Model_Department $department) {
		$this->departmentRepository->update($department);
		$this->flashMessageContainer->add('Your Department was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $department
	 * @return void
	 */
	public function deleteAction(Tx_DlAccounting_Domain_Model_Department $department) {
		$this->departmentRepository->remove($department);
		$this->flashMessageContainer->add('Your Department was removed.');
		$this->redirect('list');
	}

}
?>