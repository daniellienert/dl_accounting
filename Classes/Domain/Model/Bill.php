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
class Tx_DlAccounting_Domain_Model_Bill extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * user
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
	 */
	protected $user;


	/**
	 * @var Tx_DlAccounting_Domain_Model_Department
	 */
	protected $department;


	/**
	 * Returns the user
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $user
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * Sets the user
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $user
	 * @return void
	 */
	public function setUser(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $user) {
		$this->user = $user;
	}

	/**
	 * @param \Tx_DlAccounting_Domain_Model_Department $department
	 */
	public function setDepartment(Tx_DlAccounting_Domain_Model_Department $department) {
		$this->department = $department;
	}

	/**
	 * @return \Tx_DlAccounting_Domain_Model_Department
	 */
	public function getDepartment() {
		return $this->department;
	}

}
?>
