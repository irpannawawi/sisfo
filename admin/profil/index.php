<?php include '../../lib/autoload.php';  ?>
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
            <h1 class="m-0">Dashboard v3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
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
        	<div class="card-header"><h2>Profil</h2></div>
        	<div class="card-body">
        		<div class="row">
        			<div class="col-2" style="margin:0px auto; height: 150px;">
        				<img src="<?=BASE_URL?>/assets/avatar/<?=$_SESSION['foto']?>" alt="Profil" class="img-circle img-bordered-sm img-fluid" id="fotoProfil" style="height:100%;">
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-12">
						<h3 align="center"><?=$_SESSION['nama']?></h3>
        			</div>
        			<div class="col-12">
                <form method="POST" action="<?=BASE_URL?>/admin/profil/update_profile.php" enctype="multipart/form-data">
                  <input type="file" hidden onchange="showPreview(event);" id="inputFoto" name="foto">
                  <input type="hidden" name="id" value="<?=$_SESSION['user_id']?>">
        				<table class="table">
        					<tr>
        						<th>Nama Lengkap</th>
        						<td><input type="text" class="form-control" name="nama" value="<?=$_SESSION['nama']?>"></td>
        					</tr>
        					<tr>
        						<th>Username</th>
        						<td><input type="text" name="username" class="form-control" value="<?=$_SESSION['username']?>"></td>
        					</tr>
        					<tr>
        						<td colspan="2"><input type="submit" class="form-control btn-success" name="submit" value="Simpan"></td>
        					</tr>
        				</table>
                </form>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-update-password"> Ubah Password</button>
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