<?php include '../lib/autoload.php'; ?>
<?php include '../lib/session_checker.php'; ?>
 <?php 
 use Lib\Database\Absensi;
 $absensiObj = new Absensi;
 $tgl = date('Y-m-d');
 $absensi = $absensiObj->getAbsensi($tgl);
 if(!$absensi){
  echo $absensiObj->conn->error;die;
 }
 ?>
<?php include '../theme/partial/header.php'; ?>
<?php include '../theme/partial/topbar.php'; ?>
<?php include '../theme/partial/sidebar.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <h3>Absensi Hari ini</h3>
          <table class="table table-striped col-12" id="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Lampiran</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Selfie</th>
              </tr>
            </thead>
            <tbody>
              <?php $n=0; while ($row = $absensi->fetch_assoc() ): $n++ ?>
                <tr>
                  <td><?=$n?></td>
                  <td><?=$row['nama']?></td>
                  <td><?=$row['tgl']?></td>
                  <td>
                    <h5><u><?=$row['tugas']?></u></h5>
                    <p><?=$row['keterangan']?></p>
                  </td>
                  <td><?=$row['jam_masuk']?></td>
                  <td><?=$row['jam_keluar']?></td>
                  <td><img src="<?=BASE_URL?>/assets/absensi/<?=$row['foto']?>" alt="" height="100" width="100"></td>
                </tr>
              <?php endwhile ?>
            </tbody>
          </table>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<?php include '../theme/partial/footer.php'; ?>