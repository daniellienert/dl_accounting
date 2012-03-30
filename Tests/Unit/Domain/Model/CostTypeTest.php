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
 * Test case for class Tx_DlAccounting_Domain_Model_CostType.
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
class Tx_DlAccounting_Domain_Model_CostTypeTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_DlAccounting_Domain_Model_CostType
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_DlAccounting_Domain_Model_CostType();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getCostTypeReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCostTypeForStringSetsCostType() { 
		$this->fixture->setCostType('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getCostType()
		);
	}
	
	/**
	 * @test
	 */
	public function getJobNumberReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setJobNumberForStringSetsJobNumber() { 
		$this->fixture->setJobNumber('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getJobNumber()
		);
	}
	
	/**
	 * @test
	 */
	public function getDepartmentReturnsInitialValueForTx_DlAccounting_Domain_Model_Department() { }

	/**
	 * @test
	 */
	public function setDepartmentForTx_DlAccounting_Domain_Model_DepartmentSetsDepartment() { }
	
}
?>