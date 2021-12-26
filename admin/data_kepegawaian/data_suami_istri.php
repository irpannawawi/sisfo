<?php include '../../lib/autoload.php'; ?>
<?php include '../../lib/session_checker.php'; ?>
<?php 
use Lib\Database\Keluarga; 
$keluargaObj = new Keluarga; 

use Lib\Database\Pegawai; 
$pegawaiObj = new Pegawai; 
?>

<!-- INI BAGIAN TABEL -->
<table width="100%" id="tabel" class="table-striped table-bordered table-hover datatable">
  <thead>
    <tr class="odd bg-gray">
      <th width="1%">No</th>
      <th><center>Nama Istri / Suami</center></th>
      <th><center>Tempat, Tanggal Lahir</center></th>
      <th><center>NIP/NIK</center></th>
      <th><center>Pekerjaan</center></th>
      <th width="10%"><center>Tanggal Nikah</center></th>
      <th><center>Istri / Suami ke</center></th>
      <th><center>Penghasilan / Bulan</center></th>
      <th><center>Aksi</center></th>
    </tr>
  </thead>
  <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
  <tbody>
    <?php
     // SET NOMOR URUT DATA
    $nomor          =   1;

    // CEK DATA YANG DITERIMA
    $nip = $_GET['nip'];
    $data_keluarga = $keluargaObj->getKeluarga($nip);
    if(isset($data_keluarga) AND $data_keluarga->num_rows > 0) {
      while($row_keluarga  = mysqli_fetch_array($data_keluarga)) {
        ?>

        <tr class="odd gradeX">
          <td><?php echo $nomor; ?></td>
          <td><?php echo $row_keluarga['nama']; ?></td>
          <td><?php echo $row_keluarga['tempat']; ?>, <?php echo TanggalIndo($row_keluarga['tgl_lahir']); ?></td>
          <td><?php echo $row_keluarga['nik']; ?></td>
          <td><?php echo $row_keluarga['pekerjaan']; ?></td>
          <td><?php echo TanggalIndo($row_keluarga['tgl_nikah']); ?></td>
          <td align="center"><?php echo $row_keluarga['ke']; ?></td>
          <td align="right"><?php echo number_format($row_keluarga['penghasilan']); ?></td>
          <td><center>

            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ubah<?php echo $row_keluarga['id']; ?>"> <li class="fa fa-edit"></li> </button>
            <!--Modal Untuk Tambah Data -->
            <div class="modal modal-success fade" id="ubah<?php echo $row_keluarga['id']; ?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Istri/Suami</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    </div>
                    <form role="form" method="POST" name="kategori" action="<?=BASE_URL?>/admin/data_kepegawaian/act_edit_keluarga.php" enctype="multipart/form-data" onsubmit="return validasi();">
                      <table width="100%" class="modal-body">
                        <tr>
                          <td>
                            <div class="modal-body">
                              <label>Nama Istri / Suami</label>
                            </div>
                          </td>
                          <td>
                            <div class="modal-body">
                              :
                            </div>
                          </td>
                          <td>
                            <div class="modal-body">
                              <input type="hidden" name="nip" value="<?php echo $row_detail['nip'];?>"></input>
                              <input type="hidden" name="id" value="<?php echo $row_keluarga['id'];?>"></input>
                              <input type="hidden" name="id_pegawai" value="<?php echo $_GET['id'];?>"></input>
                              <input type="text" name="nama" id="nomor_kas" class="form-control" placeholder="Nama Istri / Suami" value="<?php echo $row_keluarga['nama'];?>" required oninvalid="this.setCustomValidity('Masukan Nama Istri / Suami')" oninput="setCustomValidity('')" autocomplete="off" style="width: 100%">
                            </div>
                          </td>
                          <td></td>
                          <td>
                            <div class="modal-body">
                              <label>Pekerjaan</label>
                            </div>
                          </td>
                          <td>
                            <div class="modal-body">
                              :
                            </div>
                          </td>
                          <td>
                            <div class="modal-body">
                              <input type="text" name="pekerjaan" value="<?php echo $row_keluarga['pekerjaan'];?>" id="nomor_kas" class="form-control" placeholder="Pekerjaan" required oninvalid="this.setCustomValidity('Masukan Pekerjaan')" oninput="setCustomValidity('')" autocomplete="off" style="width: 100%">
                            </div>
                          </td>
                        </tr>
                        <!-- 2 -->
                        <tr>
                          <td>
                            <div class="modal-body">
                              <label>Tempat Lahir</label>
                            </div>
                          </td>
                          <td>
                            <div class="modal-body">
                              :
                            </div>
                          </td>
                          <td>
                            <div class="modal-body">
                              <input type="text" name="tempat" value="<?php echo $row_keluarga['tempat'];?>" id="nomor_kas" class="form-control" placeholder="Tempat Lahir" required oninvalid="this.setCustomValidity('Masukan Tempat Lahir')" oninput="setCustomValidity('')" autocomplete="off" style="width: 100%">
                            </div>
                          </td>
                          <td></td>
                          <td>
                            <div class="modal-body">
                              <label>Tanggal Pekawinan</label>
                            </div>
                          </td>
                          <td>
                            <div class="modal-body">
                              :
                            </div>
                          </td>
                          <td>
                            <div class="modal-body">
                              <div class="form-group input-group date" id="ex2" data-date="" data-date-format="yyyy-mm-dd">
                                <input name="tgl_perkawinan"  class="form-control" placeholder="Masukkan Tanggal" value="<?php echo $row_keluarga['tgl_nikah'];?>" readonly="readonly">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <!--3-->
                        <tr>
                          <td>
                            <div class="modal-body">
                              <label>Tanggal Lahir</label>
                            </div>
                          </td>
                          <td>
                            <div class="modal-body">
                              :
                            </div>
                          </td>
                          <td>
                            <div class="modal-body">
                              <table width="100%">
                                <td width="15%">
                                  <select name="hari" style="color: black;" class="form-control select2">
                                    <?php     
                                    $tgl = date('d',strtotime($row_keluarga['tgl_lahir']));
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
                                  $bln = date('m',strtotime($row_keluarga['tgl_lahir']));
                                  $bln2 = date('F',strtotime($row_keluarga['tgl_lahir']));
                                          // MENAMPILKAN OPSI Kategori
                                  echo "<option value='$bln'>$bln2</option>"; 
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
                                  $thn = date('Y',strtotime($row_keluarga['tgl_lahir']));
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
                        <td></td>
                        <td>
                          <div class="modal-body">
                            <label>Istri / Suami Ke</label>
                          </div>
                        </td>
                        <td>
                          <div class="modal-body">
                            :
                          </div>
                        </td>
                        <td>
                          <div class="modal-body">
                            <input type="text" name="ke" value="<?php echo $row_keluarga['ke'];?>" id="nomor_kas" class="form-control" placeholder="Istri / Suami Ke" required oninvalid="this.setCustomValidity('Masukan Istri / Suami ke')" oninput="setCustomValidity('')" onkeypress="return angka(event);" autocomplete="off" style="width: 100%">
                          </div>
                        </td>
                      </tr>
                      <!-- 4 -->
                      <tr>
                        <td>
                          <div class="modal-body">
                            <label>Nip / Nik</label>
                          </div>
                        </td>
                        <td>
                          <div class="modal-body">
                            :
                          </div>
                        </td>
                        <td>
                          <div class="modal-body">
                            <input type="text" name="nik" value="<?php echo $row_keluarga['nik'];?>" id="nomor_kas" class="form-control" placeholder="Nip / Nik" onkeypress="return angka(event);" autocomplete="off" style="width: 100%">
                          </div>
                        </td>
                        <td></td>
                        <td>
                          <div class="modal-body">
                            <label>Penghasilan / Bulan</label>
                          </div>
                        </td>
                        <td>
                          <div class="modal-body">
                            :
                          </div>
                        </td>
                        <td>
                          <div class="modal-body">
                            <input type="text" name="penghasilan" value="<?php echo $row_keluarga['penghasilan'];?>" id="nomor_kas" class="form-control" placeholder="Penghasilan" value="0" min="0" onkeypress="return angka(event);" autocomplete="off" style="width: 100%">
                          </div>
                        </td>
                      </tr>
                    </table>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                      <input id="button" type="submit" name="submit" class="btn btn-outline btn-xl"  value="Simpan" data-toggle="tooltip" data-placement="top" title="Simpan">
                    </div>
                  </form>

                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->


            <a href="index.php?controller=pegawai&method=delete_keluarga&id=<?php echo $row_keluarga['id']; ?>&nip=<?php echo $row_detail['nip'];?>" class="btn btn-danger btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Delete" onClick="return confirm('Yakin hapus?')"> <i class="fa fa-trash"></i> </a>
          </center>

        </td>
      </tr>

      <?php
                                      // INCREMENT NOMOR URUT
      $nomor++;

    }
  }
  ?>
</tbody>
</table>
<script>
  $('#tabel').dataTable();
</script>