<?php include '../../lib/autoload.php';  ?>
<?php include '../../lib/session_checker.php'; ?>
<?php include '../../theme/partial/header.php'; ?>
<?php include '../../theme/partial/topbar.php'; ?>
<?php include '../../theme/partial/sidebar.php'; ?>
<?php 
use Lib\Database\Profil;
$profilObj = new Profil;
$profil = $profilObj->getProfil()->fetch_object();
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengaturan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengaturan</li>
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
        	<div class="card-header"><h2>Pengaturan</h2></div>
        	<div class="card-body">
        		<div class="row">
        			<div class="col-2" style="margin:0px auto; height: 150px;">
        				<img src="<?=BASE_URL?>/assets/<?=$profil->logo?>" alt="Profil" class="img-circle img-bordered-sm img-fluid mb-3" id="fotoProfil" style="height:100%;">
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-12">
        			</div>
        			<div class="col-12">
                <form method="POST" action="<?=BASE_URL?>/admin/pengaturan/update.php" enctype="multipart/form-data">
                  <input type="file" hidden onchange="showPreview(event);" id="inputFoto" name="foto">
                  <input type="hidden" name="id" value="<?=$profil->id?>">
        				<table class="table">
                  <tr>
                    <th>Nama Aplikasi</th>
                    <td><input type="text" class="form-control" name="nama" value="<?=$profil->nama?>"></td>
                  </tr>
                  <tr>
                    <th>Nama Instansi</th>
                    <td><input type="text" class="form-control" name="instansi" value="<?=$profil->instansi?>"></td>
                  </tr>
                  <tr>
                    <th>Provinsi</th>
                    <td><input type="text" name="provinsi" class="form-control" value="<?=$profil->provinsi?>"></td>
                  </tr>
                  <tr>
                    <th>Kota</th>
                    <td><input type="text" name="kota" class="form-control" value="<?=$profil->kota?>"></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td><input type="text" name="alamat" class="form-control" value="<?=$profil->alamat?>"></td>
                  </tr>

                  <tr>
                    <th><i class="fab fa-facebook-square"></i> Facebook</th>
                    <td><input type="text" name="fb" class="form-control" value="<?=$profil->fb?>"></td>
                  </tr>
                  <tr>
                    <th><i class="fab fa-twitter"></i> Twitter</th>
                    <td><input type="text" name="twitter" class="form-control" value="<?=$profil->twitter?>"></td>
                  </tr>

                  <tr>
                    <th><i class="fab fa-instagram"></i> Instagram</th>
                    <td><input type="text" name="ig" class="form-control" value="<?=$profil->ig?>"></td>
                  </tr>
        					<tr>
        						<td colspan="2"><input type="submit" class="form-control btn-success" name="submit" value="Simpan"></td>
        					</tr>
        				</table>
                </form>
        			</div>
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
<div class="modal fade" id="modal-update-password" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3>
            Ubah Password
        </h3>
      </div>
      <div class="modal-body">
        <form action="<?=BASE_URL?>/admin/profil/update_password.php" method="post">
          <div class="form-group">
            <label for="Password">Password Lama</label>
            <input type="password" class="form-control" name="old_password">
          </div>
          <div class="form-group">
            <label for="Password">Password Baru</label>
            <input type="password" class="form-control" name="new_password">
          </div>
          <div class="form-group">
            <label for="Password">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" name="confirm_new_password">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Simpan">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  
<?php include '../../theme/partial/footer.php'; ?>
<script>
  $("#fotoProfil").click(function(){
    $('#inputFoto').trigger('click');
  })

  function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("fotoProfil");
    preview.src = src;
    preview.style.display = "block";
  }
}
</script>
<?php if(!empty($_SESSION['error'])){?>
  <script>
    Swal.fire('Error', '<?=$_SESSION['errorMessage']?>', 'error');
  </script>
<?php 
unset($_SESSION['error']);
unset($_SESSION['errorMessage']);
}?>

<?php if(!empty($_SESSION['updateSuccess'])){?>
  <script>
    Swal.fire('Berhasil', '<?=$_SESSION['successMessage']?>', 'success');
  </script>
<?php 
unset($_SESSION['updateSuccess']);
unset($_SESSION['successMessage']);
}?>