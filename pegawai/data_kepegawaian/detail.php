<?php include '../../lib/autoload.php';  ?>
<?php include '../../lib/session_pegawai.php'; ?>
<?php include '../partial/header.php'; ?>
<?php include '../partial/topbar.php'; ?>
<?php include '../partial/sidebar.php'; ?>

<?php 
use Lib\Database\Pegawai;
use Lib\Database\Master;
use Lib\Database\Gaji;
use Lib\Database\User;
$masterData = new Master;
$pegawaiObj = new Pegawai;
$gajiObj = new Gaji;
$nip = $_GET['nip'];
$pegawai = $pegawaiObj->getByNip($nip)->fetch_object();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0"><i class="fa fa-street-view"></i> Data Pegawai</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=BASE_URL?>">Home</a></li>
						<li class="breadcrumb-item active">Data Pegawai</li>
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
					<ul class="nav nav-tabs float-left">
						<li class="nav-item">
							<a href="#" class="nav-link active" id="tabDataDiri" onclick="switchTabs('dataDiri','<?=$pegawai->nip?>')"><i class="fa fa-user fa-fw"></i>Data Diri</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link" id="tabSuamiIstri" onclick="switchTabs('dataSuamiIstri','<?=$pegawai->nip?>')" ><i class="fa fa-street-view fa-fw"></i>Data Istri / Suami</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"  id="tabAnak" onclick="switchTabs('dataAnak','<?=$pegawai->nip?>')"><i class="fa fa-venus-double fa-fw"></i>Data Anak</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link" id="tabPenghasilan" onclick="switchTabs('dataPenghasilan','<?=$pegawai->nip?>')"><i class="fa fa-money fa-fw"></i>Penghasilan</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"  id="tabLampiran" onclick="switchTabs('dataLampiran','<?=$pegawai->nip?>')"><i class="fa fa-file-archive-o fa-fw"></i>Lampiran</a>
						</li>
					</ul>
					<form method="post" action="<?=BASE_URL?>/pegawai/data_kepegawaian/surat_keterangan.php" target="_blank">
									<input name="pencetak" type="hidden" value="<?php echo $_SESSION['nama'];?>"></input>
									<input name="nip_cetak" type="hidden" value="<?php echo $_SESSION['nip'];?>"></input>
									<input name="nip" type="hidden" value="<?php echo $pegawai->nip?>"></input>
									<div class="float-right">
										<button type="submit" class="btn btn-sm btn-primary m-2 p-1" name="ctk"  title="Data Pegawai"><i class="fa fa-print fa-fw"></i> Cetak</button>
									</div>
								</form>
				</div>	<!-- ./ card header -->
				<div class="card-body" id="pageContent">
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
							</div>

							<!-- INI BAGIAN ISI UTAMA -->
							<div class="panel-body table-responsive">
								<!-- INI BAGIAN TABEL -->
								
								<button class="btn btn-sm btn-warning m-2 p-1 float-right" data-toggle="modal" data-target="#modal-danger"><li class="fa fa-edit"></li> Edit</button>
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
												$sql    = $gajiObj->getGajiBersih($pegawai->nip);
												if($sql != 0){

												$row_gaji = mysqli_fetch_array($sql);
												}else{
													$row_gaji['gaji_bersih'] = 0;
												}
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
					</div><!-- ./row -->
				</div> <!-- ./ card body -->
			</div><!-- End card -->
		</div>
	</section>


	<!--Modal Untuk Ubah Data -->
	<div class="modal modal-primary fade" id="modal-danger">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Ubah Data Kepegawaian</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					</div>
					<form name="kategori" action="<?=BASE_URL?>/pegawai/data_kepegawaian/act_edit.php" method="POST" onsubmit="return validasi();">
						<table width="100%">
							<hr>
							<!--baris 1-->
							<tr>
								<td width="13%" style="padding-left: 20px;">
									<div class="form-group">
										Nip
									</div>
								</td>
								<td width="3%">
									<div class="form-group">
										:
									</div>
								</td>
								<td width="22%">
									<div class="form-group">
										<input name="nip" class="form-control" placeholder="Nip" autocomplete="off"  onkeypress="return angka(event);" value="<?php echo $pegawai->nip;?>" readonly=""></input>
										<input type="hidden" name="id" value="<?=$pegawai->id?>"> 
									</div>
								</td>
								<td width="3%"></td>
								<td width="17%">
									<div class="form-group">
										Pangkat / Golongan 
									</div>
								</td>
								<td width="3%">
									<div class="form-group">
										:
									</div>
								</td>
								<td width="30%"   style="padding-right: 20px;">
									<div class="form-group">
										<select name="pangkat" style="width: 100%" id="pangkat" class="form-control select2">
											<?php
											include ("config/koneksi.php");
											$pangkat = $masterData->getPangkat();
											while($row_pangkat = mysqli_fetch_array($pangkat)) {     
                                                // MENAMPILKAN OPSI Kategori
												if ($pegawai->pangkat=="$row_pangkat[nama]") {
													echo "<option value='".$row_pangkat['nama']."' selected >".$row_pangkat['nama']."</option>";
												}
												else 
												{
													echo "<option value='".$row_pangkat['nama']."'>".$row_pangkat['nama']."</option>";
												}
											}
											?>
										</select>
									</div>
								</td>
							</tr>
							<!--baris 2-->
							<tr>
								<td  style="padding-left: 20px;">
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
										<input name="nama" class="form-control" value="<?php echo $pegawai->nama;?>" placeholder="Nama" autocomplete="off" required=""></input>
									</div>
								</td>
								<td width="3%"></td>
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
								<td   style="padding-right: 20px;">
									<div class="form-group" id="data_1">
										<div class="form-group input-group date" id="ex2" >
											<input name="tmt_golongan" value="<?php echo $pegawai->tmt_golongan;?>" class="form-control datepicker" style="z-index: 1050 !important;" placeholder="Masukkan Tanggal" >
											<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										</div>
									</div>
								</td>
							</tr>
							<!-- baris 3 -->
							<tr>
								<td  style="padding-left: 20px;">
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
										<input name="tempat" value="<?php echo $pegawai->tempat_lahir;?>" class="form-control" placeholder="Tempat Lahir" autocomplete="off" required=""></input>
									</div>
								</td>
								<td width="3%"></td>
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
								<td   style="padding-right: 20px;">
									<div class="form-group">
										<select name="jenis_pegawai" style="width: 100%" id="jenis_pegawai" class="select2 form-control">
											<?php
											$jenis = $masterData->getJenis();
											while($row_jenis = mysqli_fetch_array($jenis)) {     
                                                // MENAMPILKAN OPSI Kategori
												if ($pegawai->jabatan=="$row_jenis[nama]") {
													echo "<option value='".$row_jenis['nama']."' selected >".$row_jenis['nama']."</option>";
												}
												else 
												{
													echo "<option value='".$row_jenis['nama']."'>".$row_jenis['nama']."</option>";
												}
											}
											?>
										</select>
									</div>
								</td>
							</tr>
							<!-- baris 4 -->
							<tr>
								<td  style="padding-left: 20px;">
									<div class="form-group">
										Tanggal Lahir
									</div>
								</td>
								<td width="3%">
									<div class="form-group">
										:
									</div>
								</td>
								<td width="30%">
									<div class="form-group">
										<table width="100%">
											<td width="15%">
												<select name="hari" style="color: black;" class="form-control select2">
													<?php     
													$tgl = date('d',strtotime($pegawai->tgl_lahir));
                                            // MENAMPILKAN OPSI Kategori
													echo "<option value='$tgl'>$tgl</option>"; 
													?>
													<?php for($hari=1;$hari<=31;$hari++)
													{
													?> <option value="<?php echo $hari;?>"><?php echo $hari;?></option>
													<?php
												}?>
											</select>
										</td>
										<td width="20%" style="padding-left: 5px;">
											<select name="bulan" style="color: black;" class="form-control select2">
												<?php     
												$bln = date('F',strtotime($pegawai->tgl_lahir));
												$bln1 = date('m',strtotime($pegawai->tgl_lahir));
                                            // MENAMPILKAN OPSI Kategori
												echo "<option value='$bln1'>$bln</option>"; 
												?>
												<?php 
												$namabulan=array("Januari", "Februari", "Maret", "April", "Mei", "juni", "juli", "Agustus", "September", "Oktober", "November", "Desember");
												?>
												<?php for($bulan=1;$bulan<=12;$bulan++)
												{
													?>
													<option value="<?php echo $bulan;?>"><?php echo $namabulan[$bulan-1];?></option>
													<?php
												} ?>
											</select>
										</td>
										<td width="20%"  style="padding-left: 5px;">
											<select name="tahun" style="color: black;" class="form-control select2">
												<?php     
												$thn = date('Y',strtotime($pegawai->tgl_lahir));
                                            // MENAMPILKAN OPSI Kategori
												echo "<option value='$thn'>$thn</option>"; 
												?>
												<?php for($tahun=date('Y'); $tahun>=1900; $tahun--)
												{
													?>
													<option value="<?php echo $tahun;?>"><?php echo $tahun;?></option>
												<?php } ?>
											</select>
										</td>
									</table>
								</div>
							</td>
							<td width="3%"></td>
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
							<td   style="padding-right: 20px;">
								<div class="form-group input-group date" id="ex2" data-date="" data-date-format="yyyy-mm-dd">
									<input name="tmt_capeg" style="z-index: 1050 !important;"  class="form-control datepicker" placeholder="Masukkan Tanggal" value="<?php echo $pegawai->tmt_capeg;?>" >
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>
							</td>
						</tr>
						<!-- baris 5 -->
						<tr>
							<td  style="padding-left: 20px;">
								<div class="form-group">
									Gender
								</div>
							</td>
							<td width="3%">
								<div class="form-group">
									:
								</div>
							</td>
							<td width="30%">
								<div class="form-group">
									<table width="100%">
										<?php 
                                    // CEK PILIHAN SEBELUMNYA
										if($pegawai->gender == "l") {
											$L    = "checked";
											$P    = "";
										}
										else {
											$L    = "";
											$P    = "checked";
										}
										?>
										<tr>
											<td>
												<input name="gender" type="radio" id="optionsRadios1" value="l" required="" <?php echo $L; ?>>
											</td>
											<td> Laki - Laki

												<td width="2%"></td>
											</td>
											<td>
												<input name="gender" type="radio" id="optionsRadios1" value="p" required="" <?php echo $P; ?>>
											</td>
											<td>Perempuan
											</td>
										</tr>
									</table>
								</div>
							</td>
							<td width="3%"></td>
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
							<td   style="padding-right: 20px;">
								<div class="form-group">
									<select name="status_pegawai" style="width: 100%" id="status_pegawai" class="form-control select2">
										<?php
										$query_status = "select * from jabatan WHERE jenis='status'"; 
										$status = $masterData->getStatus();
										while($row_status = mysqli_fetch_array($status)) {     
                                                // MENAMPILKAN OPSI Kategori
											if ($pegawai->jabatan=="$row_status[nama]") {
												echo "<option value='".$row_status['nama']."' selected >".$row_status['nama']."</option>";
											}
											else 
											{
												echo "<option value='".$row_status['nama']."'>".$row_status['nama']."</option>";
											}
										}
										?>
									</select>
								</div>
							</td>
						</tr>
						<!-- baris 6  -->
						<tr>
							<td  style="padding-left: 20px;">
								<div class="form-group">
									Agama
								</div>
							</td>
							<td width="3%">
								<div class="form-group">
									:
								</div>
							</td>
							<td width="30%">
								<div class="form-group">
									<select name="agama_pegawai" id="agama" style="color: black;" class="form-control select2">
										<option <?=$pegawai->agama=="Islam"?"selected":''?> value="Islam">Islam</option>
										<option <?=$pegawai->agama=="Kristen"?"selected":''?> value="Kristen">Kristen</option>
										<option <?=$pegawai->agama=="Katolik"?"selected":''?> value="Katolik">Katolik</option>
										<option <?=$pegawai->agama=="Budha"?"selected":''?> value="Budha">Budha</option>
										<option <?=$pegawai->agama=="Hindu"?"selected":''?> value="Hindu">Hindu</option>
									</select>
								</div>
							</td>
							<td width="3%"></td>
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
							<td   style="padding-right: 20px;">
								<div class="form-group">
									<select name="jabatan" style="width: 100%" id="jabatan" class="form-control select2">
										<?php 
										$jabatan = $masterData->getJabatan();
										while($row_jabatan = mysqli_fetch_array($jabatan)) 
										{ 
											if ($pegawai->jabatan=="$row_jabatan[nama]") {
												echo "<option value='".$row_jabatan['nama']."' selected >".$row_jabatan['nama']."</option>";
											}
											else 
											{
												echo "<option value='".$row_jabatan['nama']."'>".$row_jabatan['nama']."</option>";
											}
										}
										?>
									</select>
								</div>
							</td>
						</tr>
						<!-- baris 6  -->
						<tr>
							<td  style="padding-left: 20px;">
								<div class="form-group">
									Kebangsaan
								</div>
							</td>
							<td width="3%">
								<div class="form-group">
									:
								</div>
							</td>
							<td width="30%">
								<select name="kebangsaan" style="width: 100%" id="sk_terakhir" class="select2 form-control">
									<?php
									if ($pegawai->kebangsaan=="WNI") {
										echo "<option value='WNI' selected >WNI</option>";
									}
									else 
									{
										echo "<option value='WNI'>WNI</option>";
									}
									if ($pegawai->kebangsaan=="WNA") {
										echo "<option value='WNA' selected >WNA</option>";
									}
									else 
									{
										echo "<option value='WNA'>WNA</option>";
									}

									?>
								</select>
							</div>
						</td>
						<td width="3%"></td>
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
						<td   style="padding-right: 20px;">
							<div class="form-group">
								<input name="gaji" value="<?php echo $pegawai->digaji_menurut;?>" class="form-control" required="" autocomplete="off"></input>
							</div>
						</td>
					</tr>
					<!-- baris 7  -->
					<tr>
						<td  style="padding-left: 20px;">
							<div class="form-group">
								Jumlah Keluarga
							</div>
						</td>
						<td width="3%">
							<div class="form-group">
								:
							</div>
						</td>
						<td width="30%">
							<div class="form-group">
								<input name="jml_keluarga" value="<?php echo $pegawai->jumlah_keluarga;?>" style="width: 60px" type="number" value="0" min="0" class="form-control"></input>
							</div>
						</td>
						<td width="3%"></td>
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
						<td   style="padding-right: 20px;">
							<div class="form-group">
								<input name="gaji_pokok" id="gaji_pokok" value="<?php echo number_format($pegawai->gaji_pokok,0,".",".");?>" onkeypress="return angka(event);" class="form-control" autocomplete="off"></input>
							</div>
						</td>
					</tr>
					<!-- baris 8  -->
					<tr>
						<td  style="padding-left: 20px;" rowspan="2">
							<div class="form-group">
								Alamat
							</div>
						</td>
						<td width="3%" rowspan="2">
							<div class="form-group">
								:
							</div>
						</td>
						<td width="30%" rowspan="2">
							<div class="form-group">
								<table width="100%">
									<tr>
										<td colspan="3">
											<input name="alamat" class="form-control" value="<?php echo $pegawai->alamat;?>" required="" placeholder="Alamat"></input>
										</td>
									</tr>
									<tr>
										<td width="20%">
											<input name="rt" onkeypress="return angka(event)" class="form-control" placeholder="RT" value="<?php echo $pegawai->rt;?>"></input>
										</td>
										<td width="20%">
											<input name="rw" value="<?php echo $pegawai->rw;?>" onkeypress="return angka(event)" class="form-control" placeholder="RW"></input>
										</td>
										<td width="60%">
											<input name="desa" value="<?php echo $pegawai->desa;?>" class="form-control" placeholder="Desa"></input>
										</td>
									</tr>
									<tr>
										<td width="20%" colspan="3">
											<input name="kecamatan" value="<?php echo $pegawai->kecamatan;?>" class="form-control" placeholder="Kecamatan"></input>
										</td>
									</tr>
									<tr>
										<td width="20%" colspan="3">
											<input name="kabupaten" value="<?php echo $pegawai->kabupaten;?>" class="form-control" placeholder="Kabupaten / kotamadya"></input>
										</td>
									</tr>
								</table>
							</div>
						</td>
						<td width="3%"></td>
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
						<td   style="padding-right: 20px;">
							<div class="form-group">
								<input name="penghasilan" value="<?php echo number_format($row_gaji['gaji_bersih'],0,".",".");?>" onkeypress="return angka(event);" class="form-control" readonly="" ></input>
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
								<input name="wa" onkeypress="return angka(event);" class="form-control" value="<?php echo $pegawai->wa;?>" placeholder="Nomor WhatsApp" ></input>
							</div>
						</td>
					</tr>
					<!-- baris 9  -->
					<tr>
						<td  style="padding-left: 20px;">
							<div class="form-group">
								SK Terakhir
							</div>
						</td>
						<td width="3%">
							<div class="form-group">
								:
							</div>
						</td>
						<td width="30%">
							<div class="form-group">
								<select name="sk_terakhir" style="width: 100%" id="sk_terakhir" class="select2 form-control">
									<?php
									$sk = $masterData->getSk();
									while($row_sk= mysqli_fetch_array($sk)) {     
                                                // MENAMPILKAN OPSI Kategori
										if ($pegawai->sk_terakhir=="$row_sk[keterangan]") {
											echo "<option value='".$row_sk['keterangan']."' selected >".$row_sk['keterangan']."</option>";
										}
										else 
										{
											echo "<option value='".$row_sk['keterangan']."'>".$row_sk['keterangan']."</option>";
										}
									}
									?>
								</select>
							</div>
						</td>
						<td width="3%"></td>
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
						<td   style="padding-right: 20px;">
							<div class="form-group">
								<input name="masa_golongan" value="<?php echo $pegawai->masa_kerja_golongan;?>" class="form-control" required="" autocomplete="off"></input>
							</div>
						</td>
					</tr>
					<!-- baris 10  -->
					<tr>
						<td  style="padding-left: 20px;">
							<div class="form-group">
								NPWP
							</div>
						</td>
						<td width="3%">
							<div class="form-group">
								:
							</div>
						</td>
						<td width="30%">
							<div class="form-group">
								<input name="npwp" value="<?php echo $pegawai->npwp;?>" class="form-control" autocomplete="off"></input>
							</div>
						</td>
						<td width="3%"></td>
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
						<td  style="padding-right: 20px;">
							<div class="form-group">
								<input name="masa_keseluruhan" value="<?php echo $pegawai->masa_kerja_keseluruhan;?>" class="form-control" required="" autocomplete="off"></input>
							</div>
						</td>
					</tr>
				</table>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
					<input id="button" type="submit" name="submit" class="btn btn-outline btn-xl"  value="Simpan" >
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<?php include '../../theme/partial/footer.php'; ?>
<!-- DataTables  & Plugins -->
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
	function switchTabs(tabName, nip){
		if(tabName == 'dataDiri'){
			url = '<?=BASE_URL?>'+'/pegawai/data_kepegawaian/data_diri_partial.php?nip='+'<?=$pegawai->nip?>';
			// switch active tab 
			$('.nav-link').removeClass('active');
			$('#tabDataDiri').addClass('active');
		}else if(tabName == 'dataSuamiIstri'){
			url = '<?=BASE_URL?>'+'/pegawai/data_kepegawaian/data_suami_istri.php?nip='+'<?=$pegawai->nip?>';
			// switch active tab 
			$('.nav-link').removeClass('active');
			$('#tabSuamiIstri').addClass('active');
		}else if(tabName == 'dataAnak'){
			url = '<?=BASE_URL?>'+'/pegawai/data_kepegawaian/data_anak.php?nip='+nip;
			// switch active tab 
			$('.nav-link').removeClass('active');
			$('#tabAnak').addClass('active');
		}else if(tabName == 'dataPenghasilan'){
			url = '<?=BASE_URL?>'+'/pegawai/data_kepegawaian/data_penghasilan.php?nip='+'<?=$pegawai->nip?>';
			// switch active tab 
			$('.nav-link').removeClass('active');
			$('#tabPenghasilan').addClass('active');
		}else if(tabName == 'dataLampiran'){
			url = '<?=BASE_URL?>'+'/pegawai/data_kepegawaian/data_lampiran.php?nip='+'<?=$pegawai->nip?>';
			// switch active tab 
			$('.nav-link').removeClass('active');
			$('#tabLampiran').addClass('active');
		}
		// load page 
		$.get(url,{nip:nip},function(data){
			$('#pageContent').html(data);
		});

	}
</script>
<script>
  $( function() {
    $( ".datepicker" ).datepicker({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: "1950:2070"
    });
  } );

  </script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<?php if (!empty($_SESSION['updateSuccess'])) { unset($_SESSION['updateSuccess'])?>
  <script>
    Swal.fire('Berhasil', 'Data pegawai telah dirubah', 'success');
  </script>
<?php }?>
<?php if (!empty($_SESSION['insertSuccess'])) { unset($_SESSION['insertSuccess'])?>
  <script>
    Swal.fire('Berhasil', 'Data pegawai telah dirubah', 'success');
  </script>
<?php }?>

<?php if (!empty($_SESSION['errorUpload'])) { unset($_SESSION['errorUpload'])?>
  <script>
    Swal.fire('Gagal', '<?=$_SESSION['errorMessage']?>', 'error');
  </script>
<?php unset($_SESSION['errorMessage']); }?>



<?php if (!empty($_SESSION['tabOpen'])) { ?>
  <script>
   switchTabs('<?=$_SESSION['tabOpen']?>', '<?=$pegawai->nip?>');
  </script>
<?php unset($_SESSION['tabOpen']); } ?>