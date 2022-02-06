<?php include '../../lib/autoload.php';  ?>
<?php include '../../lib/session_pegawai.php'; ?>
<?php include '../partial/header.php'; ?>
<?php include '../partial/topbar.php'; ?>
<?php include '../partial/sidebar.php'; ?>

<?php 
use Lib\Database\Cuti;
$cutiObj = new Cuti;
$nip = $_SESSION['nip'];
$cuti = $cutiObj->getByNip($nip);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><i class="fa fa-file"></i> Data Lampiran</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=BASE_URL?>">Home</a></li>
						<li class="breadcrumb-item active">Data Cuti</li>
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
					<h2 class="float-left">Lampiran</h2>
					<button class="btn btn-danger float-right" data-toggle="modal" data-target="#absen-modal">Tambah</button>
				</div>
				<div class="card-body">
					<h3>Daftar lampiran</h3>
					<table class="table table-striped col-12" id="table">
						<thead>
							<tr>
								<th>No</th>
								<th>jenis_cuti</th>
								<th>alasan</th>
								<th>Tanggal Mulai</th>
								<th>Sampai Dengan</th>
								<th>Nip Atasan</th>
								<th>Status Pengajuan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $n=0; while ($row = $cuti->fetch_assoc() ): $n++ ?>
								<tr>
									<td><?=$n?></td>
									<td><?=$row['jenis_cuti']?></td>
									<td><?=$row['alasan']?></td>
									<td><?=$row['tgl_a']?></td>
									<td><?=$row['tgl_b']?></td>
									<td><?=$row['nip_atasan']?></td>
									<td><span class="badge badge-<?php if($row['status']=="Diterima"){echo "success"; }elseif($row['status']=="Tolak"){echo "danger";}else{echo "info";}?>"><?=$row['status']?></span></td>
									<td>
										<a class="btn btn-xs btn-danger" title="Hapus" href="<?=BASE_URL?>/pegawai/absensi/del_cuti.php?id=<?=$row['id_cuti']?>"><i class="fa fa-trash"></i></a>
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

<div class="modal fade" id="absen-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ajukan Cuti baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=BASE_URL?>/pegawai/absensi/add_cuti.php" method="POST">
					
					<!-- Date range -->
	                <div class="form-group">
	                  <label>Tanggal:</label>

	                  <div class="input-group">
	                    <div class="input-group-prepend">
	                      <span class="input-group-text">
	                        <i class="far fa-calendar-alt"></i>
	                      </span>
	                    </div>
	                    <input type="text" name="tanggal" class="form-control float-right" id="reservation">
	                  </div>
	                  <!-- /.input group -->
	                </div>
	                <!-- /.form group -->
					<div class="form-group">
						<label for="">Jenis Cuti</label>
						<select name="jenis" id="jenis_cuti" class="form-control">
							<option value="Sakit">Sakit</option>
							<option value="Cuti Besar">Cuti Besar</option>
							<option value="Cuti Tahunan">Cuti Tahunan</option>
							<option value="Alasan Penting">Alasan Penting</option>
						</select>
					</div>
					<div class="form-group">
						<!-- Default radio -->
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="ket"/>
						  <label class="form-check-label" for="flexRadioDefault1"> Default radio </label>
						</div>
					</div>
					<div class="form-group">
						<label for="">Keterangan</label>
						<textarea name="alasan" id="keterangan" cols="30" rows="4" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" value="Ajukan" class="form-control btn btn-danger">
					</div>
				</form>
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

