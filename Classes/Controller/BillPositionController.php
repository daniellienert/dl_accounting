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
class Tx_DlAccounting_Controller_BillPositionController extends Tx_DlAccounting_Controller_AbstractController {

	/**
	 * billPositionRepository
	 *
	 * @var Tx_DlAccounting_Domain_Repository_BillPositionRepository
	 */
	protected $billPositionRepository;


	/**
	 * @var Tx_DlAccounting_Domain_Repository_CostTypeRepository
	 */
	protected $costTypeRepository;


	/**
	 * @var Tx_DlAccounting_Domain_Repository_AccountCodeRepository
	 */
	protected $accountCodeRepository;


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
	 * @param Tx_DlAccounting_Domain_Repository_CostTypeRepository $costTypeRepository
	 */
	public function injectCostTypeRepository(Tx_DlAccounting_Domain_Repository_CostTypeRepository $costTypeRepository) {
		$this->costTypeRepository = $costTypeRepository;
	}



	/**
	 * @param Tx_DlAccounting_Domain_Repository_AccountCodeRepository $accountCodeRepository
	 */
	public function injectAccountCodeRepository(Tx_DlAccounting_Domain_Repository_AccountCodeRepository $accountCodeRepository) {
		$this->accountCodeRepository = $accountCodeRepository;
	}


	/**
	 * action show
	 *
	 * @param $billPosition
	 * @return void
	 */
	public function showAction(Tx_DlAccounting_Domain_Model_BillPosition $billPosition) {
		if(!$this->checkAccessOnBill($billPosition->getBill())) {
			$this->redirect('list', 'bill');
		}

		$this->view->assign('billPosition', $billPosition);
	}

	/**
	 * action new
	 *
	 * @param $bill Tx_DlAccounting_Domain_Model_Bill
	 * @param $newBillPosition Tx_DlAccounting_Domain_Model_BillPosition
	 *
	 * @dontvalidate $newBillPosition
	 * @return void
	 */
	public function newAction(Tx_DlAccounting_Domain_Model_Bill $bill, Tx_DlAccounting_Domain_Model_BillPosition $newBillPosition = NULL) {

		if(!$this->checkAccessOnBill($bill)) {
			$this->redirect('list', 'bill');
		}

		$this->view->assign('accountCodes', $this->accountCodeRepository->findAll());
		$this->view->assign('costTypes', $this->costTypeRepository->findAll());
		$this->view->assign('newBillPosition', $newBillPosition);
		$this->view->assign('bill', $bill);
	}

	/**
	 * action create
	 *
	 * @dontverifyrequesthash
	 * @param $newBillPosition
	 * @return void
	 */
	public function createAction(Tx_DlAccounting_Domain_Model_BillPosition $newBillPosition) {

		if(!$this->checkAccessOnBill($newBillPosition->getBill())) {
			$this->redirect('list', 'bill');
		}

		$this->billPositionRepository->add($newBillPosition);
		$this->flashMessageContainer->add('Ein neuer Eintrag wurde hinzugefügt.');
		$this->redirect('edit', 'Bill', NULL, array('bill' => $newBillPosition->getBill()));
	}

	/**
	 * action edit
	 *
	 * @param $billPosition
	 * @return void
	 */
	public function editAction(Tx_DlAccounting_Domain_Model_BillPosition $billPosition) {

		if(!$this->checkAccessOnBill($billPosition->getBill())) {
			$this->redirect('list', 'bill');
		}

		$this->view->assign('accountCodes', $this->accountCodeRepository->findAll());
		$this->view->assign('costTypes', $this->costTypeRepository->findAll());
		$this->view->assign('billPosition', $billPosition);
	}

	/**
	 * action update
	 *
	 * @dontverifyrequesthash
	 * @param $billPosition
	 * @return void
	 */
	public function updateAction(Tx_DlAccounting_Domain_Model_BillPosition $billPosition) {

		if(!$this->checkAccessOnBill($billPosition->getBill())) {
			$this->redirect('list', 'bill');
		}

		$billPosition->calculate();
		$this->billPositionRepository->update($billPosition);
		$this->flashMessageContainer->add('Der Eintrag wurde aktualisiert.');

		$this->redirect('edit', 'Bill', NULL, array('bill' => $billPosition->getBill()));
	}



	/**
	 * action delete
	 *
	 * @param $billPosition
	 * @return void
	 */
	public function deleteAction(Tx_DlAccounting_Domain_Model_BillPosition $billPosition) {

		if(!$this->checkAccessOnBill($billPosition->getBill())) {
			$this->redirect('list', 'bill');
		}

		$billPosition->calculate();
		$this->billPositionRepository->remove($billPosition);
		$this->flashMessageContainer->add('Der Eintrag wurde gelöscht.');
		$this->redirect('edit', 'Bill', NULL, array('bill' => $billPosition->getBill()));
	}

}
?>