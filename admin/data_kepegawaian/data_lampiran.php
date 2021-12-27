  <?php include '../../lib/autoload.php'; ?>
<?php include '../../lib/session_checker.php'; ?>
<?php 
use Lib\Database\Pegawai;
use Lib\Database\Berkas;
$pegawaiObj = new Pegawai;
$berkasObj = new Berkas;
$id_pegawai = $id = $_GET['id'];
$pegawai = $pegawaiObj->getPegawaiById($id_pegawai)->fetch_object();
?>
<!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body table-responsive">
                        <button type="button" class="btn btn-warning btn-xs pull-right" data-toggle="modal" data-target="#modal-danger"><li class="fa fa-plus"></li> Add</button>
                             <br>
                             <br>
                            <!-- INI BAGIAN TABEL -->
                             <table width="100%" id="tabel" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="odd bg-gray">
                                        <th width="1%">No</th>
                                        <th width="15%"><center>Tanggal Berkas</center></th>
                                        <th><center>Keterangan</center></th>
                                        <th width="15%"><center>Lampiran</center></th>
                                        <th width="13%"><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
                                <tbody>
                                <?php
                                    // SET NOMOR URUT DATA
                                    $nomor          =   1;
                                    
                                    // CEK DATA YANG DITERIMA
                                    $data_berkas = $berkasObj->getBerkasByNip($pegawai->nip);
                                    if(isset($data_berkas)) {
                                        while($row_berkas  = mysqli_fetch_array($data_berkas)) {
                                ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo TanggalIndo($row_berkas['tgl']); ?></td>
                                        <td><?php echo $row_berkas['keterangan']; ?></td>
                                        <td align="center">
                                        <?php
                                        if($row_berkas['tipe']=="gambar"){?>
                                          <a  data-toggle="modal" data-target="#preview<?php echo $row_berkas['id']; ?>">
                                          <img src="logo/<?php echo $row_berkas['foto'];?>" style="width: 70px;height: 70px;"></a>
                                        <?php } else {?>
                                            <i class="fa fa-file-text"></i>
                                            <a href="<?=BASE_URL?>/assets/berkas/<?=$row_berkas['foto']?>"><?=$row_berkas['foto']?></a>
                                        <?php } ?>
                                        </td>
                                        <td><center>

                                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ubah<?php echo $row_berkas['id']; ?>"> <li class="fa fa-edit"></li> </button>
<!-- prefiew foto -->
<div class="modal fade" id="preview<?php echo $row_berkas['id']; ?>">
          <div class=" modal-lg">
            <div class="">
              <div class="">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>

                  <img src="logo/<?php echo $row_berkas['foto'];?>" style="width: 100%;height: 100%;">
              </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



<!--Modal Untuk Tambah Data -->
<div class="modal modal-success fade" id="ubah<?php echo $row_berkas['id']; ?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Ubah Data Lampiran</h4></center>
              </div>
              <form role="form" method="POST" name="kategori" action="<?=BASE_URL?>/admin/data_kepegawaian/act_edit_berkas.php" enctype="multipart/form-data" onsubmit="return validasi();">
                  <table width="100%" class="modal-body">
                  <tr>
                  <td></td>
                  <td>
                    <div class="modal-body">
                      <label>Keterangan</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                    <input type="hidden" name="id_pegawai" value="<?php echo $pegawai->id;?>"></input>
                    <input type="hidden" name="nip" value="<?php echo $pegawai->nip;?>"></input>
                    <input type="hidden" name="id" value="<?php echo $row_berkas['id'];?>"></input>
                  <input type="text" name="keterangan" id="nomor_kas" class="form-control" placeholder="Keterangan" value="<?php echo $row_berkas['keterangan'];?>" required oninvalid="this.setCustomValidity('Masukan Keterangan')" oninput="setCustomValidity('')" autocomplete="off" style="width: 100%">
                    </div>
                  </td>
                  <td></td>
                </tr>

                <tr>
                  <td></td>
                  <td>
                    <div class="modal-body">
                      <label>Lampiran</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <?php
                            if($row_berkas['tipe']=="gambar"){
                                    if($row_berkas['foto']=="")
                                    {
                                    }
                                    else
                                    {
                                      ?>
                                      <img src="logo/<?php echo $row_berkas['foto'];?>" style=";height: 60%;width: 60%;">
                                    <?php
                                    }
                            } else { echo "<i class='fa fa-file-text'> File Berkas</i>"; }
                        ?>
                                    <br>
                                    <br>
                                         <input type="file" name="berkas">
                    </div>
                  </td><td></td>
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

                                           
                                            <a href="<?=BASE_URL?>/admin/data_kepegawaian/delete_berkas.php?id=<?=$row_berkas['id']?>&id_pegawai=<?=$pegawai->id?>" class="btn btn-danger btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Delete" onClick="return confirm('Yakin hapus?')"> <i class="fa fa-trash"></i> </a>
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
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </section>

<!--Modal Untuk Tambah Data -->
<div class="modal modal-primary fade" id="modal-danger">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Tambah Data Lampiran</h4></center>
              </div>
              <form role="form" method="POST" name="kategori" action="<?=BASE_URL?>/admin/data_kepegawaian/act_insert_berkas.php" enctype="multipart/form-data" >
                  <table width="100%" class="modal-body">
                  <tr>
                  <td></td>
                  <td>
                    <div class="modal-body">
                      <label>Keterangan</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                    <input type="hidden" name="nip" value="<?php echo $pegawai->nip;?>"></input>
                    <input type="hidden" name="id_pegawai" value="<?php echo $pegawai->id;?>"></input>
                      <input type="text" name="berkas" id="nomor_kas" class="form-control" placeholder="Keterangan" required oninvalid="this.setCustomValidity('Masukan Keterangan')" oninput="setCustomValidity('')" autocomplete="off">
                      <input type="hidden" name="tgl" value="<?php echo date('Y-m-d');?>"></input>
                    </div>
                  </td>
                  <td></td>
                  </tr>
                  <tr>
                  <td></td>
                  <td>
                    <div class="modal-body">
                      <label>Berkas Lampiran</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <input type="file" name="berkas" class="form-control" required oninvalid="this.setCustomValidity('Masukan Berkas Foto')" oninput="setCustomValidity('')">
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

        <!-- /.modal -->
<script type="text/javascript">
  function angka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }
</script>
