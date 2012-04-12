plugin.tx_dlaccounting.settings.extlist.bill < plugin.tx_ptextlist.prototype.list
plugin.tx_dlaccounting.settings.extlist.bill {

	backendConfig < plugin.tx_ptextlist.prototype.backend.typo3
	backendConfig {

		tables (
			tx_dlaccounting_domain_model_bill bill,
		)

		baseFromClause (
			tx_dlaccounting_domain_model_bill bill
			INNER JOIN tx_dlaccounting_domain_model_department department ON bill.department = department.uid
		)

		baseWhereClause = COA
		baseWhereClause {
			10 = TEXT
			10 {
				data = TSFE:fe_user|user|uid
                wrap = user = |
			}
		}

		baseGroupByClause = bill.uid
	}

	fields {

		billUid {
			table = bill
			field = uid
		}

		billUidFormated {
			special = LPad(bill.uid,5, '0')
		}

		date {
			table = bill
			field = crdate
		}

		departmentTitle {
			table = department
			field = title
		}

		sum {
			special (
				SELECT sum(positions.amount)
				FROM tx_dlaccounting_domain_model_billposition positions
				WHERE positions.bill = bill.uid AND positions.deleted = 0
			)
		}

		user {
			table = bill
			field = user
		}

	}

	columns {

		10 {
			fieldIdentifier = billUidFormated
			columnIdentifier = billUidFormated
			label = #
		}

		20 {
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


		30 {
			fieldIdentifier = departmentTitle
			columnIdentifier = department
			label = Funktion
		}


		40 {
			fieldIdentifier = sum
			columnIdentifier = sum
			label = Summe

			renderObj = TEXT
			renderObj {
				dataWrap = {field:sum} €
			}
		}


		60 {
			fieldIdentifier = billUid
			columnIdentifier = cmd
			label =
			isSortable = 0

			renderObj = COA
			renderObj {
				10 = TEXT
				10 {
                    value = <button class="btn"><i class="icon-pencil icon-black"></i></button>
					typolink.parameter.data = TSFE:id
                    typolink.additionalParams.dataWrap = &tx_dlaccounting_acc[bill]={field:billUid}&tx_dlaccounting_acc[action]=edit&tx_dlaccounting_acc[controller]=Bill
				}

				15 = TEXT
				15.value = &nbsp;

				20 = TEXT
				20 {
					value = <button class="btn btn-danger"><i class="icon-trash icon-white"></i></button>
					typolink.parameter.data = TSFE:id
					typolink.additionalParams.dataWrap = &tx_dlaccounting_acc[bill]={field:billUid}&tx_dlaccounting_acc[action]=delete&tx_dlaccounting_acc[controller]=Bill
				}
			}
		}
	}

/*
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
*/
}