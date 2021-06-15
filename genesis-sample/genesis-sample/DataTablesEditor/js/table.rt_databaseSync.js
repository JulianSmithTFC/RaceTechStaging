
/*! Semantic UI integration for DataTables' Editor
 * ©2018 SpryMedia Ltd - datatables.net/license
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'http://localhost/RaceTech/wp-content/themes/racetech/DataTablesEditor/php/table.rt_databaseSync.php',
		table: '#rt_databaseSync',
		fields: [
			{
				"label": "prodID:",
				"name": "prodID"
			},
			{
				"label": "SKU:",
				"name": "p_sku"
			},
			{
				"label": "Name:",
				"name": "p_name"
			},
			{
				"label": "Cats:",
				"name": "p_category"
			},
			{
				"label": "Stock:",
				"name": "p_stock"
			},
			{
				"label": "Weight:",
				"name": "p_weight"
			},
			{
				"label": "Length:",
				"name": "p_length"
			},
			{
				"label": "Width:",
				"name": "p_width"
			},
			{
				"label": "Height:",
				"name": "p_height"
			}
		]
	} );

	// // Setup - add a text input to each footer cell
	// $('#rt_databaseSync tfoot th').each( function () {
	// 	var title = $(this).text();
	// 	$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	// } );

	// function ExcludeSearch(term, column) {
	// 	//apply search plugin
	// 	$.fn.dataTable.ext.search.push(
	// 		function(settings, data, dataIndex) {
	// 			//if column data != to search term then return true to display
	// 			if (data[column] != term){
	// 				return true;
	// 			}
	// 			//otherwise return false to filter from display
	// 			return false;
	// 		}
	// 	);
	// 	//draw table based on search
	// 	table.draw();
	// 	//remove search plugin
	// 	$.fn.dataTable.ext.search.pop();
	// }

	var table = $('#rt_databaseSync').DataTable( {
		dom: 'Bfrtip',
		ajax: 'http://localhost/RaceTech/wp-content/themes/racetech/DataTablesEditor/php/table.rt_databaseSync.php',
		columns: [
			{
				data: null,
				defaultContent: '',
				className: 'select-checkbox',
				orderable: false
			},
			{
				"data": "prodid"
			},
			{
				"data": "p_sku"
			},
			{
				"data": "p_name"
			},
			{
				"data": "p_category"
			},
			{
				"data": "p_stock"
			},
			{
				"data": "p_weight"
			},
			{
				"data": "p_length"
			},
			{
				"data": "p_width"
			},
			{
				"data": "p_height"
			}
		],
		select: {
			style:    'os',
			selector: 'td:first-child',
			blurable: true
		},
		lengthChange: false,
		buttons: [
			{
				text: 'Apply Categorys',
				action: function () {
					var checkBoxArray = [];

					$('input.cats:checkbox:checked').each(function () {
						checkBoxArray.push($(this).val());

						return checkBoxArray;
					});

					var checkBoxString = checkBoxArray.toString();

					var checkBoxStringFixed = checkBoxString.replace(/,/g, "|");

					var table = $('#rt_databaseSync').DataTable();
					table.column(4, { search: 'applied' }).search(checkBoxStringFixed, true, false).draw();
				}
			},
			{
				text: 'Single Products /',
				action: function () {

					$.fn.dataTable.ext.search.push(
						function( settings, data, dataIndex ) {
							var includesValue = data[2].includes("/");
							if (includesValue == false){
								return true;
							}else{
								return false;
							}
						}
					);
					var table = $('#rt_databaseSync').DataTable();
					table.draw();
					// // ExcludeSearch("/", "2");
					//  var table = $('#rt_databaseSync').DataTable();
					//
					// var filteredData = table
					// 	.column( 2, { search: 'applied' } )
					// 	.data()
					// 	.filter( function ( value, index ) {
					// 		var includesValue = value.includes("/");
					// 		if (includesValue == false){
					// 			return true;
					// 		}else{
					// 			return false;
					// 		}
					// 	} );
					// var filteredDataString = filteredData.toString();
					// var filteredDataStringFixed = filteredDataString.replace(/,/g, "|");
					// //table.column(2).search(filteredDataStringFixed, true, false).draw();
					// console.log(filteredData);
				}
			},
			{
				text: 'Single Products (1)',
				action: function () {
					var table = $('#rt_databaseSync').DataTable();
					table.column(2, { search: 'applied' }).search('(1)').draw();
				}
			},
			{
				text: 'Kit Products',
				action: function () {

					$.fn.dataTable.ext.search.push(
						function( settings, data, dataIndex ) {
							var includesValue = data[2].includes("/");
							if (includesValue == false){
								return false;
							}else{
								return true;
							}
						}
					);

					var table = $('#rt_databaseSync').DataTable();
					table.draw();
				}
			},
			{
				text: 'Clear Filters',
				action: function () {

					var table = $('#rt_databaseSync').DataTable();
					table
						.search( '' )
						.columns().search( '' )
						.draw();
				}
			},
			{
				text: 'Select All Items',
				action: function () {
					table.rows( { search: 'applied' } ).select();
				}
			},
			'selectNone',
			{ extend: 'edit',   editor: editor }
		],
		language: {
			buttons: {
				selectNone: "Select none"
			}
		}
		// initComplete: function () {
		// 	// Apply the search
		// 	this.api().columns([1, 2, 4]).every( function () {
		// 		var that = this;
		//
		// 		$( 'input', this.footer() ).on( 'keyup change clear', function () {
		// 			if ( that.search() !== this.value ) {
		// 				that
		// 					.search( this.value )
		// 					.draw();
		// 			}
		// 		} );
		// 	} );
		// }
	} );
} );

}(jQuery));

