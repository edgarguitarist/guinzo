<!-- datatables -->
<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

<script src="assets/DT_bootstrap.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.11.5/api/sum().js"></script>
<script>
    /* Table initialization */
    $(document).ready(function() {
        $('.table').dataTable({
            "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap", //Cambiar a Bulma
            "oLanguage": {
                "sLengthMenu": "_MENU_ Registros por pagina"
            },
            drawCallback: function(settings) {
                var api = this.api();
                var sumatoria = api.column(11, {
                        page: 'current'
                    }).data().sum()
                $(api.table().footer()).html(
                    sumatoria
                );
                $row = document.getElementById('sumatoria');
                $row.innerHTML = "$ " + parseFloat(sumatoria).toFixed(2);
            }
        });


    });
</script>