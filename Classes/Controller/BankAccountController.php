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

class Tx_DlAccounting_Controller_BankAccountController extends Tx_DlAccounting_Controller_AbstractController
{

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
    public function injectBankAccountRepository(Tx_DlAccounting_Domain_Repository_BankAccountRepository $bankAccountRepository)
    {
        $this->bankAccountRepository = $bankAccountRepository;
    }


    /**
     * action edit
     *
     * @param $bankAccount Tx_DlAccounting_Domain_Model_BankAccount
     * @param $bill Tx_DlAccounting_Domain_Model_Bill
     * @return void
     */
    public function editAction(Tx_DlAccounting_Domain_Model_BankAccount $bankAccount, Tx_DlAccounting_Domain_Model_Bill $bill)
    {

        if (!$this->checkAccessOnBankAccount($bankAccount)) {
            $this->redirect('list', 'bill');
        }

        $this->view->assign('bankAccount', $bankAccount);
        $this->view->assign('bill', $bill);
    }


    /**
     * action update
     *
     * @param $bankAccount Tx_DlAccounting_Domain_Model_BankAccount
     * @param $bill Tx_DlAccounting_Domain_Model_Bill
     * @return void
     */
    public function updateAction(Tx_DlAccounting_Domain_Model_BankAccount $bankAccount, Tx_DlAccounting_Domain_Model_Bill $bill)
    {

        if (!$this->checkAccessOnBankAccount($bankAccount)) {
            $this->redirect('list', 'bill');
        }

        $this->bankAccountRepository->update($bankAccount);
        $this->addFlashMessage('Deine Bankdaten wurden gespeichert.');
        $this->forward('edit', 'Bill', NULL, array('bill' => $bill));
    }


    /**
     * @param Tx_DlAccounting_Domain_Model_BankAccount $bankAccount
     * @return bool
     */
    protected function checkAccessOnBankAccount(Tx_DlAccounting_Domain_Model_BankAccount $bankAccount)
    {
        if ($bankAccount->getUser()->getUid() == (int) $GLOBALS['TSFE']->fe_user->user['uid']) {
            return true;
        } else {
            $this->addFlashMessage('Dies sind nicht deine Kontodaten! Finger weg!', 'Fehlende Berechtigung', \TYPO3\CMS\Core\Messaging\FlashMessage::ERROR);
            return FALSE;
        }
    }
}
