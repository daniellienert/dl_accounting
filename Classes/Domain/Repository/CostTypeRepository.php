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

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 *
 *
 * @package dl_accounting
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_DlAccounting_Domain_Repository_CostTypeRepository extends Repository
{

    protected $defaultOrderings = array(
        'department' => QueryInterface::ORDER_ASCENDING,
    );

    /**
     * @param Tx_DlAccounting_Domain_Model_Department $department
     * @return array
     */
    public function findCostTypePrioritisedByDepartment(Tx_DlAccounting_Domain_Model_Department $department)
    {

        $prioritisedCostTypes = array();
        $costTypes = $this->findAll();

        $otherCostTypes = array();

        foreach ($costTypes as $key => $costType) {
            /** @var Tx_DlAccounting_Domain_Model_CostType $costType */
            if ($costType->getDepartment() == $department) {
                $prioritisedCostTypes[] = $costType;
            } else {
                $otherCostTypes[] = $costType;
            }
        }

        foreach ($otherCostTypes as $costType) {
            /** @var Tx_DlAccounting_Domain_Model_CostType $costType */
            $prioritisedCostTypes[] = $costType;
        }

        return $prioritisedCostTypes;
    }

}
