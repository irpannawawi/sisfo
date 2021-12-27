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
          <h1 class="m-0"><i class="fa fa-users"></i> Data Pengguna</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=BASE_URL?>">Home</a></li>
            <li class="breadcrumb-item active">Data Pengguna</li>
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
          <div class="card-header"><h5 class="float-left">Data Pengguna</h5> <button class="float-right btn btn-success" data-toggle="modal" data-target="#modal-add-user"><i class="fa fa-plus"></i> Tambah data</button></div>
          <div class="card-body">
            <!-- get list data Jabatan -->
            <?php 
            use Lib\Database\User;
            $usersObj = new User;
            $users = $usersObj->getUsers();

            ?>
            <!-- get list data Jabatan -->
            <table class="table table-striped table-bordered datatables-responsive" id="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $n=0; while($row = $users->fetch_assoc()){$n++; ?>
                  <tr>
                    <td><?=$n?></td>
                    <td><img src="<?=BASE_URL?>/assets/avatar/<?=$row['foto']?>" alt="foto" class="img img-circle" height="60" width="60"></td>
                    <td><?=$row['nip']?></td>
                    <td><?=$row['nama']?></td>
                    <td><?=$row['username']?></td>
                    <td>
                      <b style="color: <?=$row['level']=='Admin'?'red':'green';?>;">  
                        <?=strtoupper($row['level'])?></td>
                      </b>
                      <td nowrap>
                        <span for="" class="badge badge-<?=$row['status']=='Aktif'?'success':'danger'?>">
                          <?=$row['status']?>
                        </span>
                        <a class="btn btn-xs btn-primary" href="<?=BASE_URL?>/admin/data_pengguna/switch_status.php?id=<?=$row['id']?>"><i class="fa fa-sync-alt"></i></a></td>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editModal" onClick="fill_edit_form('<?=$row['username']?>', '<?=$row['nip']?>', '<?=$row['nama']?>', '<?=$row['gender']?>', '<?=$row['level']?>', '<?=$row['id']?>')"><i class="fa fa-edit"></i></button>
                          <button class="btn btn-sm btn-danger" onclick="deleteData('<?=$row['id']?>')"><i class="fa fa-trash"></i></button></td>
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
        <form action="<?=BASE_URL?>/admin/data_pengguna/edit.php" enctype="multipart/form-data" method="POST">
         <div class="modal-body">
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="inputUsername" required autocomplete="off">
            <input type="hidden" class="form-control" name="id" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">NIP</label>
            <input type="text" class="form-control" name="inputNip" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="inputPassword">
          </div>
          <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input type="text" class="form-control" name="inputNamaLengkap" required>
          </div>
          <div class=" row">
            <div class="col-6">
              <label for="">Jenis Kelamin</label>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="radioL" value="l">
                <label class="form-check-label">Laki-laki</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="radioP" value="p">
                <label class="form-check-label">Perempuan</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Level</label>
            <select name="inputLevel" id="inputEditLevel" class="form-control">
              <option value="Admin">Admin</option>
              <option value="User">User</option>
            </select>
          </div>
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
<div class="modal fade" id="modal-add-user" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content  bg-primary">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="form-group">
          <label for="">Username</label>
          <input type="text" class="form-control" id="inputUsername" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="">NIP</label>
          <input type="text" class="form-control" id="inputNip" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" class="form-control" id="inputPassword" required>
        </div>
        <div class="form-group">
          <label for="">Nama Lengkap</label>
          <input type="text" class="form-control" id="inputNamaLengkap" required>
        </div>
        <div class=" row">
          <div class="col-6">
            <label for="">Jenis Kelamin</label>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jk" value="Laki-laki">
              <label class="form-check-label">Laki-laki</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jk" value="Perempuan">
              <label class="form-check-label">Perempuan</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="">Level</label>
          <select id="inputLevel" class="form-control">
            <option value="Admin">Admin</option>
            <option value="User">User</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button onclick="addUser()" class="btn btn-success" >Simpan</button>

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
  url = '<?=BASE_URL?>/admin/data_pengguna/insert_data.php';

  $('#table').DataTable();
  function fill_edit_form(username, nip, namaLengkap, jenisKelamin, level, id){
    $("[name*='inputUsername']").val(username)
    $("[name*='inputNip']").val(nip)
    $("[name*='inputNamaLengkap']").val(namaLengkap)
    if (jenisKelamin=='l') {
      $("#radioL").attr('checked',true)
    }else{
      $("#radioP").attr('checked',true)
    }
    $("#inputEditLevel").val(level)
    $("[name*='id']").val(id)
  }


  function addUser(){
    let inputUsername = $('#inputUsername')
    let inputNip = $('#inputNip')
    let inputPassword = $('#inputPassword')
    let inputNamaLengkap = $('#inputNamaLengkap')
    let inputJenisKelamin = $("input[name*='jk']")
    let inputLevel = $('#inputLevel')
    let data = {
      username     : inputUsername.val(),
      nip          : inputNip.val(),
      password     : inputPassword.val(),
      namaLengkap  : inputNamaLengkap.val(),
      jenisKelamin : inputJenisKelamin.val(),
      level        : inputLevel.val()
    }
    $.post(url, data, function(data){
      data = JSON.parse(data)
      console.log(data)
      if (data.status == 'ok') {
        alert('ok')
        inputUsername.val('')
        inputNip.val('')
        inputPassword.val('')
        inputNamaLengkap.val('')
        inputJenisKelamin.val('')
        inputLevel.val('')
        $('#modal-add-user .close').click();
        Swal.fire('Berhasil', 'Data berhasil ditambahkan', 'success');
      }else{
        alert(data)
      }
    });
  }
  function deleteData(id){
    Swal.fire({
      title: 'Hapus data?',
      showCancelButton: true,
      confirmButtonText: 'Hapus',
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        urldelete = '<?=BASE_URL?>/admin/data_pengguna/delete.php'
        $.post(urldelete, {id:id}, function(data){
          data = JSON.parse(data)
          if (data.status == 'ok') {
            Swal.fire('Dihapus', 'Data user berhasil terhapus', 'error').then((result)=>{
              window.location.href = '<?=BASE_URL?>'+'/admin/data_pengguna/list_data_pengguna.php'
            });
          }else{
            console.log(data)
          }
        })
      } else if (result.isDenied) {
        Swal.fire('Changes are not saved', '', 'info')
      }
    })
  }
</script>
<?php 
  if($_SESSION['editSuccess']){

?>
<script>
        Swal.fire('Perubahan telah disimpan', '', 'info')  
</script>
<?php 
unset($_SESSION['editSuccess']);
}//endif ?>