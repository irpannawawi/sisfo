<?php include '../../lib/autoload.php'; ?>
<?php include '../../lib/session_checker.php'; ?>
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

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                    <div class="panel-heading bg-aqua">
                        <i class="fa fa-users fa-fw"></i> Insert data
                    </div>

                    <!-- INI BAGIAN ISI UTAMA -->
                    <div class="panel-body table-responsive">
                        <!-- INI BAGIAN TABEL -->
                        <form name="kategori" action="<?=BASE_URL?>/admin/data_kepegawaian/act_tambah_data.php" method="POST" onsubmit="return validasi();">
                           <table width="100%">
                            <hr>
                            <!--baris 1-->
                            <tr>
                                <td width="13%">
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
                                        <input name="nip" class="form-control" placeholder="Nip" autocomplete="off"  onkeypress="return angka(event);" required=""></input>
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
                                <td width="30%">
                                    <div class="form-group">
                                        <select name="pangkat" id="pangkat" class="form-control select2">
                                            <option value=" ">- Pilih Pangkat / Golongan -</option>
                                            <option value=" ">Kosong</option>
                                            <?php
                                            use Lib\Database\Master;
                                            $masterData = new Master();
                                            $pangkat = $masterData->getPangkat();
                                            while($row_pangkat = mysqli_fetch_array($pangkat)) {     
                                                // MENAMPILKAN OPSI Kategori
                                                echo "<option value='$row_pangkat[nama]'>$row_pangkat[nama]</option>"; 
                                            }
                                            ?>
                                        </select>
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
                                        <input name="nama" class="form-control" placeholder="Nama" autocomplete="off" required=""></input>
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
                                <td>
                                    <div class="input-group date">
                        <input type="text" class="form-control datepicker" name="tmt_golongan" id="reservationdate" value="<?=date('d-m-Y')?>" />
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
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
                                        <input name="tempat" class="form-control" placeholder="Tempat Lahir" autocomplete="off" required=""></input>
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
                                <td>
                                    <div class="form-group">
                                        <select name="jenis_pegawai" id="jenis_pegawai" class="select2 form-control">
                                            <option value=" ">- Pilih Jenis Kepegawaian -</option>
                                            <option value=" ">Kosong</option>
                                            <?php
                                            include ("config/koneksi.php");
                                            $jenis = $masterData->getJenis();
                                            while($row_jenis = mysqli_fetch_array($jenis)) {     
                                                // MENAMPILKAN OPSI Kategori
                                                echo "<option value='$row_jenis[nama]'>$row_jenis[nama]</option>"; 
                                            }
                                            ?>
                                        </select>
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
                                                <option value=" ">Tgl</option>
                                                <?php for($hari=1;$hari<=31;$hari++)
                                                {
                                                ?> <option value="<?php echo $hari;?>"><?php echo $hari;?></option>
                                                <?php
                                            }?>
                                        </select>
                                    </td>
                                    <td width="20%" style="padding-left: 5px;">
                                      <select name="bulan" style="color: black;" class="form-control select2">
                                        <option value=" ">Bulan</option>
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
                                    <option value="">Tahun</option>
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
                <td>
                    <div class="input-group date">
                        <input type="text" class="form-control datepicker" name="tmt_capeg"  value="<?=date('d-m-Y')?>" />
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
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
                <td width="3%">
                    <div class="form-group">
                        :
                    </div>
                </td>
                <td width="30%">
                    <div class="form-group">
                        <table width="100%">
                            <tr>
                                <td>
                                    <input name="gender" type="radio" id="optionsRadios1" value="l" required="">
                                </td>
                                <td> Laki - Laki

                                    <td width="2%"></td>
                                </td>
                                <td>
                                    <input name="gender" type="radio" id="optionsRadios1" value="p" required="">
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
                <td>
                    <div class="form-group">
                        <select name="status_pegawai" id="status_pegawai" class="form-control select2">
                            <option value=" ">- Pilih Status Kepegawaian -</option>
                            <option value=" ">Kosong</option>
                            <?php
                            include ("config/koneksi.php"); 
                            $status = $masterData->getStatus();
                            while($row_status = mysqli_fetch_array($status)) {     
                                                // MENAMPILKAN OPSI Kategori
                                echo "<option value='$row_status[nama]'>$row_status[nama]</option>"; 
                            }
                            ?>
                        </select>
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
                <td width="3%">
                    <div class="form-group">
                        :
                    </div>
                </td>
                <td width="30%">
                    <div class="form-group">
                        <select name="agama_pegawai" id="agama" style="color: black;" class="form-control">
                            <option value=" ">Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
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
                <td>
                    <div class="form-group">
                        <select name="jabatan" id="jabatan" class="form-control select2">
                            <option value=" ">- Pilih Jabatan Struktural -</option>
                            <option value=" ">Kosong</option>
                            <?php
                            include ("config/koneksi.php");
                            $jabatan = $masterData->getJabatan();
                            while($row_jabatan = mysqli_fetch_array($jabatan)) {     
                                                // MENAMPILKAN OPSI Kategori
                                echo "<option value='$row_jabatan[nama]'>$row_jabatan[nama]</option>"; 
                            }
                            ?>
                        </select>
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
                <td width="3%">
                    <div class="form-group">
                        :
                    </div>
                </td>
                <td width="30%">
                    <div class="form-group">
                        <select name="kebangsaan" class="form-control">
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
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
            <td>
                <div class="form-group">
                    <input name="gaji" class="form-control" value="PP No 30 Tahun 2015" required="" autocomplete="off"></input>
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
            <td width="3%">
                <div class="form-group">
                    :
                </div>
            </td>
            <td width="30%">
                <div class="form-group">
                    <input name="jml_keluarga" style="width: 60px" type="number" value="0" min="0" class="form-control"></input>
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
            <td>
                <div class="form-group">
                    <input name="gaji_pokok" id="gaji_pokok" onkeypress="return angka(event);" class="form-control" autocomplete="off"></input>
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
                                <input name="alamat" class="form-control" required="" placeholder="Alamat"></input>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%">
                                <input name="rt" onkeypress="return angka(event)" class="form-control" placeholder="RT"></input>
                            </td>
                            <td width="20%">
                                <input name="rw" onkeypress="return angka(event)" class="form-control" placeholder="RW"></input>
                            </td>
                            <td width="60%">
                                <input name="desa" class="form-control" placeholder="Desa"></input>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%" colspan="3">
                                <input name="kecamatan" class="form-control" placeholder="Kecamatan"></input>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%" colspan="3">
                                <input name="kabupaten" class="form-control" placeholder="Kabupaten / kotamadya"></input>
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
            <td>
                <div class="form-group">
                    <input name="penghasilan" onkeypress="return angka(event);" class="form-control" readonly="" value="0"></input>
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
                    <input name="wa" onkeypress="return angka(event);" class="form-control" placeholder="Nomor WhatsApp" ></input>
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
            <td width="3%">
                <div class="form-group">
                    :
                </div>
            </td>
            <td width="30%">
                <div class="form-group">
                    <select name="sk_terakhir" id="sk_terakhir" class="form-control select2">
                        <option value=" ">- SK Terakhir-</option>
                        <option value="">Kosong</option>
                        <?php
                        $query_s = "select * from sk"; 
                        $s = $masterData->getSk();
                        while($row_s = mysqli_fetch_array($s)) {     
                                                // MENAMPILKAN OPSI Kategori
                            echo "<option value='$row_s[keterangan]'>SK.$row_s[keterangan]</option>"; 
                        }
                        ?>
                        <option value="SK KGB">SK KGB</option>
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
            <td>
                <div class="form-group">
                    <input name="masa_golongan" class="form-control" required="" autocomplete="off"></input>
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
            <td width="3%">
                <div class="form-group">
                    :
                </div>
            </td>
            <td width="30%">
                <div class="form-group">
                    <input name="npwp" class="form-control" autocomplete="off"></input>
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
            <td>
                <div class="form-group">
                    <input name="masa_keseluruhan" class="form-control" required="" autocomplete="off"></input>
                </div>
            </td>
        </tr>
    </table>
    <br>
    <center>
        <a href="?controller=pegawai&method=select" class="btn btn-md btn-success"><i class="fa fa-close fa-fw"></i> Batal</a>
        <button class="btn btn-md btn-primary"><i class="fa fa-download fa-fw"></i> Simpan</button>
    </center>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include '../../theme/partial/footer.php'; ?>


  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  

<script>
  $( function() {
    $( ".datepicker" ).datepicker({
        dateFormat: 'dd-mm-yy'
    });
  } );
  </script>