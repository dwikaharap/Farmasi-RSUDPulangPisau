<nav class="main-header navbar navbar-expand navbar">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <!-- <img src="<?php echo base_url('assets/dist') ?>/img/kalender.png" class="brand-image"> &nbsp; -->

        <li class="nav-item d-none d-sm-inline-block">
            <div class="nav-link">

                <body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
                    <?php
                    $hari = date('l');
                    /*$new = date('l, F d, Y', strtotime($Today));*/
                    if ($hari == "Sunday") {
                        echo "Minggu";
                    } elseif ($hari == "Monday") {
                        echo "Senin";
                    } elseif ($hari == "Tuesday") {
                        echo "Selasa";
                    } elseif ($hari == "Wednesday") {
                        echo "Rabu";
                    } elseif ($hari == "Thursday") {
                        echo ("Kamis");
                    } elseif ($hari == "Friday") {
                        echo "Jumat";
                    } elseif ($hari == "Saturday") {
                        echo "Sabtu";
                    }
                    ?>,

                    <?php
                    $tgl = date('d');
                    echo $tgl;
                    $bulan = date('F');
                    if ($bulan == "January") {
                        echo " Januari ";
                    } elseif ($bulan == "February") {
                        echo " Februari ";
                    } elseif ($bulan == "March") {
                        echo " Maret ";
                    } elseif ($bulan == "April") {
                        echo " April ";
                    } elseif ($bulan == "May") {
                        echo " Mei ";
                    } elseif ($bulan == "June") {
                        echo " Juni ";
                    } elseif ($bulan == "July") {
                        echo " Juli ";
                    } elseif ($bulan == "August") {
                        echo " Agustus ";
                    } elseif ($bulan == "September") {
                        echo " September ";
                    } elseif ($bulan == "October") {
                        echo " Oktober ";
                    } elseif ($bulan == "November") {
                        echo " November ";
                    } elseif ($bulan == "December") {
                        echo " Desember ";
                    }
                    $tahun = date('Y');
                    echo $tahun;
                    ?>
                    &nbsp; | &nbsp;
                    <span id="clock"> </span> WIB
                </body>
            </div>



        </li>

    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <ul>
                <a href='<?php echo base_url('login/logout'); ?>'>
                    <button type="button" class="btn btn-danger">
                        <i class="nav-icon fas fa-sign-out-alt">&nbsp Log Out</i>
                    </button>
                </a>
            </ul>
        </li>
    </ul>




</nav>




<script type="text/javascript">
    function tampilkanwaktu() { //fungsi ini akan dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik    
        var waktu = new Date(); //membuat object date berdasarkan waktu saat 
        var sh = waktu.getHours() + ""; //memunculkan nilai jam, //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length    //ambil nilai menit
        var sm = waktu.getMinutes() + ""; //memunculkan nilai detik    
        var ss = waktu.getSeconds() + ""; //memunculkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
    }
</script>

<!--
    <nav class="navbar navbar-expand navbar-white">
     
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>
    </nav>
    -->