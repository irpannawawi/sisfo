<?php include '../../../lib/autoload.php';  ?>
<?php include '../../../lib/session_checker.php'; ?>
<?php 
use Lib\Database\Pelatihan;
use Lib\Database\Pegawai;
$pelatihanObj = new Pelatihan;
$pegawaiObj = new Pegawai;
$pelatihan = $pelatihanObj->getPelatihan();
$all_pegawai = $pelatihanObj->getAllPegawai();
if(!$pelatihan){echo $pelatihanObj->conn->error;die;}
?>
<?php include '../../../theme/partial/header.php'; ?>
<?php include '../../../theme/partial/topbar.php'; ?>
<?php include '../../../theme/partial/sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><i class="fa fa-user-graduate"></i> Data Kelas / Peserta</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=BASE_URL?>">Home</a></li>
						<li class="breadcrumb-item active">Data Kelas / Peserta</li>
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
					<h2 class="float-left">Kelas / Peserta</h2>
				</div>
				<div class="card-body">
					<div id="accordion">
						<?php $n=0; while ($row = $pelatihan->fetch_assoc() ): $n++ ?>
						<div class="card bg-secondary ">
							<div class="card-header" id="heading<?=$n?>">
								<h3 class="mb-0">
									<button class="btn btn-link text-white font-weight-bold float-left <?=$n==1?'':'collapsed'?>" data-toggle="collapse" data-target="#collapse<?=$n?>" aria-expanded="true" aria-controls="collapseOne">
										#<?=$n?> <?=$row['nama_pelatihan']?>
									</button>
                        <?php if($_SESSION['level'] == "Admin" OR $_SESSION['level'] == "Diklit" ): ?>
									<button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#update-modal" onclick="fillIdPelatihan('<?=$row['id_pelatihan']?>')">Tambah Peserta</button>
                        <?php endif ?>
								</h3>
							</div>

							<div id="collapse<?=$n?>" class="collapse <?=$n==1?'show':''?>" aria-labelledby="heading<?=$n?>" data-parent="#accordion">
								<div class="card-body">
									<?php $peserta = $pelatihanObj->getKelasByPelatihan($row['id_pelatihan']);
									if ($peserta->num_rows <1) {
										echo "<small>Belum ada peserta yang terdaftar</small>";
									} ?>
									<ol class="ml-5">
										<?php while($row_peserta = $peserta->fetch_object()): ?>
											<li>
												<?=$row_peserta->nama?> <small class="text-light">(<?=$row_peserta->nip?>)</small>
												<a href="<?=BASE_URL?>/admin/pelatihan/peserta/del.php?id=<?=$row_peserta->id_kelas?>" class="text-danger" onclick="return confirm('Keluarkan <?=$row_peserta->nama?> dari kelas?')"><i class="fa fa-times"></i></a>
											</li>
										<?php endwhile ?>
									</ol>
								</div>
							</div>
						</div>
					<?php endwhile ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Buat Pelatihan baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=BASE_URL?>/admin/pelatihan/add.php" method="POST">
					<!-- Date range -->
					<div class="form-group">
						<label>Tanggal:</label>

						<div class="input-group">
							<input type="text" name="nama" class="form-control float-right" >
						</div>
						<!-- /.input group -->
					</div>
					<div class="form-group">
						<input type="submit" value="Buat" class="form-control btn btn-success">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Peserta baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=BASE_URL?>/admin/pelatihan/peserta/add.php" method="POST">
					<div class="form-group">
						<label>Tanggal Berakhir Pelatihan</label>
					<input type="text" id="datepicker" name="tanggal" class="form-control datepicker" placeholder="dd/mm/yyyy" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="">Pilih Peserta</label>
					<table id="table" class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Nip</th>
							</tr>
						</thead>
						<tbody>
							<?php $n=0; while($row_all_pegawai = $all_pegawai->fetch_object()): $n++; ?>
							<tr>
								<td><?=$n?></td>
								<td>
									<div class="form-check">
										<input name="peserta[]" class="form-check-input" type="checkbox" value="<?=$row_all_pegawai->nip?>" id="flexCheckDefault">
										<label for=""><?=$row_all_pegawai->nama?></label>
										</label>
									</div>
								</td>
								<td><?=$row_all_pegawai->nip?></td>
							</tr>
							<?php endwhile ?>
						</tbody>
					</table>
					</div>
					<div class="form-group">
						<input type="hidden" id="addInput-id_pelatihan" value="" name="id_pelatihan">
						<input type="submit" value="Tambah" class="form-control btn btn-success">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/jquery/jquery.min.js"></script>

<?php include '../../../theme/partial/footer.php'; ?>
<!-- DataTables  & Plugins -->
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
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<!-- date-range-picker -->
<script>
	$('#table').dataTable();

	function fillIdPelatihan(id){
		$('#addInput-id_pelatihan').val(id)
	}
</script>

<script>
  $( function() {
    $( ".datepicker" ).datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true
    });
  } );

  </script>