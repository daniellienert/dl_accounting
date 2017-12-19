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

class Tx_DlAccounting_Controller_AccountCodeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $accountCodes = $this->accountCodeRepository->findAll();
        $this->view->assign('accountCodes', $accountCodes);
    }

    /**
     * action show
     *
     * @param $accountCode
     * @return void
     */
    public function showAction(Tx_DlAccounting_Domain_Model_AccountCode $accountCode)
    {
        $this->view->assign('accountCode', $accountCode);
    }

    /**
     * action new
     *
     * @param $newAccountCode
     * @ignorevalidation $newAccountCode
     * @return void
     */
    public function newAction(Tx_DlAccounting_Domain_Model_AccountCode $newAccountCode = NULL)
    {
        $this->view->assign('newAccountCode', $newAccountCode);
    }

    /**
     * action create
     *
     * @param $newAccountCode
     * @return void
     */
    public function createAction(Tx_DlAccounting_Domain_Model_AccountCode $newAccountCode)
    {
        $this->accountCodeRepository->add($newAccountCode);
        $this->addFlashMessage('Your new AccountCode was created.');
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param $accountCode
     * @return void
     */
    public function editAction(Tx_DlAccounting_Domain_Model_AccountCode $accountCode)
    {
        $this->view->assign('accountCode', $accountCode);
    }

    /**
     * action update
     *
     * @param $accountCode
     * @return void
     */
    public function updateAction(Tx_DlAccounting_Domain_Model_AccountCode $accountCode)
    {
        $this->accountCodeRepository->update($accountCode);
        $this->addFlashMessage('Your AccountCode was updated.');
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param $accountCode
     * @return void
     */
    public function deleteAction(Tx_DlAccounting_Domain_Model_AccountCode $accountCode)
    {
        $this->accountCodeRepository->remove($accountCode);
        $this->addFlashMessage('Your AccountCode was removed.');
        $this->redirect('list');
    }

}
