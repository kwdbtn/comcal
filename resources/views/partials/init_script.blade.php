<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"
    defer>
</script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js">
</script>
<script src="https://use.fontawesome.com/b25b26d330.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"  charset=utf-8 defer></script>
<script>
    // $(document).ready(function () {
    //     $('.table-report').dataTable({
    //         dom: 'Bfrtip',
    //         buttons: [
    //             'copyHtml5',
    //             'excelHtml5',
    //             'csvHtml5',
    //             'pdfHtml5'
    //         ]
    //     });
    // });

    $(document).ready(function () {
        $('.table-myDataTable').DataTable({
            select: true
        });
    });

    $(function () {
        $('#datetimepicker7').datetimepicker({
            format: 'DD-MM-YYYY',
        });
    });

    $(document).ready(function () {
        $('.select2').select2({
            placeholder: 'Select an option'
        });
    });
</script>