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
<!-- datepick -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>




<script type="text/javascript">
    var table;

    function ambil_tgl_jam() {
        var d = new Date();

        //d = d.getFullYear() + "-" + ('0' + (d.getMonth() + 1)).slice(-2) + "-" + ('0' + d.getDate()).slice(-2) + " " + ('0' + d.getHours()).slice(-2) + ":" + ('0' + d.getMinutes()).slice(-2) + ":" + ('0' + d.getSeconds()).slice(-2);
        d = "Diambil pada Tanggal " + ('0' + d.getDate()).slice(-2) + "-" + ('0' + (d.getMonth() + 1)).slice(-2) + "-" + d.getFullYear() + " Pada Pukul " + ('0' + d.getHours()).slice(-2) + ":" + ('0' + d.getMinutes()).slice(-2) + ":" + ('0' + d.getSeconds()).slice(-2) + " WIB";

        return d;
    }

    function ambil_tgl_jam_print() {
        var d = new Date();

        //d = d.getFullYear() + "-" + ('0' + (d.getMonth() + 1)).slice(-2) + "-" + ('0' + d.getDate()).slice(-2) + " " + ('0' + d.getHours()).slice(-2) + ":" + ('0' + d.getMinutes()).slice(-2) + ":" + ('0' + d.getSeconds()).slice(-2);
        d = "Dicetak pada Tanggal " + ('0' + d.getDate()).slice(-2) + "-" + ('0' + (d.getMonth() + 1)).slice(-2) + "-" + d.getFullYear() + " Pada Pukul " + ('0' + d.getHours()).slice(-2) + ":" + ('0' + d.getMinutes()).slice(-2) + ":" + ('0' + d.getSeconds()).slice(-2) + " WIB";

        return d;
    }


    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({

            dom: 'lBfrtip',
            buttons: [{
                    extend: 'excel',
                    text: "Export Excel",
                    className: 'excelButton',
                    messageTop: ambil_tgl_jam,
                },
                {
                    extend: 'pdf',
                    text: "Export PDF",
                    messageTop: ambil_tgl_jam,
                },
                {
                    extend: 'print',
                    text: "Print",
                    messageTop: ambil_tgl_jam_print,
                },
            ],
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "Semua"]
            ],

            /* buttons: [{
                 extend: 'collection',
                 className: "btn-primary",
                 text: 'Export',
                 buttons: [{
                         extend: 'pdf',
                         className: "btn-primary",
                     },
                     {
                         extend: 'print',
                         className: 'btn-primary'
                     },
                     {
                         extend: 'excel',
                         className: 'btn-primary'
                     }
                 ]
             }],*/

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "responsive": true,
            "autoWidth": false,
            // "bFilter": true,
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('obat/ajax_list_far') ?>",
                "type": "POST"
            },


            "language": {
                searchPlaceholder: 'Nama Obat',
                processing: "<img src='../assets/dist/img/loading.gif'> <br> Mohon Menunggu...",
            },

            "oLanguage": {
                "sSearch": "Cari :",
                "sZeroRecords": "Data Tidak Ditemukan"
            },

            "createdRow": function(row, data, dataIndex) {
                //cek expired
                var hari_ini = new Date();
                var dd = String(hari_ini.getDate());
                var mm = String(hari_ini.getMonth() + 1); //January is 0!
                // var mm_bln = String(hari_ini.getMonth() + 4).padStart(2, '0'); //January is 0!
                var yyyy = hari_ini.getFullYear();
                hari_ini = yyyy + '-' + mm + '-' + dd;

                //akan habis 3 bulan
                var tiga_bln = new Date()
                tiga_bln.setMonth(tiga_bln.getMonth() + 3);
                cek = tiga_bln.getFullYear() + '-' + ("0" + (tiga_bln.getMonth() + 1)).slice(-2) + '-' + ("0" + tiga_bln.getDate()).slice(-2);


                if (data[3] == '-') {
                    $(row).css('color', 'blue');
                } else if (data[3] != '-' && data[3] <= hari_ini) {
                    $(row).css('color', '#FF0000');
                } else if (data[3] != '-' && data[3] < cek) {
                    $(row).css('color', '#FFA500');
                } else {
                    $(row).css('color', 'black');
                }
            },
            //Set column definition initialisation properties.
            /* "columnDefs": [{
                 "targets": [0], //first column / numbering column
                 "orderable": false, //set not orderable
             }, ], */

            "columnDefs": [{
                "targets": [5],
                //"searchable": true,
                "render": function(data, type, row) {
                    switch (data) {
                        case 'Apotek':
                            return 'Apotek';
                            break;
                        case 'Sub Ins Farmasi Gudang':
                            return 'Gudang Farmasi';
                            break;
                        default:
                            return 'N/A';
                    }
                }
            }, ],

        });


    });
</script>