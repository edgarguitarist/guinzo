<!-- datatables -->
<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/DT_bootstrap.js"></script>
<script>
    /* Table initialisation */
$(document).ready(function() {
	$('.table').dataTable( {
		"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap", //Cambiar a Bulma
		"oLanguage": {
			"sLengthMenu": "_MENU_ Registros por pagina"
		},
		"searching": false,
	} );
} );
</script>