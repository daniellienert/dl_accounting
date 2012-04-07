plugin.tx_dlaccounting.settings.extlist.billPositionsPrint < plugin.tx_dlaccounting.settings.extlist.billPositions
plugin.tx_dlaccounting.settings.extlist.billPositionsPrint {


	columns {
		10 {
			fieldIdentifier = date
			columnIdentifier = date
			label = Datum

			renderObj = COA
            renderObj {
                10 = TEXT
                10 {
                    wrap = {field:date}
                    insertData = 1
                }
                stdWrap.date = d.m.Y
            }
            isSortable = 0
		}

		20 {
			fieldIdentifier = costTypeTitle
			columnIdentifier = costType
			label = Kostenstelle
			isSortable = 0
		}


		30 {
			fieldIdentifier = accountCodeTitle
			columnIdentifier = accountCode
			label = Kostenart
			isSortable = 0
		}

		40 {
			fieldIdentifier = description
			columnIdentifier = description
			label = Beschreibung
			isSortable = 0
		}

		50 {
			fieldIdentifier = amount
			columnIdentifier = amount
			label = Betrag
			isSortable = 0
		}

		60 <

		70 {
			fieldIdentifier = accountCodeCode
			columnIdentifier = accountCodeCode
			label =
			isSortable = 0
		}

		80 {
			fieldIdentifier = costTypeType
			columnIdentifier = costTypeType
			label =
			isSortable = 0
		}

		90 {
			fieldIdentifier = costTypeJob
			columnIdentifier = costTypeJob
			label =
			isSortable = 0
		}
	}

	aggregateData {
		sum {
			fieldIdentifier = amount
			method = sum
		}
	}

	aggregateRows {
		10 {
			amount {
				aggregateDataIdentifier = sum
				renderObj = TEXT
				renderObj.dataWrap (
					&sum;: <b>{field:sum}</b>
				)
			}
		}
	}

	filters {
		bill {
			filterConfigs {
				10 < plugin.tx_ptextlist.prototype.filter.string
				10 {
					filterIdentifier = billFilter
					label =
					fieldIdentifier = bill
				}
			}
		}
	}
}