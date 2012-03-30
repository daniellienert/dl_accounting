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
 * Test case for class Tx_DlAccounting_Domain_Model_BillPosition.
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
class Tx_DlAccounting_Domain_Model_BillPositionTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_DlAccounting_Domain_Model_BillPosition
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_DlAccounting_Domain_Model_BillPosition();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getDateReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setDateForDateTimeSetsDate() { }
	
	/**
	 * @test
	 */
	public function getAmountReturnsInitialValueForFloat() { 
		$this->assertSame(
			0.0,
			$this->fixture->getAmount()
		);
	}

	/**
	 * @test
	 */
	public function setAmountForFloatSetsAmount() { 
		$this->fixture->setAmount(3.14159265);

		$this->assertSame(
			3.14159265,
			$this->fixture->getAmount()
		);
	}
	
	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getBillReturnsInitialValueForObjectStorageContainingTx_DlAccounting_Domain_Model_Bill() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getBill()
		);
	}

	/**
	 * @test
	 */
	public function setBillForObjectStorageContainingTx_DlAccounting_Domain_Model_BillSetsBill() { 
		$bill = new Tx_DlAccounting_Domain_Model_Bill();
		$objectStorageHoldingExactlyOneBill = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneBill->attach($bill);
		$this->fixture->setBill($objectStorageHoldingExactlyOneBill);

		$this->assertSame(
			$objectStorageHoldingExactlyOneBill,
			$this->fixture->getBill()
		);
	}
	
	/**
	 * @test
	 */
	public function addBillToObjectStorageHoldingBill() {
		$bill = new Tx_DlAccounting_Domain_Model_Bill();
		$objectStorageHoldingExactlyOneBill = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneBill->attach($bill);
		$this->fixture->addBill($bill);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneBill,
			$this->fixture->getBill()
		);
	}

	/**
	 * @test
	 */
	public function removeBillFromObjectStorageHoldingBill() {
		$bill = new Tx_DlAccounting_Domain_Model_Bill();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($bill);
		$localObjectStorage->detach($bill);
		$this->fixture->addBill($bill);
		$this->fixture->removeBill($bill);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getBill()
		);
	}
	
	/**
	 * @test
	 */
	public function getAccountCodeReturnsInitialValueForTx_DlAccounting_Domain_Model_AccountCode() { }

	/**
	 * @test
	 */
	public function setAccountCodeForTx_DlAccounting_Domain_Model_AccountCodeSetsAccountCode() { }
	
	/**
	 * @test
	 */
	public function getCostTypeReturnsInitialValueForTx_DlAccounting_Domain_Model_CostType() { }

	/**
	 * @test
	 */
	public function setCostTypeForTx_DlAccounting_Domain_Model_CostTypeSetsCostType() { }
	
}
?>