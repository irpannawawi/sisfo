<?php include '../../lib/autoload.php';  ?>
<?php include '../../lib/session_checker.php'; ?>
<?php 
use Lib\Database\Resign;
use Lib\Database\Pegawai;
$resignObj = new Resign;
$pegawaiObj = new Pegawai;
$cuti = $resignObj->getPengajuanResign();
if(!$cuti){echo $resignObj->conn->error;die;}
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
					<h1 class="m-0"><i class="fa fa-times"></i> Data Resign</h1>
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
					<h3>Pengajuan Resign</h3>
					<table class="table table-striped col-12" id="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>NIP</th>
								<th>Atasan</th>
								<th>Nip Atasan</th>
								<th>Status Pengajuan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $n=0; while ($row = $cuti->fetch_assoc() ): $n++ ?>
								<tr>
									<td><?=$n?></td>
									<td><?=$row['nama']?></td>
									<td><?=$row['nip']?></td>
									<td>
										<?php $pegawai = $pegawaiObj->getByNip($row['nip_atasan'])->fetch_object();?>
										<?=!empty($pegawai->nama)?$pegawai->nama:'';?>
									</td>
									<td><?=$row['nip_atasan']?></td>
									<td><span class="badge badge-<?php if($row['status']=="Diterima"){echo "success"; }elseif($row['status']=="Tolak"){echo "danger";}else{echo "info";}?>"><?=$row['status']?></span></td>
									<td>
										<?php if($row['status']=='Menunggu'){?>
											<div class="btn-group">
										<a class="btn btn-xs btn-success" title="Terima" onclick="return confirm('Apakah anda yakin ingin MENERIMA resign ini')" href="<?=BASE_URL?>/admin/resign/terima.php?id=<?=$row['id_resign']?>"><i class="fa fa-check"></i></a>
										<a class="btn btn-xs btn-danger" title="Tolak" onclick="return confirm('Apakah anda yakin ingin MENOLAK resign ini')" href="<?=BASE_URL?>/admin/resign/tolak.php?id=<?=$row['id_resign']?>">&nbsp;<i class="fa fa-times"></i>&nbsp;</a>
											</div>
										<?php }else{ echo "-"; } ?>
									</td>
								</tr>
							<?php endwhile ?>
						</tbody>
					</table>
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
</script>

