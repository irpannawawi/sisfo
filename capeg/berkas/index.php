<?php include '../../lib/autoload.php'; 
session_start(); ?>
<?php include '../partial/header.php'; ?>
<?php include '../partial/topbar.php'; ?>
<?php include '../partial/sidebar.php'; ?>

<?php 
use Lib\Database\Berkascapeg;
use Lib\Database\Capeg;
$berkasObj = new Berkascapeg;
$capegObj = new Capeg;
$id = $_SESSION['user_id'];
$berkas = $berkasObj->getBerkasById($id);
$capeg = $capegObj->getById($_SESSION['user_id'])->fetch_object();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><i class="fa fa-file"></i> Data Berkas</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=BASE_URL?>">Home</a></li>
						<li class="breadcrumb-item active">Data Berkas</li>
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
					<h2 class="float-left">Berkas</h2>
					<?php if($capeg->pengajuan_berkas == 0){ ?>
					<div class="btn-group  float-right" >
						<a href="<?=BASE_URL?>/capeg/berkas/kirim.php" onclick="return confirm('Apakah anda sudah yakin dengan berkas yang akan dikirimkan?')" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Kirim</a>
					<button class="btn btn-success" data-toggle="modal" data-target="#absen-modal">Buat Baru</button>
					</div>
					<?php }else{ ?>
						<p class="alert alert-info float-right">Berks Anda sedang diperiksa</p>
					<?php } ?>
				</div>
				<div class="card-body">
					<h3>Daftar Berkas Lamaran</h3>
					<table class="table table-bordered table-striped col-12" id="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Jenis</th>
								<th>Keterangan</th>
								<th>Berkas</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $n=0; while ($row = $berkas->fetch_assoc() ): $n++ ?>
								<tr>
									<td><?=$n?></td>
									<td><?=$row['jenis']?></td>
									<td><?=$row['keterangan']?></td>
									<td><a target="__blank" href="<?=BASE_URL?>/assets/berkas_capeg/<?=$row['berkas']?>"><?=$row['berkas']?></a></td>
									<td>
										<?php if($capeg->pengajuan_berkas == 0){ ?>
										<a  class="btn btn-xs btn-danger" href="<?=BASE_URL?>/capeg/berkas/delete.php?id=<?=$row['id_berkas']?>"><i class="fa fa-trash"></i></a>
									<?php } ?>
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
				<h5 class="modal-title" id="exampleModalLabel">Buat berkas baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=BASE_URL?>/capeg/berkas/upload.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="jenis">Jenis</label>
						<select name="jenis" id="jenis" class="form-control">
							<option value="Tes Kesehatan">Tes Kesehatan</option>
							<option value="Tes Kesehatan">Tes Fisik</option>
							<option value="Lain-lain">Lain-lain</option>
						</select>
					</div>
					<div class="form-group"><label for="keterangan">Keterangan</label>
						<input type="text" class="form-control" name="keterangan">
					</div>
					<div class="form-group"><label for="berkas">Berkas</label>
						<input type="file" class="form-control mb-1" name="berkas">
					</div>
					<div class="form-group">
						<input type="submit" class="form-control btn btn-success" value="Lampirkan">
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

