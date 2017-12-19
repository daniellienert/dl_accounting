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
class Tx_DlAccounting_Domain_Model_CostType extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title;

	/**
	 * costType
	 *
	 * @var string
	 */
	protected $costType;

	/**
	 * jobNumber
	 *
	 * @var string
	 */
	protected $jobNumber;

	/**
	 * department
	 *
	 * @var Tx_DlAccounting_Domain_Model_Department
	 */
	protected $department;

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the costType
	 *
	 * @return string $costType
	 */
	public function getCostType() {
		return $this->costType;
	}

	/**
	 * Sets the costType
	 *
	 * @param string $costType
	 * @return void
	 */
	public function setCostType($costType) {
		$this->costType = $costType;
	}

	/**
	 * Returns the jobNumber
	 *
	 * @return string $jobNumber
	 */
	public function getJobNumber() {
		return $this->jobNumber;
	}

	/**
	 * Sets the jobNumber
	 *
	 * @param string $jobNumber
	 * @return void
	 */
	public function setJobNumber($jobNumber) {
		$this->jobNumber = $jobNumber;
	}

	/**
	 * Returns the department
	 *
	 * @return Tx_DlAccounting_Domain_Model_Department $department
	 */
	public function getDepartment() {
		return $this->department;
	}

	/**
	 * Sets the department
	 *
	 * @param Tx_DlAccounting_Domain_Model_Department $department
	 * @return void
	 */
	public function setDepartment(Tx_DlAccounting_Domain_Model_Department $department) {
		$this->department = $department;
	}

}
?>
