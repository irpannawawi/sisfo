<?php include '../../lib/autoload.php'; ?>
<?php include '../../lib/session_checker.php'; ?>
<?php 
use Lib\Database\Pegawai;
use Lib\Database\Master;
$masterData = new Master;
$pegawaiObj = new Pegawai;
$id_pegawai = $_GET['id'];
$pegawai = $pegawaiObj->getPegawaiById($id_pegawai)->fetch_object();
?>

<!-- INI UNTUK ISI -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
			<div class="panel-heading bg-aqua">
				<i class="fa fa-user fa-fw"></i> Data Diri
				<div class="pull-right">
					<label class="label" style="font-size: 15px;"> Pegawai : <?php echo $pegawai->nama;?>
				</label>
			</div>
		</div>

		<!-- INI BAGIAN ISI UTAMA -->
		<div class="panel-body table-responsive">
			<!-- INI BAGIAN TABEL -->
			
                        <?php if($_SESSION['level'] == "Admin"){ ?>
			<button class="btn btn-sm btn-warning m-2 p-1 float-right" data-toggle="modal" data-target="#modal-danger"><li class="fa fa-edit"></li> Edit</button>
                        <?php } ?>
			<table width="100%" class="tabel">
				<hr>
				<!--baris 1-->
				<tr>
					<td width="20%">
						<div class="form-group">
							Nip
						</div>
					</td>
					<td width="3%" >
						<div class="form-group">
							:
						</div>
					</td>
					<td width="30%">
						<div class="form-group">
							<?php echo $pegawai->nip;?>
						</div>
					</td>
					<td width="1%" ></td>
					<td width="22%">
						<div class="form-group">
							Pangkat / Golongan 
						</div>
					</td>
					<td width="3%" >
						<div class="form-group">
							:
						</div>
					</td>
					<td width="23%">
						<div class="form-group">
							<?php echo $pegawai->pangkat;?>
						</div>
					</td>
				</tr>
				<!--baris 2-->
				<tr>
					<td>
						<div class="form-group">
							Nama
						</div>
					</td>
					<td>
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->nama;?>
						</div>
					</td>
					<td ></td>
					<td>
						<div class="form-group">
							TMT / Golongan 
						</div>
					</td>
					<td>
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group" id="data_1">
							<?php if($pegawai->tmt_golongan=="0000-00-00") { } else{  echo TanggalIndo($pegawai->tmt_golongan); }?>
						</div>
					</td>
				</tr>
				<!-- baris 3 -->
				<tr>
					<td>
						<div class="form-group">
							Tempat Lahir
						</div>
					</td>
					<td>
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->tempat_lahir;?>
						</div>
					</td>
					<td ></td>
					<td>
						<div class="form-group">
							Jenis Kepegawaian
						</div>
					</td>
					<td>
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->jenis_pegawai;?>
						</div>
					</td>
				</tr>
				<!-- baris 4 -->
				<tr>
					<td>
						<div class="form-group">
							Tanggal Lahir
						</div>
					</td>
					<td >
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php if($pegawai->tgl_lahir=="0000-00-00"){} else { echo TanggalIndo($pegawai->tgl_lahir); }?>
						</div>
					</td>
					<td ></td>
					<td>
						<div class="form-group">
							TMT Capeg
						</div>
					</td>
					<td>
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php if($pegawai->tmt_capeg=="0000-00-00"){}else { echo TanggalIndo($pegawai->tmt_capeg);}?>
						</div>
					</td>
				</tr>
				<!-- baris 5 -->
				<tr>
					<td>
						<div class="form-group">
							Gender
						</div>
					</td>
					<td >
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php
							if($pegawai->gender=="l")
							{
								echo "Laki - Laki";
							}else {
								echo "Perempuan";
							}
							?>
						</div>
					</td>
					<td ></td>
					<td>
						<div class="form-group">
							Status Kepegawaian
						</div>
					</td>
					<td>
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->status_pegawai;?>
						</div>
					</td>
				</tr>
				<!-- baris 6  -->
				<tr>
					<td>
						<div class="form-group">
							Agama
						</div>
					</td>
					<td >
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->agama;?>
						</div>
					</td>
					<td ></td>
					<td>
						<div class="form-group">
							Jabatan Strukural
						</div>
					</td>
					<td>
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->jabatan;?>
						</div>
					</td>
				</tr>
				<!-- baris 6  -->
				<tr>
					<td>
						<div class="form-group">
							Kebangsaan
						</div>
					</td>
					<td >
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->kebangsaan;?>
						</div>
					</td>
					<td ></td>
					<td>
						<div class="form-group">
							Digaji Menurut <br>( PP / SK )
						</div>
					</td>
					<td>
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->digaji_menurut;?>
						</div>
					</td>
				</tr>
				<!-- baris 7  -->
				<tr>
					<td>
						<div class="form-group">
							Jumlah Keluarga
						</div>
					</td>
					<td >
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->jumlah_keluarga;?>
						</div>
					</td>
					<td ></td>
					<td>
						<div class="form-group">
							Gaji Pokok
						</div>
					</td>
					<td>
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							Rp.   <?php echo number_format($pegawai->gaji_pokok,0,".",".");?>
						</div>
					</td>
				</tr>
				<!-- baris 8  -->
				<tr>
					<td rowspan="2">
						<div class="form-group">
							Alamat
						</div>
					</td>
					<td rowspan="2">
						<div class="form-group">
							:
						</div>
					</td>
					<td rowspan="2">
						<div class="form-group">
							<?php echo $pegawai->alamat;?><br> Rt <?php echo $pegawai->rt;?>/Rw<?php echo $pegawai->rw;?>, Desa <?php echo $pegawai->rt;?><br> Kecamatan <?php echo $pegawai->kecamatan;?><br> Kabupaten <?php echo $pegawai->kabupaten;?>
						</div>
					</td>
					<td ></td>
					<td>
						<div class="form-group">
							Besarnya Penghasilan
						</div>
					</td>
					<td>
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php 
							$sql    = $pegawaiObj->getByNip($pegawai->nip);
							$row_gaji = mysqli_fetch_array($sql);
							?>
							Rp. <?php echo number_format($row_gaji['gaji_bersih'],0,".",".");?>
						</div>
					</td>
				</tr>
				<tr>
					<td width="3%"></td>
					<td>
						<div class="form-group">
							Nomor WhatsApp
						</div>
					</td>
					<td>
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->wa;?>
						</div>
					</td>
				</tr>
				<!-- baris 9  -->
				<tr>
					<td>
						<div class="form-group">
							SK Terakhir
						</div>
					</td>
					<td >
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->sk_terakhir;?>
						</div>
					</td>
					<td ></td>
					<td>
						<div class="form-group">
							Masa Kerja Golongan
						</div>
					</td>
					<td>
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->masa_kerja_golongan;?>
						</div>
					</td>
				</tr>
				<!-- baris 10  -->
				<tr>
					<td>
						<div class="form-group">
							NPWP
						</div>
					</td>
					<td >
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->npwp;?>
						</div>
					</td>
					<td ></td>
					<td>
						<div class="form-group">
							Masa Kerja Keseluruhan
						</div>
					</td>
					<td>
						<div class="form-group">
							:
						</div>
					</td>
					<td>
						<div class="form-group">
							<?php echo $pegawai->masa_kerja_keseluruhan;?>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
