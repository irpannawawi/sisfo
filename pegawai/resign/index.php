<?php include '../../lib/autoload.php';  ?>
<?php include '../../lib/session_pegawai.php'; ?>
<?php include '../partial/header.php'; ?>
<?php include '../partial/topbar.php'; ?>
<?php include '../partial/sidebar.php'; ?>

<?php 
use Lib\Database\Resign;
use Lib\Database\Pegawai;
$resignObj = new Resign;
$pegawaiObj = new Pegawai;
$nip = $_SESSION['nip'];
$resign = $resignObj->getByNip($nip)->fetch_object();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><i class="fa fa-calendar"></i> Data Resign</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=BASE_URL?>">Home</a></li>
						<li class="breadcrumb-item active">Data Resign</li>
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
					<h2 class="float-left">Resign</h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-3" style="margin:0px auto;">
							<?php if(empty($resign->status)){?>
								<button class="btn btn-primary form-control" onclick="confirmAction()">Ajukan</button>
							<?php }else{ ?>
								<p>Status pengajuan anda sedang diperiksa...</p>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include '../../theme/partial/footer.php'; ?>
<!-- DataTables  & Plugins -->
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/moment/moment.min.js"></script>
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
<!-- date-range-picker -->
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<script>
	$('#table').dataTable();
    $('#reservation').daterangepicker()

    function confirmAction(){
    	Swal.fire({
  title: 'Apakah anda yakin akan mengajukan Resign?',
  showDenyButton: true,
  confirmButtonText: 'Ajukan',
  denyButtonText: `Batal`,
}).then((result)=>{
	if (result.isConfirmed) {
		url = "<?=BASE_URL?>/pegawai/resign/add.php"
		window.location.href = url
	}else{
		return false
	}
})
    }
</script>

