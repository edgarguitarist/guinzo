<!-- datatables -->
<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/DT_bootstrap.js"></script>
<script>
	/* Table initialization */

	//position_sort_table = 3 order_sort_table = "desc"
	var position_sort_table = position_sort_table ?? 3
	var order_sort_table = order_sort_table ?? "asc"

	$(document).ready(function() {
		$('.table').dataTable({
			"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
			"sPaginationType": "bootstrap",
			"oLanguage": {
				"sLengthMenu": "_MENU_ &nbsp; &nbsp; Registros por pagina"
			},
			"order": [
				[position_sort_table, order_sort_table]
			]
		});
	});
</script>