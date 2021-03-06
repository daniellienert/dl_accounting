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

class Tx_DlAccounting_Domain_Model_BillPosition extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var DateTime
     */
    protected $date;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var Tx_DlAccounting_Domain_Model_Bill
     */
    protected $bill;

    /**
     * @var Tx_DlAccounting_Domain_Model_AccountCode
     */
    protected $accountCode;


    /**
     * @var Tx_DlAccounting_Domain_Model_CostType
     */
    protected $costType;


    /**
     * @var integer
     */
    protected $travelCostKilometers;


    /**
     * @var integer
     */
    protected $travelCostCarPassengers;


    /**
     * @var array
     */
    protected $settings;


    /**
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
     * @return void
     */
    public function injectConfigurationManager(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager)
    {
        $this->settings = $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
    }

    /**
     * Calculate the amount and set additional description
     */
    public function calculate()
    {
        if ($this->accountCode->getUid() == $this->settings['specialAccountCodes']['travelCosts']) {
            $travelCostsPerKilometer = $this->settings['travelCosts']['centPerKm'];
            $travelCostsPerExtraPassenger = $this->settings['travelCosts']['centPerExtraPassenger'];

            $costPerKm = ($travelCostsPerKilometer * $this->travelCostKilometers) / 100;
            $extraPerPassenger = ($this->travelCostCarPassengers * $this->travelCostKilometers * $travelCostsPerExtraPassenger) / 100;

            $this->setAmount($costPerKm + $extraPerPassenger);

            if ($this->travelCostCarPassengers > 0) $passengengers = ' / ' . $this->travelCostCarPassengers . ' Mitfahrer';
            $costCalculationdescription = '(' . $this->travelCostKilometers . ' Km x ' . ($travelCostsPerKilometer + $this->travelCostCarPassengers * $travelCostsPerExtraPassenger) . ' Cent' . $passengengers . ')';
            $this->setDescription($this->getDescription() . "\n" . $costCalculationdescription);
        }
    }


    /**
     * Returns the date
     *
     * @return DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     *
     * @param DateTime $date
     * @return void
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Returns the amount
     *
     * @return float $amount
     */
    public function getAmount()
    {
        return $this->amount;
    }


    /**
     * Sets the amount
     *
     * @param float $amount
     * @return void
     */
    public function setAmount($amount)
    {
        if (stristr($amount, ',')) $amount = str_replace(',', '.', $amount);
        $this->amount = $amount;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    /**
     * Returns the bill
     *
     * @return Tx_DlAccounting_Domain_Model_Bill $bill
     */
    public function getBill()
    {
        return $this->bill;
    }

    /**
     * Sets the bill
     *
     * @param Tx_DlAccounting_Domain_Model_Bill $bill
     * @return void
     */
    public function setBill(Tx_DlAccounting_Domain_Model_Bill $bill)
    {
        $this->bill = $bill;
    }

    /**
     * Returns the accountCode
     *
     * @return Tx_DlAccounting_Domain_Model_AccountCode $accountCode
     */
    public function getAccountCode()
    {
        return $this->accountCode;
    }

    /**
     * Sets the accountCode
     *
     * @param Tx_DlAccounting_Domain_Model_AccountCode $accountCode
     * @return void
     */
    public function setAccountCode(Tx_DlAccounting_Domain_Model_AccountCode $accountCode)
    {
        $this->accountCode = $accountCode;
    }

    /**
     * Returns the costType
     *
     * @return Tx_DlAccounting_Domain_Model_CostType $costType
     */
    public function getCostType()
    {
        return $this->costType;
    }

    /**
     * Sets the costType
     *
     * @param Tx_DlAccounting_Domain_Model_CostType $costType
     * @return void
     */
    public function setCostType(Tx_DlAccounting_Domain_Model_CostType $costType)
    {
        $this->costType = $costType;
    }

    /**
     * @param int $travelCostCarPassengers
     */
    public function setTravelCostCarPassengers($travelCostCarPassengers)
    {
        $this->travelCostCarPassengers = $travelCostCarPassengers;
    }

    /**
     * @return int
     */
    public function getTravelCostCarPassengers()
    {
        return $this->travelCostCarPassengers;
    }

    /**
     * @param int $travelCostKilometers
     */
    public function setTravelCostKilometers($travelCostKilometers)
    {
        $this->travelCostKilometers = $travelCostKilometers;
    }

    /**
     * @return int
     */
    public function getTravelCostKilometers()
    {
        return $this->travelCostKilometers;
    }
}
