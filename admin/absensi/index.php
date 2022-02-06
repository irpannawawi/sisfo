<?php include '../../lib/autoload.php'; ?>
<?php include '../../lib/session_checker.php'; ?>
 <?php 
 use Lib\Database\Absensi;
 $absensiObj = new Absensi;
 $tgl = date('Y-m-d');
 $absensi = $absensiObj->getAbsensi($tgl);
 if(!$absensi){
  echo $absensiObj->conn->error;die;
 }
 ?>
<?php include '../../theme/partial/header.php'; ?>
<?php include '../../theme/partial/topbar.php'; ?>
<?php include '../../theme/partial/sidebar.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Absensi</h1>
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
        <div class="card">
          <div class="card-header">
                <h3 style="float: left;">Laporan Absensi</h3>
                <button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModalLong">Print Laporan</button>
          </div>
          <div class="cord-body">
              <form action="<?=BASE_URL?>/admin/absensi/print.php" method="post" target="__blank">
            <div class="row m-3">
              <div class="input-group input-group-sm mb-3 col-md-4" style="float: right;">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" name="tgl" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?=date('d-m-Y')?>" id="input-date">
                <div class="input-group-append">
                  <button  class="btn-primary" id="inputGroup-sizing-sm"><i class="fa fa-print"></i></button>
                </div>
              </div>
            </div>
              </form>
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
        </div>
       
          
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-3">
        <form action="<?=BASE_URL?>/admin/absensi/print_bulanan.php" method="post" target="__blank">
        <div class="form-group">
          <label for="bulan">Bulan :</label>
          <select name="bulan" id="bulan" class="form-control">
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
        <div class="form-group">
          <label for="tahun">Bulan :</label>
          <select name="tahun" id="tahun" class="form-control">
            <?php for($i = 2021; $i< date('Y')+6; $i++){ ?>
            <option value="<?=$i?>"><?=$i?></option>
          <?php }?>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" value="Print" class="btn btn-primary">
        </div>
      </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  
<?php include '../../theme/partial/footer.php'; ?>
<script>
  const inputDate = $('#input-date');
  inputDate.datepicker({
    dateFormat: 'dd-mm-yy'
  });

  inputDate.on('change', function(){
    const datapost = {tgl: inputDate.val()}
    const url = '<?=BASE_URL?>'+'/admin/absensi/list.php' 
    $.post(url, datapost, function(data){
      $('#table').html(data)
    });
  });
</script>