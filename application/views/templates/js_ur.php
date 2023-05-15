<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins') ?>/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins') ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins') ?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/plugins') ?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist') ?>/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist') ?>/js/demo.js"></script>
<!-- page script -->



<script type="text/javascript">
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({

            dom: 'lBfrtip',

            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "responsive": true,
            "autoWidth": true,
            "bFilter": true,
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('user/ajax_list_ur') ?>",
                "type": "POST"
            },


            "language": {
                searchPlaceholder: 'Cari Username',
                processing: "<img src='../assets/dist/img/loading.gif'></img> <br> Mohon Menunggu...",
            },

            "oLanguage": {
                "sSearch": "Cari :",
                "sZeroRecords": "Data Tidak Ditemukan"
            },

        });
    });

    // $(document).ready(function() {
    //     $('#data').after('<div id="nav"></div>');
    //     var rowsShown = 5;
    //     var rowsTotal = $('#data tbody tr').length;
    //     var numPages = rowsTotal / rowsShown;
    //     for (i = 0; i < numPages; i++) {
    //         var pageNum = i + 1;
    //         $('#nav').append('<a href="#" rel="' + i + '">' + pageNum + '</a> ');
    //     }
    //     $('#data tbody tr').hide();
    //     $('#data tbody tr').slice(0, rowsShown).show();
    //     $('#nav a:first').addClass('active');
    //     $('#nav a').bind('click', function() {

    //         $('#nav a').removeClass('active');
    //         $(this).addClass('active');
    //         var currPage = $(this).attr('rel');
    //         var startItem = currPage * rowsShown;
    //         var endItem = startItem + rowsShown;
    //         $('#data tbody tr').css('opacity', '0.0').hide().slice(startItem, endItem).
    //         css('display', 'table-row').animate({
    //             opacity: 1
    //         }, 300);
    //     });
    // });

</script>