<?php

use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter;

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

class Tx_DlAccounting_Controller_BillPositionController extends Tx_DlAccounting_Controller_AbstractController
{

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
    public function injectBillPositionRepository(Tx_DlAccounting_Domain_Repository_BillPositionRepository $billPositionRepository)
    {
        $this->billPositionRepository = $billPositionRepository;
    }


    /**
     * @param Tx_DlAccounting_Domain_Repository_CostTypeRepository $costTypeRepository
     */
    public function injectCostTypeRepository(Tx_DlAccounting_Domain_Repository_CostTypeRepository $costTypeRepository)
    {
        $this->costTypeRepository = $costTypeRepository;
    }


    /**
     * @param Tx_DlAccounting_Domain_Repository_AccountCodeRepository $accountCodeRepository
     */
    public function injectAccountCodeRepository(Tx_DlAccounting_Domain_Repository_AccountCodeRepository $accountCodeRepository)
    {
        $this->accountCodeRepository = $accountCodeRepository;
    }

    public function initializeAction()
    {
        foreach ($this->arguments as $key => $argument) {
            $this->arguments[$key]->getPropertyMappingConfiguration()->allowAllProperties();
        }

        if (isset($this->arguments['newBillPosition'])) {
            $this->arguments['newBillPosition']
                ->getPropertyMappingConfiguration()
                ->forProperty('date')
                ->setTypeConverterOption(DateTimeConverter::class, DateTimeConverter::CONFIGURATION_DATE_FORMAT,'Y-m-d');
        }
    }

    /**
     * action show
     *
     * @param $billPosition
     * @return void
     */
    public function showAction(Tx_DlAccounting_Domain_Model_BillPosition $billPosition)
    {
        if (!$this->checkAccessOnBill($billPosition->getBill())) {
            $this->redirect('list', 'bill');
        }

        $this->view->assign('billPosition', $billPosition);
    }

    /**
     * action new
     *
     * @ignorevalidation
     * @param $bill Tx_DlAccounting_Domain_Model_Bill
     * @param $newBillPosition Tx_DlAccounting_Domain_Model_BillPosition
     * @return void
     */
    public function newAction(Tx_DlAccounting_Domain_Model_Bill $bill, Tx_DlAccounting_Domain_Model_BillPosition $newBillPosition = NULL)
    {

        if (!$this->checkAccessOnBill($bill)) {
            $this->redirect('list', 'bill');
        }

        if ($newBillPosition == NULL) {
            $newBillPosition = new Tx_DlAccounting_Domain_Model_BillPosition();
            $newBillPosition->setDate($this->getSessionData('date', new DateTime()));
            if ($this->getSessionData('costType')) $newBillPosition->setCostType($this->getSessionData('costType'));
        }

        $this->view->assign('accountCodes', $this->accountCodeRepository->findAll());
        $this->view->assign('costTypes', $this->costTypeRepository->findCostTypePrioritisedByDepartment($bill->getDepartment()));
        $this->view->assign('newBillPosition', $newBillPosition);
        $this->view->assign('bill', $bill);
    }


    /**
     * @dontverifyrequesthash
     * @ignorevalidation
     *
     * @param $newBillPosition
     */
    public function createAction(Tx_DlAccounting_Domain_Model_BillPosition $newBillPosition)
    {
        if (!$this->checkAccessOnBill($newBillPosition->getBill())) {
            $this->redirect('list', 'bill');
        }

        if ($newBillPosition->getDescription() == '') {
            $this->addFlashMessage('Bitte gib eine Beschreibung deines Eintrags an.', 'Beschreibung fehlt.', FlashMessage::ERROR);
            $this->forward('new', NULL, NULL, array('bill' => $newBillPosition->getBill(), 'newBillPosition' => $newBillPosition));
        }

        $this->storeSessionData('date', $newBillPosition->getDate());
        $this->storeSessionData('costType', $newBillPosition->getCostType());

        $newBillPosition->calculate();

        $this->billPositionRepository->add($newBillPosition);
        $this->addFlashMessage('Ein neuer Eintrag wurde hinzugefügt.');
        $this->redirect('edit', 'Bill', NULL, array('bill' => $newBillPosition->getBill()));
    }

    /**
     * action edit
     *
     * @param $billPosition
     * @ignorevalidation
     * @return void
     */
    public function editAction(Tx_DlAccounting_Domain_Model_BillPosition $billPosition)
    {

        if (!$this->checkAccessOnBill($billPosition->getBill())) {
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
    public function updateAction(Tx_DlAccounting_Domain_Model_BillPosition $billPosition)
    {

        if (!$this->checkAccessOnBill($billPosition->getBill())) {
            $this->redirect('list', 'bill');
        }

        $billPosition->calculate();
        $this->billPositionRepository->update($billPosition);
        $this->addFlashMessage('Der Eintrag wurde aktualisiert.');

        $this->redirect('edit', 'Bill', NULL, array('bill' => $billPosition->getBill()));
    }


    /**
     * action delete
     *
     * @param $billPosition
     * @return void
     */
    public function deleteAction(Tx_DlAccounting_Domain_Model_BillPosition $billPosition)
    {

        if (!$this->checkAccessOnBill($billPosition->getBill())) {
            $this->redirect('list', 'bill');
        }

        $billPosition->calculate();
        $this->billPositionRepository->remove($billPosition);
        $this->addFlashMessage('Der Eintrag wurde gelöscht.');
        $this->redirect('edit', 'Bill', NULL, array('bill' => $billPosition->getBill()));
    }

}
