<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
<script src="{{url('/vendor/datatables/buttons.server-side.js')}}"></script>

<script src="{{url('/libs/DataTables/datatables.min.js')}}"></script>
<script src="{{url('/vendor/datatables/buttons.server-side.js')}}"></script>

<script>
    $.fn.dataTable.ext.errMode = 'none';

$('#table').on( 'error.dt', function ( e, settings, techNote, message ) {
console.log( 'An error has been reported by DataTables: ', message );
} ) ;
</script>