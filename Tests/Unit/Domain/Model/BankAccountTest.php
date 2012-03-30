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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_DlAccounting_Domain_Model_BankAccount.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Accounting module
 *
 * @author Daniel Lienert <daniel@lienert.cc>
 */
class Tx_DlAccounting_Domain_Model_BankAccountTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_DlAccounting_Domain_Model_BankAccount
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_DlAccounting_Domain_Model_BankAccount();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getFirstNameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setFirstNameForStringSetsFirstName() { 
		$this->fixture->setFirstName('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getFirstName()
		);
	}
	
	/**
	 * @test
	 */
	public function getLastNameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLastNameForStringSetsLastName() { 
		$this->fixture->setLastName('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLastName()
		);
	}
	
	/**
	 * @test
	 */
	public function getCityReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCityForStringSetsCity() { 
		$this->fixture->setCity('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getCity()
		);
	}
	
	/**
	 * @test
	 */
	public function getAccountNoReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setAccountNoForStringSetsAccountNo() { 
		$this->fixture->setAccountNo('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAccountNo()
		);
	}
	
	/**
	 * @test
	 */
	public function getBankCodeReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setBankCodeForStringSetsBankCode() { 
		$this->fixture->setBankCode('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getBankCode()
		);
	}
	
	/**
	 * @test
	 */
	public function getUserReturnsInitialValueForTx_Extbase_Domain_Model_FrontendUser() { }

	/**
	 * @test
	 */
	public function setUserForTx_Extbase_Domain_Model_FrontendUserSetsUser() { }
	
}
?>