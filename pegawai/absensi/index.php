<?php include '../../lib/autoload.php';  ?>
<?php include '../../lib/session_pegawai.php'; ?>
<?php include '../partial/header.php'; ?>
<?php include '../partial/topbar.php'; ?>
<?php include '../partial/sidebar.php'; ?>

<?php 
use Lib\Database\Absensi;
$absensiObj = new Absensi;
$nip = $_SESSION['nip'];
$absensi = $absensiObj->getByNip($nip);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><i class="fa fa-street-view"></i> Data Absensi</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=BASE_URL?>">Home</a></li>
						<li class="breadcrumb-item active">Data Absensi</li>
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
					<h2 class="float-left">Absensi</h2>
					<button class="btn btn-primary float-right" data-toggle="modal" data-target="#absen-modal">Absen</button>
				</div>
				<div class="card-body">
					<h3>Riwayat Absensi</h3>
					<table class="table table-striped col-12" id="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Jam Masuk</th>
								<th>Jam Keluar</th>
								<th>Selfie</th>
							</tr>
						</thead>
						<tbody>
							<?php $n=0; while ($row = $absensi->fetch_assoc() ): $n++ ?>
								<tr>
									<td><?=$n?></td>
									<td><?=$row['tgl']?></td>
									<td><?=$row['jam_masuk']?></td>
									<td><?=$row['jam_keluar']?></td>
									<td><?=$row['foto']?></td>
								</tr>
							<?php endwhile ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="absen-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Silahkan menekan tombol <b>Snap</b> kemudian teka tombol <b>Hadir</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body row">
				<div id="my_camera" class="col-8"></div>
				<div class="col-3">
					<div id="imgPreview" class="mb-2"></div>
					<form method="POST" action="<?=BASE_URL?>/pegawai/absensi/proses_absen.php" encypt="multipart/form-data">
						<input type="hidden" name="foto" id="foto" required>
						<input type="submit" class="btn btn-success mb-3 form-control" value="Hadir" name="submit">
					</form>
					<button class="btn btn-primary" onclick="take_snapshot()">take snap</button>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<?php include '../../theme/partial/footer.php'; ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

<script>
	$('#table').dataTable();
</script>

<script language="JavaScript"> 

    Webcam.set({ 

        width: 480, 

        height: 390, 

        image_format: 'jpeg', 

        jpeg_quality: 100 

    }); 

   

    Webcam.attach( '#my_camera' ); 

   

    function take_snapshot() { 

        Webcam.snap( function(data_uri) { 

            $("#foto").val(data_uri); 

            document.getElementById('imgPreview').innerHTML = '<img class="img-fluid" src="'+data_uri+'"/>'; 

        } ); 

    } 

</script> 