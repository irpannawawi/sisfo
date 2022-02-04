<?php include '../lib/autoload.php'; 
session_start(); ?>
<?php include 'partial/header.php'; ?>

<?php 
use Lib\Database\Berkascapeg;
use Lib\Database\Capeg;
$berkasObj = new Berkascapeg;
$capegObj = new Capeg;
$id = $_SESSION['user_id'];
$berkas = $berkasObj->getBerkasById($id);
$capeg = $capegObj->getById($_SESSION['user_id'])->fetch_object();
?>


  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h2 class="float-left">DAFTAR</h2>
        </div>
        <div class="card-body">
          <h3>Lengkapi data diri anda</h3>
          <div class="col-12">
            <form action="register.php" method="POST">
            <table class="table table-striped table-bordered">
              <tr>
                <th>Username</th>
                <td><input type="text" name="username" value="<?=$_POST['username']?>" class="form-control" required autocomplete="off"></td>
              </tr>
              <tr>
                <th>Nama Lengkap</th>
                <td><input type="text" name="nama_lengkap" value="<?=$_POST['nama_lengkap']?>" class="form-control" required autocomplete="off"></td>
              </tr>
              <tr>
                <th>NIK</th>
                <td><input type="number" name="nik" class="form-control" required autocomplete="off"></td>
              </tr>
              <tr>
                <th>Tempat Lahir</th>
                <td><input type="text" name="tempat_lahir" class="form-control" required autocomplete="off"></td>
              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td><input type="date" name="tanggal_lahir" class="form-control" required autocomplete="off"></td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td>
                  <select name="jenis_kelamin" id="js" class="form-control" required autocomplete="off">
                    <option value="" disabled selected>---Pilih Jenis Kelamin---</option>  
                    <option value="Laki-laki" >Laki-laki</option>  
                    <option value="Perempuan" >Perempuan</option>  
                  </select>
                </td>
              </tr>
              <tr>
                <th>Status Pernikahan</th>
                <td><input type="text" name="status_pernikahan" class="form-control" required autocomplete="off"></td>
              </tr>
              <tr>
                <th>Agama</th>
                <td><input type="text" name="agama" class="form-control" required autocomplete="off"></td>
              </tr>
              <tr>
                <th>Alamat Lengkap</th>
                <td><textarea  name="alamat" class="form-control" required autocomplete="off"></textarea></td>
              </tr>
              <tr>
                <th>Nomor Telepon</th>
                <td><input type="text" name="wa" class="form-control" required autocomplete="off" value="<?=$_POST['wa']?>"></td>
              </tr>

              <tr>
                <th>Email</th>
                <td><input type="text" name="email" class="form-control" required autocomplete="off"></td>
              </tr>
              <tr>
                <th>Katasandi</th>
                <td><input type="password" name="password" value="<?=$_POST['password']?>"  class="form-control" required autocomplete="off"></td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" name="submit" value="Daftar"  class="form-control btn btn-primary" required autocomplete="off"></td>
              </tr>
            </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include '../theme/partial/footer.php'; ?>
<!-- DataTables  & Plugins -->
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
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
  $('#table').dataTable();
</script>

