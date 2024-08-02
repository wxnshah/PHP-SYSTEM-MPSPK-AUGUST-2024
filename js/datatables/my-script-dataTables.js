$(document).ready(function() {
    var table = $('#example').DataTable( {
        // dom: "<'row'<'col-md-6 mb-1'B><'col-md-6 mb-1'f>>t<'row'<'col-md-1 mt-2'l><'col-md-2'i><'col-md-9'p>>",
        // dom: "<'row'<'col-md-6 mb-1'B><'col-md-6 mb-1'f>>t<'row'<'col-md-2'li><'col-md-10'p>>",
        dom: "<'row'<'col-sm-12 col-md-6'><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'li><'col-sm-12 col-md-7'p>>",
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    } );            
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
