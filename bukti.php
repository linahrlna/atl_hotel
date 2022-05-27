<?php 
  include '../koneksi.php';
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ATLANTIC HOTEL | CETAK PRINT DATA PEMESANAN</title>
  <link rel="icon" type="image/png" href="../assets/dist/img/logo-atl.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/dist/css/style.css">
</head>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container">
    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                    <div class="text-center text-150">
                        <img src="../assets/dist/img/logo-atl.png" >
                            <span class="text-default-d3">BUKTI RESERVASI | ATLANTIC HOTEL</span>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">NO.</div>
                        <div class="d-none d-sm-block col-1">Nama</div>
                        <div class="d-none d-sm-block col-2">Tanggal Check In</div>
                        <div class="d-none d-sm-block col-2">Tanggal Check Out</div>
                        <div class="d-none d-sm-block col-1">Jumlah Kamar</div>
                        <div class="d-none d-sm-block col-2">Jenis Kamar</div>
                        <div class="d-none d-sm-block col-1">Harga</div>
                        <div class="d-none d-sm-block col-1">Status</div>
                    </div>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $id_pesanan = $_GET['id'];
                    $data = mysqli_query($koneksi, "select * from pesanan inner join kamar on pesanan.id_kamar=kamar.id_kamar where pesanan.id_pesanan=$id_pesanan");
                    while($d = mysqli_fetch_array($data)){
                    $harga= $d['harga'] * $d['jml_kamar']
                    ?> 
                    <div class="text-95 text-secondary-d3">
                        <div class="row mb-2 mb-sm-0 py-25">
                        <div class="d-none d-sm-block col-1"><?php echo $no++; ?></div>
                        <div class="d-none d-sm-block col-1"><?php echo $d['nama_tamu']; ?></div>
                        <div class="d-none d-sm-block col-2"><?php echo $d['check_in']; ?></div>
                        <div class="d-none d-sm-block col-2"><?php echo $d['check_out']; ?></div>
                        <div class="d-none d-sm-block col-1"><?php echo $d['jml_kamar']; ?></div>
                        <div class="d-none d-sm-block col-2"><?php echo $d['jenis_kamar']; ?></div>
                        <div class="d-none d-sm-block col-1"><?php echo $d['harga']; ?></div>
                        <div class="d-none d-sm-block col-1"><?php
                        if ($d['status'] == 1) { ?>
                            <span class="badge bg-warning">Belum di Konfirmasi</span>
                        <?php } else { ?>
                            <span class="badge bg-success">Sudah di Konfirmasi</span>
                        <?php } ?>
                        </div>
                        </div>
                    </div>
                    <?php 
                    } 
                    ?>
                <hr class="row brc-default-l1 mx-n1 mb-4" />
                    <div class="row border-b-2 brc-default-l2"></div>

                    <!-- or use a table instead -->
                    <!--
            <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                        <tr>
                            <td>1</td>
                            <td>Domain registration</td>
                            <td>2</td>
                            <td class="text-95">$10</td>
                            <td class="text-secondary-d2">$20</td>
                        </tr> 
                    </tbody>
                </table>
            </div>
            -->

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    SubTotal
                                </div>
                                <div class="col-5">
                                <span class="text-120 text-secondary-d1">Rp. <?php echo $harga; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
    
    

  <script>
		window.print();
	</script>

  <!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>


