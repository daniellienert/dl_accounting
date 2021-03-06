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

class Tx_DlAccounting_Controller_EventController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $events = $this->eventRepository->findAll();
        $this->view->assign('events', $events);
    }

    /**
     * action show
     *
     * @param $event
     * @return void
     */
    public function showAction(Tx_DlAccounting_Domain_Model_Event $event)
    {
        $this->view->assign('event', $event);
    }

    /**
     * action new
     *
     * @param $newEvent
     * @ignorevalidation $newEvent
     * @return void
     */
    public function newAction(Tx_DlAccounting_Domain_Model_Event $newEvent = NULL)
    {
        $this->view->assign('newEvent', $newEvent);
    }

    /**
     * action create
     *
     * @param $newEvent
     * @return void
     */
    public function createAction(Tx_DlAccounting_Domain_Model_Event $newEvent)
    {
        $this->eventRepository->add($newEvent);
        $this->addFlashMessage('Your new Event was created.');
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param $event
     * @return void
     */
    public function editAction(Tx_DlAccounting_Domain_Model_Event $event)
    {
        $this->view->assign('event', $event);
    }

    /**
     * action update
     *
     * @param $event
     * @return void
     */
    public function updateAction(Tx_DlAccounting_Domain_Model_Event $event)
    {
        $this->eventRepository->update($event);
        $this->addFlashMessage('Your Event was updated.');
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param $event
     * @return void
     */
    public function deleteAction(Tx_DlAccounting_Domain_Model_Event $event)
    {
        $this->eventRepository->remove($event);
        $this->addFlashMessage('Your Event was removed.');
        $this->redirect('list');
    }

}

?>
