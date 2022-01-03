<?php include '../../lib/autoload.php'; ?>
<?php include '../../lib/session_checker.php'; ?>
<?php include '../../theme/partial/header.php'; ?>
<?php include '../../theme/partial/topbar.php'; ?>
<?php include '../../theme/partial/sidebar.php'; ?>

<?php 
  if(!empty($_POST['filter'])){
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
  }else{
    $bulan = date('m');
    $tahun = date('Y');
  }
?>
//disini

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><i class="fa fa-street-view"></i> Data Gaji Pegawai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=BASE_URL?>">Home</a></li>
            <li class="breadcrumb-item active">Data Gaji Pegawai</li>
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
        <div class="card col">
          <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
          <div class="card-header"><h5 class="float-left">Data Gaji Pegawai</h5>

          <form role="form" method="POST" action="">
                            <table width="100%">
                             <thead>
                                    <tr>
                                        <th width="40%">
                                                <select name="bulan" class="form-control select2" style="width: 100%">
                                                  <option value="">Pilih Bulan</option>
                                                    <option value='01'>Januari</option>
                                                    <option value='02'>Februari</option>
                                                    <option value='03'>Maret</option>
                                                    <option value='04'>April</option>
                                                    <option value='05'>Mei</option>
                                                    <option value='06'>Juni</option>
                                                    <option value='07'>Juli</option>
                                                    <option value='08'>Agustus</option>
                                                    <option value='09'>September</option>
                                                    <option value='10'>Oktober</option>
                                                    <option value='11'>November</option>
                                                    <option value='12'>Desember</option>
                                                    </select>
                                        </th>
                                        <th width="1%"></th>
                                        <th width="40%">
                                            <select name="tahun" class="form-control select2" style="width: 100%">
                                                <?php
                                                $mulai = date('Y') - 6;
                                                for ($i= $mulai;$i<$mulai + 100;$i++){
                                                    $sel = $i == date('Y') ? ' selected = "selected"' : '';
                                                     echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </th>
                                        <th width="10%"><center>
                                          <input type="hidden" value="filter" name="filter">
                                        <button type="submit" name="cari" class="btn btn-info btn-xs" title="Cari"><i class="fa fa-search fa-fw"></i></button>
                                        </center>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            </form>
                            <div class="col-12">
            <label>Data Detail Gaji Bulan 
             <?php
             if ($bulan=="01") {
              echo "Januari";
            }
            elseif ($bulan=="02") {
              echo "Februari";
            }
            elseif ($bulan=="03") {
              echo "Maret";
            }
            elseif ($bulan=="04") {
              echo "April";
            }
            elseif ($bulan=="05") {
              echo "Mei";
            }
            elseif ($bulan=="06") {
              echo "Juni";
            }
            elseif ($bulan=="07") {
              echo "Juli";
            }
            elseif ($bulan=="08") {
              echo "Agustus";
            }
            elseif ($bulan=="09") {
              echo "September";
            }
            elseif ($bulan=="10") {
              echo "Oktober";
            }
            elseif ($bulan=="11") {
              echo "November";
            }
            elseif ($bulan=="12") {
              echo "Desember";
            }
            echo " / ".$tahun;?> </label>
          </label>
        </div>
                          </div>
             <div class="card-body">
            <!-- get list data Jabatan -->
            <?php 
            use Lib\Database\Pegawai;
            use Lib\Database\Gaji;
            $pegawaiObj = new Pegawai;
            $gajiObj = new Gaji;
            $pegawai = $pegawaiObj->getPegawai();
            ?>
            <!-- get list data Jabatan -->
            <table class="table table-striped table-bordered datatables-responsive" id="table" style="font-size: 14px;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Pegawai</th>
                  <th>Gaji Bulan</th>
                  <th>Total Gaji</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $n=0; while($row = $pegawai->fetch_assoc()){$n++; ?>
                  <tr>
                    <td><?=$n?></td>
                    <td><?=$row['nip']?></td>
                    <td><?=$row['nama']?></td>
                    <td><?=$row['jabatan']?></td>
                    <td><?php 
                    $gaji = $gajiObj->getGajiBulanan($row['nip'], $bulan, $tahun);
                    if($gaji->num_rows>=1){
                      $gaji = $gaji->fetch_object();
                      $dataGaji = $gaji->gaji_bersih;
                    }else{
                      $dataGaji = false;
                    }
                    if ($dataGaji != false) {
                      echo 'Rp. '.number_format($dataGaji);
                    }else{
                      echo '<span class="badge badge-danger">Belum ada data gaji</span>';
                    }
                  ?></td>
                    
                      <td>
                          <?php if ($dataGaji != false) {?>
                          <a href="<?=BASE_URL?>/admin/penggajian/info.php?nip=<?=$row['nip']?>&filter=true&bulan=<?=$bulan?>&tahun=<?=$tahun?>" class="btn btn-sm btn-info" ><i class="fa fa-info"></i> Info</a>
                    <?php }else{ ?>

                        <?php if($_SESSION['level'] == "Admin" or $_SESSION['level'] == "Bendahara"){ ?>
                          <a href="<?=BASE_URL?>/admin/penggajian/insert.php?nip=<?=$row['nip']?>&filter=true&bulan=<?=$bulan?>&tahun=<?=$tahun?>" class="btn btn-sm btn-primary" ><i class="fa fa-plus"></i>Insert</a>
                        <?php } ?>
                    <?php } ?>
                      </td>
                    </tr>
                  <?php } // endwhile ?>
                </tbody>
              </table>
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
  $('#table').DataTable();

</script>

<?php if (!empty($_SESSION['insertSuccess'])) { unset($_SESSION['insertSuccess'])?>
  <script>
    Swal.fire('Berhasil', 'Data Gaji telah ditambahkan', 'success');
  </script>
<?php }?>