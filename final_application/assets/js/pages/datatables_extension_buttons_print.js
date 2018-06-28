/* ------------------------------------------------------------------------------
*
*  # Buttons extension for Datatables. Print examples
*
*  Specific JS code additions for datatable_extension_buttons_print.html page
*
*  Version: 1.1
*  Latest update: Mar 6, 2016
*
* ---------------------------------------------------------------------------- */

$(function() {


    // 
   // Table setup
    // ------------------------------

    // Setting datatable defaults
    $.extend( $.fn.dataTable.defaults, {
        autoWidth: false,
        dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        }
    });


    // Basic initialization
    $('.datatable-button-print-basic').DataTable({
        buttons: [
            {
                extend: 'print',
                text: '<i class="icon-printer position-left"></i> Print table',
                className: 'btn bg-blue'
            }
        ]
    });


    // Disable auto print
    $('.datatable-button-print-disable').DataTable({
        buttons: [
            {
                extend: 'print',
                text: '<i class="icon-printer position-left"></i> Print table',
                className: 'btn bg-blue',
                autoPrint: false
            }
        ]
    });


    // Export options - column selector
    $('.datatable-button-print-columns').DataTable({
        columnDefs: [{
          //  targets: 1, // Hide actions column
           // visible: false
        }],
        buttons: [
            {
                extend: 'print',
                text: '<i class="icon-printer position-left"></i> Print ',
                className: 'btn bg-blue',
                exportOptions: {
                    columns: ':visible'
                }
            },
			{
                extend: 'excelHtml5',
				text: '<i class="icon-file-excel position-left"></i> Excel ',
                className: 'btn bg-violet',
                exportOptions: {
                    columns: ':visible'
                   }
            },
		   {
				extend: 'copyHtml5',
				text: '<i class="icon-copy2 position-left"></i> Copy ',
				className: 'btn bg-green',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'pdfHtml5',
				text: '<i class=" icon-file-pdf position-left"></i> Pdf ',
				className: 'btn bg-orange',
				exportOptions: {
					columns: ':visible'
				}
			}

            
        ]
    });


    // Export options - row selector
    $('.datatable-button-print-rows').DataTable({
        buttons: {
            buttons: [
                {
                    extend: 'print',
                    className: 'btn btn-default',
                    text: '<i class="icon-printer position-left"></i> Print all'
                },
                {
                    extend: 'print',
                    className: 'btn btn-default',
                    text: '<i class="icon-checkmark3 position-left"></i> Print selected',
                    exportOptions: {
                        modifier: {
                            selected: true
                        }
                    }
                }
            ],
        },
        select: true
    });



    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
    
});
