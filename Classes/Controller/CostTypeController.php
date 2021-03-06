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
class Tx_DlAccounting_Controller_CostTypeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$costTypes = $this->costTypeRepository->findAll();
		$this->view->assign('costTypes', $costTypes);
	}

	/**
	 * action show
	 *
	 * @param $costType
	 * @return void
	 */
	public function showAction(Tx_DlAccounting_Domain_Model_CostType $costType) {
		$this->view->assign('costType', $costType);
	}

	/**
	 * action new
	 *
	 * @param $newCostType
	 * @ignorevalidation $newCostType
	 * @return void
	 */
	public function newAction(Tx_DlAccounting_Domain_Model_CostType $newCostType = NULL) {
		$this->view->assign('newCostType', $newCostType);
	}

	/**
	 * action create
	 *
	 * @param $newCostType
	 * @return void
	 */
	public function createAction(Tx_DlAccounting_Domain_Model_CostType $newCostType) {
		$this->costTypeRepository->add($newCostType);
		$this->addFlashMessage('Your new CostType was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param $costType
	 * @return void
	 */
	public function editAction(Tx_DlAccounting_Domain_Model_CostType $costType) {
		$this->view->assign('costType', $costType);
	}

	/**
	 * action update
	 *
	 * @param $costType
	 * @return void
	 */
	public function updateAction(Tx_DlAccounting_Domain_Model_CostType $costType) {
		$this->costTypeRepository->update($costType);
		$this->addFlashMessage('Your CostType was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param $costType
	 * @return void
	 */
	public function deleteAction(Tx_DlAccounting_Domain_Model_CostType $costType) {
		$this->costTypeRepository->remove($costType);
		$this->addFlashMessage('Your CostType was removed.');
		$this->redirect('list');
	}

}
?>
