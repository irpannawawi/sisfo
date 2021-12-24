<?php include '../../lib/autoload.php'; ?>
<?php include '../../lib/session_checker.php'; ?>
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
          <h1 class="m-0"><i class="fa fa-street-view"></i> Data Pegawai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=BASE_URL?>">Home</a></li>
            <li class="breadcrumb-item active">Data Pegawai</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card col">
          <div class="card-header"><h5 class="float-left">Data Pegawai</h5> <a href="<?=BASE_URL?>/admin/data_kepegawaian/tambah_data.php" class="float-right btn btn-success"><i class="fa fa-plus"></i> Tambah data</a></div>
          <div class="card-body">
            <!-- get list data Jabatan -->
            <?php 
            use Lib\Database\Pegawai;
            $pegawaiObj = new Pegawai;
            $pegawai = $pegawaiObj->getPegawai();
            ?>
            <!-- get list data Jabatan -->
            <table class="table table-striped table-bordered datatables-responsive" id="table" style="font-size: 14px;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Pegawai</th>
                  <th>Jabatan</th>
                  <th>Gender</th>
                  <th>Agama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $n=0; while($row = $pegawai->fetch_assoc()){$n++; ?>
                  <tr>
                    <td><?=$n?></td>
                    <td><?=$row['nip']?></td>
                    <td><?=$row['nama']?></td>
                    <td><?=$row['jabatan']?></td>
                    <td><?=$row['gender']?></td>
                    <td><?=$row['agama']?></td>
                    
                      <td>
                        <div class="btn-group">
                          <a href="<?=BASE_URL?>/admin/data_kepegawaian/detail.php?id=<?=$row['id']?>" class="btn btn-sm btn-info" ><i class="fa fa-info"></i></a>
                          <button class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button></td>
                        </div>
                      </td>
                    </tr>
                  <?php } // endwhile ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include '../../theme/partial/footer.php'; ?>
<!-- DataTables  & Plugins -->
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $('#table').DataTable();
</script>

<?php if ($_SESSION['insertSuccess']) { unset($_SESSION['insertSuccess'])?>
  <script>
    Swal.fire('Berhasil', 'Data pegawai sudah dimasukan', 'success');
  </script>
<?php }?>