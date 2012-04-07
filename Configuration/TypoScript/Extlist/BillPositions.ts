plugin.tx_dlaccounting.settings.extlist.billPositions < plugin.tx_ptextlist.prototype.list
plugin.tx_dlaccounting.settings.extlist.billPositions {

	backendConfig < plugin.tx_ptextlist.prototype.backend.typo3
	backendConfig {

		tables (
			tx_dlaccounting_domain_model_billposition positions
		)

		baseFromClause (
			tx_dlaccounting_domain_model_billposition positions
			INNER JOIN tx_dlaccounting_domain_model_costtype costtype ON positions.cost_type = costtype.uid
			INNER JOIN tx_dlaccounting_domain_model_accountcode accountcode ON positions.account_code = accountcode.uid
		)

		// baseWhereClause ()
	}

	fields {

		positionUid {
			table = positions
			field = uid
		}

		bill {
			table = positions
			field = bill
		}

		date {
			table = positions
			field = date
		}

		accountCode {
			table = positions
			field = account_code
		}

		costType {
			table = positions
			field = cost_type
		}

		description {
			table = positions
			field = description
		}

		amount {
			table = positions
			field = amount
		}

		costTypeType {
			table = costtype
			field = cost_type
		}

		costTypeJob {
			table = costtype
			field = job_number
		}

		costTypeTitle {
			table = costtype
			field = title
		}

		accountCodeTitle {
			table = accountcode
			field = title
		}

		accountCodeCode {
			table = accountcode
			field = code
		}
	}

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
		}

		20 {
			fieldIdentifier = costTypeTitle
			columnIdentifier = costType
			label = Kostenstelle
		}


		30 {
			fieldIdentifier = accountCodeTitle
			columnIdentifier = accountCode
			label = Kostenart
		}

		40 {
			fieldIdentifier = description
			columnIdentifier = description
			label = Beschreibung
		}

		50 {
			fieldIdentifier = amount
			columnIdentifier = amount
			label = Betrag
		}

		60 {
			fieldIdentifier = positionUid, positionUid
			columnIdentifier = cmd
			label =
			isSortable = 0

			renderObj = COA
			renderObj {
				10 = TEXT
				10 {
                    value = <button class="btn">Bearbeiten</button>
					typolink.parameter.data = TSFE:id
                    typolink.additionalParams.dataWrap = &tx_dlaccounting_acc[billPosition]={field:positionUid}&tx_dlaccounting_acc[action]=edit&tx_dlaccounting_acc[controller]=BillPosition
				}

				15 = TEXT
				15.value = &nbsp;

				20 = TEXT
				20 {
					value = <button class="btn btn-danger">Löschen</button>
					typolink.parameter.data = TSFE:id
					typolink.additionalParams.dataWrap = &tx_dlaccounting_acc[billPosition]={field:positionUid}&tx_dlaccounting_acc[action]=delete&tx_dlaccounting_acc[controller]=BillPosition
				}
			}
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