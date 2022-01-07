<?php include '../../lib/autoload.php';  ?>
<?php include '../../lib/session_checker.php'; ?>
<?php 
use Lib\Database\Pelatihan;
$pelatihanObj = new Pelatihan;
$pelatihan = $pelatihanObj->getPelatihan();
if(!$pelatihan){echo $pelatihanObj->conn->error;die;}
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
					<h1 class="m-0"><i class="fa fa-book"></i> Data Pelatihan</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=BASE_URL?>">Home</a></li>
						<li class="breadcrumb-item active">Data Pelatihan</li>
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
					<h2 class="float-left">Pelatihan</h2>
					<?php if($_SESSION['level'] == "Admin" OR $_SESSION['level'] == "Diklit" ): ?>
					<button class="btn btn-primary float-right" data-toggle="modal" data-target="#add-modal">Baru</button>
                        <?php endif ?>
				</div>
				<div class="card-body">
					<table class="table table-striped col-12" id="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Pelatihan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $n=0; while ($row = $pelatihan->fetch_assoc() ): $n++ ?>
								<tr>
									<td><?=$n?></td>
									<td><?=$row['nama_pelatihan']?></td>
									<td><?php if($_SESSION['level'] == "Admin" OR $_SESSION['level'] == "Diklit" ): ?>
										<a class="btn btn-xs btn-danger" onclick="return confirm('Hapus pelatihan <?=$row['nama_pelatihan']?>')" title="Hapus" href="<?=BASE_URL?>/admin/pelatihan/del.php?id=<?=$row['id_pelatihan']?>"><i class="fa fa-trash"></i></a>
										<button class="btn btn-xs btn-primary" title="Edit" onclick="fillEdit('<?=$row['nama_pelatihan']?>','<?=$row['id_pelatihan']?>')"><i class="fa fa-edit"></i></button>
                        <?php endif ?>
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
	                    <input type="text" name="nama" id="editInput-nama" class="form-control float-right" >
	                    <input type="hidden" name="id" id="editInput-id" >
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
<script src="<?=BASE_URL?>/theme/AdminLTE/plugins/jquery/jquery.min.js"></script>
<?php include '../../theme/partial/footer.php'; ?>
<!-- DataTables  & Plugins -->
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
<script>
	$('#table').dataTable();

	function fillEdit(nama,id){
		$('#editInput-nama').val(nama)
		$('#editInput-id').val(id)
		$('#update-modal').modal('toggle');
	}
</script>

