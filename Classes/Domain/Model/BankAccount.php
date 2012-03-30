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
class Tx_DlAccounting_Domain_Model_BankAccount extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * firstName
	 *
	 * @var string
	 */
	protected $firstName;

	/**
	 * lastName
	 *
	 * @var string
	 */
	protected $lastName;

	/**
	 * city
	 *
	 * @var string
	 */
	protected $city;

	/**
	 * accountNo
	 *
	 * @var string
	 */
	protected $accountNo;

	/**
	 * bankCode
	 *
	 * @var string
	 */
	protected $bankCode;

	/**
	 * user
	 *
	 * @var Tx_Extbase_Domain_Model_FrontendUser
	 */
	protected $user;

	/**
	 * Returns the firstName
	 *
	 * @return string $firstName
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * Sets the firstName
	 *
	 * @param string $firstName
	 * @return void
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * Returns the lastName
	 *
	 * @return string $lastName
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * Sets the lastName
	 *
	 * @param string $lastName
	 * @return void
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	/**
	 * Returns the city
	 *
	 * @return string $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Sets the city
	 *
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * Returns the accountNo
	 *
	 * @return string $accountNo
	 */
	public function getAccountNo() {
		return $this->accountNo;
	}

	/**
	 * Sets the accountNo
	 *
	 * @param string $accountNo
	 * @return void
	 */
	public function setAccountNo($accountNo) {
		$this->accountNo = $accountNo;
	}

	/**
	 * Returns the bankCode
	 *
	 * @return string $bankCode
	 */
	public function getBankCode() {
		return $this->bankCode;
	}

	/**
	 * Sets the bankCode
	 *
	 * @param string $bankCode
	 * @return void
	 */
	public function setBankCode($bankCode) {
		$this->bankCode = $bankCode;
	}

	/**
	 * Returns the user
	 *
	 * @return Tx_Extbase_Domain_Model_FrontendUser $user
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * Sets the user
	 *
	 * @param Tx_Extbase_Domain_Model_FrontendUser $user
	 * @return void
	 */
	public function setUser(Tx_Extbase_Domain_Model_FrontendUser $user) {
		$this->user = $user;
	}

}
?>