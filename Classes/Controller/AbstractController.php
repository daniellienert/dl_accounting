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
class Tx_DlAccounting_Controller_AbstractController extends Tx_PtExtbase_Controller_AbstractActionController {

	/**
	 * @return Tx_Extbase_Domain_Model_FrontendUser
	 */
	protected function getCurrentUser() {
		$userUid = (int) $GLOBALS['TSFE']->fe_user->user['uid'];
		$user = $this->userRepository->findOneByUid($userUid);
		return $user;
	}


	/**
	 * @param Tx_DlAccounting_Domain_Model_Bill $bill
	 * @return bool
	 */
	protected function checkAccessOnBill(Tx_DlAccounting_Domain_Model_Bill $bill) {
		if($bill->getUser()->getUid() == (int) $GLOBALS['TSFE']->fe_user->user['uid']) {
			return TRUE;
		} else {
			$this->flashMessageContainer->add('Du hast keine Berechtigung für diese Abrechnung', 'Fehlende Berechtigung', t3lib_FlashMessage::ERROR);
			return FALSE;
		}
	}
}
?>