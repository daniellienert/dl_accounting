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
class Tx_DlAccounting_Controller_BillPositionController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * billPositionRepository
	 *
	 * @var Tx_DlAccounting_Domain_Repository_BillPositionRepository
	 */
	protected $billPositionRepository;

	/**
	 * injectBillPositionRepository
	 *
	 * @param Tx_DlAccounting_Domain_Repository_BillPositionRepository $billPositionRepository
	 * @return void
	 */
	public function injectBillPositionRepository(Tx_DlAccounting_Domain_Repository_BillPositionRepository $billPositionRepository) {
		$this->billPositionRepository = $billPositionRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$billPositions = $this->billPositionRepository->findAll();
		$this->view->assign('billPositions', $billPositions);
	}

	/**
	 * action show
	 *
	 * @param $billPosition
	 * @return void
	 */
	public function showAction(Tx_DlAccounting_Domain_Model_BillPosition $billPosition) {
		$this->view->assign('billPosition', $billPosition);
	}

	/**
	 * action new
	 *
	 * @param $newBillPosition
	 * @dontvalidate $newBillPosition
	 * @return void
	 */
	public function newAction(Tx_DlAccounting_Domain_Model_BillPosition $newBillPosition = NULL) {
		$this->view->assign('newBillPosition', $newBillPosition);
	}

	/**
	 * action create
	 *
	 * @param $newBillPosition
	 * @return void
	 */
	public function createAction(Tx_DlAccounting_Domain_Model_BillPosition $newBillPosition) {
		$this->billPositionRepository->add($newBillPosition);
		$this->flashMessageContainer->add('Your new BillPosition was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $billPosition
	 * @return void
	 */
	public function editAction(Tx_DlAccounting_Domain_Model_BillPosition $billPosition) {
		$this->view->assign('billPosition', $billPosition);
	}

	/**
	 * action update
	 *
	 * @param $billPosition
	 * @return void
	 */
	public function updateAction(Tx_DlAccounting_Domain_Model_BillPosition $billPosition) {
		$this->billPositionRepository->update($billPosition);
		$this->flashMessageContainer->add('Your BillPosition was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $billPosition
	 * @return void
	 */
	public function deleteAction(Tx_DlAccounting_Domain_Model_BillPosition $billPosition) {
		$this->billPositionRepository->remove($billPosition);
		$this->flashMessageContainer->add('Your BillPosition was removed.');
		$this->redirect('list');
	}

}
?>