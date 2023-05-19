<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("templates/head.php") ?>

</head>

<style type="text/css">
    .helv {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18px;
    }

    .grgia {
        font-family: Georgia, serif;
    }

    .prox {
        font-family: 'proxima-nova', sans-serif;
    }

    .bolder {
        font-weight: bolder;
    }

    .kiri {
        margin-left: 0cm;

    }

    .kanan {
        margin-right: 0cm;
    }

    /* untuk legend */
    .legend {
        list-style: none;
    }

    .legend li {
        float: left;
        margin-right: 10px;
    }

    .legend span {
        border: 1px solid #ccc;
        float: left;
        width: 12px;
        height: 12px;
        margin: 7px;
    }

    /* your colors */
    .legend .blm_expire {
        background-color: black;
    }

    .legend .sdh_expire {
        background-color: #FF0000;
    }

    .legend .akan_expire {
        background-color: #FFA500;
    }

    .legend .tanpa_expire {
        background-color: blue;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <?php $this->load->view("templates/sidebar.php") ?>
        <?php $this->load->view("templates/navbar.php") ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <h6 class="m-1 text-center text-dark bolder prox">SISTEM INFORMASI MONITORING DAN PELAPORAN DATA FARMASI</h6>
                    <h6 class="m-1 text-center text-dark bolder prox">RSUD PULANG PISAU</h6>

                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body table-responsive">
                                    <table id="table" class="table table-bordered table-striped bolder helv">
                                        <thead>
                                            <tr style="background-color:green">
                                                <th style="color: mintcream;">No Resep</th>
                                                <th style="color: mintcream;">No Rekam Medis</th>
                                                <th style="color: mintcream;">Nama Pasien</th>
                                                <th style="color: mintcream;">Nama Dokter</th>
                                                <th style="color: mintcream;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Resep Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Pasien</label>
                            <div class="col-md-12">
                                <input name="nm_pasien" placeholder="Nama Pasien" class="form-control" type="text" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




</body>
<?php $this->load->view("templates/footer.php") ?>
<?php $this->load->view("templates/js_ro.php") ?>


</html>