<?php include '../../lib/autoload.php'; 
session_start(); ?>
<?php include '../../theme/partial/header.php'; ?>
<?php include '../../theme/partial/topbar.php'; ?>
<?php include '../../theme/partial/sidebar.php'; ?>

<?php 
use Lib\Database\Berkascapeg;
use Lib\Database\Capeg;
$berkasObj = new Berkascapeg;
$capegObj = new Capeg;
$id = $_SESSION['user_id'];
$capeg = $capegObj->getCapegToRivew();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><i class="fa fa-file"></i> Data Calon Pegawai</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						<li class="breadcrumb-item active">Data Calon Pegawai</li>
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
					<h2 class="float-left">Calon Pegawai</h2>
				</div>
				<div class="card-body">
					<h3>Daftar Calon Pegawai</h3>
					<table class="table table-bordered table-striped col-12" id="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Berkas</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $n=0; while ($row = $capeg->fetch_assoc() ): $n++ ?>
								<tr>
									<td><?=$n?></td>
									<td><?=$row['nama']?></td>
									<td><?php 
									$berkas = $berkasObj->getBerkasById($row['id']);?>
										<ol>
										<?php while($row_berkas = $berkas->fetch_assoc()):?>
											<li><a href="<?=BASE_URL?>/assets/berkas_capeg/<?=$row_berkas['berkas']?>"><?=$row_berkas['berkas']?></a>
												<h5><strong>Keterangan</strong></h5>
												<p><?=$row_berkas['keterangan']?></p>
											</li>
										<?php endwhile; ?>
										</ol>
										
									</td>
									<td>
										
										<?php if(!$row['diterima']){ ?>
                        <?php if($_SESSION['level'] == "Admin"){ ?>
										<a title="Terima" onclick="return confirm('Terima calon Pegawai?')" class="btn btn-sm btn-primary" href="<?=BASE_URL?>/admin/capeg/terima.php?id=<?=$row['id']?>"><i class="fa fa-check"></i></a>
                        <?php } ?>
										<a  class="btn btn-sm btn-danger" onclick="return confirm('Tolak calon Pegawai?')" href="<?=BASE_URL?>/admin/capeg/tolak.php?id=<?=$row['id']?>"><i class="fa fa-times"></i></a>
										<?php }else{ echo "Telah diterima"; }?>
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

