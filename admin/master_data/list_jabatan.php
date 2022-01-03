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
            <h1 class="m-0">Master Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=BASE_URL?>">Home</a></li>
              <li class="breadcrumb-item active">Master Data</li>
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
            <div class="card-header"><h5 class="float-left">Data Jabatan</h5> 

                        <?php if($_SESSION['level'] == "Admin"){ ?>
              <button class="float-right btn btn-success" data-toggle="modal" data-target="#modal-add-pangkat"><i class="fa fa-plus"></i> Tambah data</button>
                        <?php } ?>
            </div>
            <div class="card-body">
              <!-- get list data Jabatan -->
                <?php 
                use Lib\Database\Master;
                $jabatanObj = new Master;
                $dataJabatan = $jabatanObj->getJabatan();
                ?>
              <!-- get list data Jabatan -->
              <table class="table table-striped table-bordered" id="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $n=0; while($row = $dataJabatan->fetch_assoc()){$n++; ?>
                  <tr>
                    <td><?=$n?></td>
                    <td><?=$row['nama']?></td>
                    <td>
                      <?php if($_SESSION['level'] == "Admin"){ ?>
                      <div class="btn-group">
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editModal" onClick="fill_edit_form('<?=$row['id']?>','<?=$row['nama']?>')"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger" onclick="deleteData('<?=$row['id']?>')"><i class="fa fa-trash"></i></button>
                        <?php } ?>
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
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?=BASE_URL?>/admin/master_data/act_edit_jabatan.php" method="POST">
      <div class="modal-body">
          <input type="text" value="" id="editFormJabatan" name="jabatan" class="form-control">
          <input type="text" value="" id="editFormId" name="id" hidden>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <input type="submit" class="btn btn-primary" value="Simpan"></input>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-add-pangkat" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?=BASE_URL?>/admin/master_data/act_add_jabatan.php" method="POST">
      <div class="modal-body">
          <input type="text" value=""  name="jabatan" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <input type="submit" class="btn btn-primary" value="Simpan"></input>
        </form>
      </div>
    </div>
  </div>
</div>

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
  function fill_edit_form(id,nama){
    $('#editFormJabatan').val(nama)
    $('#editFormId').val(id)
  }

function deleteData(id){
    Swal.fire({
      title: 'Hapus data?',
      showCancelButton: true,
      confirmButtonText: 'Hapus',
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        Swal.fire('Deleted!', 'data berhasil dihapus', 'success')
        window.location.href = '<?=BASE_URL?>/admin/master_data/delete_jabatan.php?id='+id
      } else if (result.isDenied) {
        Swal.fire('Changes are not saved', '', 'info')
      }
    })
  }
</script>