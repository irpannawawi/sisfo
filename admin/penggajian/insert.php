<?php include '../../lib/autoload.php'; ?>
<?php include '../../lib/session_checker.php'; ?>
<?php include '../../theme/partial/header.php'; ?>
<?php include '../../theme/partial/topbar.php'; ?>
<?php include '../../theme/partial/sidebar.php'; ?>

<?php 
use Lib\Database\Pegawai;
$pegawaiObj = new Pegawai;
$pegawai = $pegawaiObj->getByNip($_GET['nip'])->fetch_object();

  if(!empty($_GET['filter'])){
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
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
          <h1 class="m-0"><i class="fa fa-street-view"></i> Data Penggajian</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=BASE_URL?>">Home</a></li>
            <li class="breadcrumb-item active">Data Penggajian</li>
            <li class="breadcrumb-item active">Data Detail</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card col">
          <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
          <div class="card-header"><a href="<?=BASE_URL?>/admin/penggajian/index.php" class="float-right btn btn-success"><i class="fas fa-arrow-left"></i> Back</a> Pegawai : <?php echo $pegawai->nama;?>
          <div class="col">
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
            echo " / ".$tahun;?> || </label><br>
            <label class="label" style="font-size: 15px;color: black;">NIP: <?php echo $pegawai->nip;?> / <?php echo $pegawai->nama;?>
          </label>
        </div>
      </div>
      <div class="card-body">
        <!-- get list data Jabatan -->
        <table class="table table-striped table-bordered datatables-responsive" id="table" style="font-size: 14px;">
          <!-- form start -->
          <div class="card-body">
            <form role="form" method="POST" action="<?=BASE_URL?>/admin/penggajian/act_insert.php">
              <input name="nip" type="hidden" value="<?php echo $pegawai->nip;?>"></input>
              <input name="bulan" type="hidden" value="<?php echo $bulan;?>"></input>
              <input name="tahun" type="hidden" value="<?php echo $tahun;?>"></input>
              <div class="row">
                <!-- Data Detail Gaji Bulan -->
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Gaji Pokok</label>
                    <input type="text" class="form-control" placeholder="Rp." value="<?php echo number_format($pegawai->gaji_pokok,0,"",".");?>" onkeyup="sum();" min="0" id="gaji_pokok" onkeyup="sum()" autocomplete="off" name="gaji_pokok">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Potongan Pajak</label>
                    <input type="text" class="form-control" placeholder="Rp." id="pot_pajak" onkeyup="sum()" autocomplete="off" name="pot_pajak">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tunj Istri / Suami</label>
                    <input type="text" class="form-control" placeholder="Rp." id="tunj_istri" onkeyup="sum()" autocomplete="off" name="tunj_istri">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Pot BPJS Kes</label>
                    <input type="text" class="form-control" placeholder="Rp." id="pot_bpjs" onkeyup="sum()" autocomplete="off" name="pot_bpjs">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tunjangan Anak</label>
                    <input type="text" class="form-control" placeholder="Rp." id="tunj_anak" onkeyup="sum()" autocomplete="off" name="tunj_anak">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Pot IWP 21</label>
                    <input type="text" class="form-control" placeholder="Rp." id="pot_iwp_21" onkeyup="sum()" autocomplete="off" name="pot_iwp_21">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tunjangan Hselon</label>
                    <input type="text" class="form-control" placeholder="Rp." id="tunj_hselon" onkeyup="sum()" autocomplete="off" name="tunj_hselon">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Pot IWP 81</label>
                    <input type="text" class="form-control" placeholder="Rp." id="pot_iwp_81" onkeyup="sum()" autocomplete="off" name="pot_iwp_81">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tunjangan Fung Umum</label>
                    <input type="text" class="form-control" placeholder="Rp." id="tunj_fung_umum" onkeyup="sum()" autocomplete="off" name="tunj_fung_umum">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Pot Tapebum</label>
                    <input type="text" class="form-control" placeholder="Rp." id="pot_tapebum" onkeyup="sum()" autocomplete="off" name="pot_tapebum">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tunjangan Fungsional</label>
                    <input type="text" class="form-control" placeholder="Rp." id="tunj_fungsional" onkeyup="sum()" autocomplete="off" name="tunj_fungsional">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Potongan JKK</label>
                    <input type="text" class="form-control" placeholder="Rp." id="pot_jkk" onkeyup="sum()" autocomplete="off" name="pot_jkk">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tunjangan Khusus</label>
                    <input type="text" class="form-control" placeholder="Rp." id="tunj_kusus" onkeyup="sum()" autocomplete="off" name="tunj_kusus">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Potongan JKM</label>
                    <input type="text" class="form-control" placeholder="Rp." id="pot_jkm" onkeyup="sum()" autocomplete="off" name="pot_jkm">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tunjangan Terpencil</label>
                    <input type="text" class="form-control" placeholder="Rp." id="tunj_terpencil" onkeyup="sum()" autocomplete="off" name="tunj_terpencil">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Hutang /Lain-lain</label>
                    <input type="text" class="form-control" placeholder="Rp." id="hutang" onkeyup="sum()" autocomplete="off" name="hutang">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>TKD</label>
                    <input type="text" class="form-control" placeholder="Rp." id="tkd" onkeyup="sum()" autocomplete="off" name="tkd">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>BULOG</label>
                    <input type="text" class="form-control" placeholder="Rp." id="bulog" onkeyup="sum()" autocomplete="off" name="bulog">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tunjangan Beras</label>
                    <input type="text" class="form-control" placeholder="Rp." id="tunj_beras" onkeyup="sum()" autocomplete="off" name="tunj_beras">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Sewa Rumah</label>
                    <input type="text" class="form-control" placeholder="Rp." id="sewa" onkeyup="sum()" autocomplete="off" name="sewa">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tunjangan Pajak</label>
                    <input type="text" class="form-control" placeholder="Rp." id="tunj_pajak" onkeyup="sum()" autocomplete="off" name="tunj_pajak">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>POTONGAN</label>
                    <input type="text" class="form-control" placeholder="Rp." id="potongan" onkeyup="sum()" autocomplete="off" name="potongan" readonly>
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tunjangan BPJS</label>
                    <input type="text" class="form-control" placeholder="Rp." id="tunj_bpjs" onkeyup="sum()" autocomplete="off" name="tunj_bpjs">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tunjangan JKK</label>
                    <input type="text" class="form-control" placeholder="Rp." id="tunj_jkk" onkeyup="sum()" autocomplete="off" name="tunj_jkk">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Tunjangan JKM</label>
                    <input type="text" class="form-control" placeholder="Rp." id="tunj_jkm" onkeyup="sum()" autocomplete="off" name="tunj_jkm">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Pembulatan</label>
                    <input type="text" class="form-control" placeholder="Rp." id="pembulatan" onkeyup="sum()" autocomplete="off" name="pembulatan">
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>JUMLAH KOTOR</label>
                    <input type="text" class="form-control" placeholder="Rp." readonly="" id="jml_kotor" onkeyup="sum()" autocomplete="off" name="jml_kotor">
                  </div>
                </div>
              </div>
              <hr>
              <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                  <label>JUMLAH BERSIH</label>
                  <input type="text" class="form-control" placeholder="Rp." onkeyup="sum();" readonly="" id="jml_bersih" onkeyup="sum()" autocomplete="off" name="jml_bersih">
                  </div>
                  </div>
                  <hr>
                  <div>

                  <a href="index.php?controller=gaji&method=select" class="btn btn-success btn-md pull-left"><i class="far fa-window-close"></i> Batal</a>
                  <button class="btn btn-primary btn-md pull-right"><i class="fa fa-download fa-fw"></i> Simpan</button>
                </div>
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







  <script type="text/javascript">
        
    /* Tunjangan */
    //gaji pokok
    var gaji_pokok = document.getElementById('gaji_pokok');
    gaji_pokok.addEventListener('keyup', function(e)
    {
        gaji_pokok.value = formatRupiah(this.value);
    });
    //tunj istri
    var tunj_istri = document.getElementById('tunj_istri');
    tunj_istri.addEventListener('keyup', function(e)
    {
        tunj_istri.value = formatRupiah(this.value);
    });
    //tunj anak
    var tunj_anak = document.getElementById('tunj_anak');
    tunj_anak.addEventListener('keyup', function(e)
    {
        tunj_anak.value = formatRupiah(this.value);
    });
    //tunj hselon
    var tunj_hselon = document.getElementById('tunj_hselon');
    tunj_hselon.addEventListener('keyup', function(e)
    {
        tunj_hselon.value = formatRupiah(this.value);
    });
    //tunj func umum
    var tunj_fung_umum = document.getElementById('tunj_fung_umum');
    tunj_fung_umum.addEventListener('keyup', function(e)
    {
        tunj_fung_umum.value = formatRupiah(this.value);
    });
    //tunj func umum
    var tunj_fungsional = document.getElementById('tunj_fungsional');
    tunj_fungsional.addEventListener('keyup', function(e)
    {
        tunj_fungsional.value = formatRupiah(this.value);
    });
    //tunj Kusus
    var tunj_kusus = document.getElementById('tunj_kusus');
    tunj_kusus.addEventListener('keyup', function(e)
    {
        tunj_kusus.value = formatRupiah(this.value);
    });
    //tunj terpencil
    var tunj_terpencil = document.getElementById('tunj_terpencil');
    tunj_terpencil.addEventListener('keyup', function(e)
    {
        tunj_terpencil.value = formatRupiah(this.value);
    });
    //tkd
    var tkd = document.getElementById('tkd');
    tkd.addEventListener('keyup', function(e)
    {
        tkd.value = formatRupiah(this.value);
    });
    //tunj terpencil
    var tunj_beras = document.getElementById('tunj_beras');
    tunj_beras.addEventListener('keyup', function(e)
    {
        tunj_beras.value = formatRupiah(this.value);
    });
    //tunj terpencil
    var tunj_pajak = document.getElementById('tunj_pajak');
    tunj_pajak.addEventListener('keyup', function(e)
    {
        tunj_pajak.value = formatRupiah(this.value);
    });
    //tunj BPJS
    var tunj_bpjs = document.getElementById('tunj_bpjs');
    tunj_bpjs.addEventListener('keyup', function(e)
    {
        tunj_bpjs.value = formatRupiah(this.value);
    });
    //tunj jkk
    var tunj_jkk = document.getElementById('tunj_jkk');
    tunj_jkk.addEventListener('keyup', function(e)
    {
        tunj_jkk.value = formatRupiah(this.value);
    });
    //tunj jkm
    var tunj_jkm = document.getElementById('tunj_jkm');
    tunj_jkm.addEventListener('keyup', function(e)
    {
        tunj_jkm.value = formatRupiah(this.value);
    });
    //pembulatan
    var pembulatan = document.getElementById('pembulatan');
    pembulatan.addEventListener('keyup', function(e)
    {
        pembulatan.value = formatRupiah(this.value);
    });
    //jml bersih
    var jml_kotor = document.getElementById('jml_kotor');
    jml_kotor.addEventListener('keyup', function(e)
    {
        jml_kotor.value = formatRupiah(this.value);
    });




    /* Potongan */
    //pot pajak
    var pot_pajak = document.getElementById('pot_pajak');
    pot_pajak.addEventListener('keyup', function(e)
    {
        pot_pajak.value = formatRupiah(this.value);
    });
    //pot bpjs
    var pot_bpjs = document.getElementById('pot_bpjs');
    pot_bpjs.addEventListener('keyup', function(e)
    {
        pot_bpjs.value = formatRupiah(this.value);
    });
    //pot iwp 21
    var pot_iwp_21 = document.getElementById('pot_iwp_21');
    pot_iwp_21.addEventListener('keyup', function(e)
    {
        pot_iwp_21.value = formatRupiah(this.value);
    });
    //pot iwp 81
    var pot_iwp_81 = document.getElementById('pot_iwp_81');
    pot_iwp_81.addEventListener('keyup', function(e)
    {
        pot_iwp_81.value = formatRupiah(this.value);
    });
    //pot tapebum
    var pot_tapebum = document.getElementById('pot_tapebum');
    pot_tapebum.addEventListener('keyup', function(e)
    {
        pot_tapebum.value = formatRupiah(this.value);
    });
    //pot jkk
    var pot_jkk = document.getElementById('pot_jkk');
    pot_jkk.addEventListener('keyup', function(e)
    {
        pot_jkk.value = formatRupiah(this.value);
    });
    //pot jkk
    var pot_jkm = document.getElementById('pot_jkm');
    pot_jkm.addEventListener('keyup', function(e)
    {
        pot_jkm.value = formatRupiah(this.value);
    });
    //pot hutang / lain"
    var hutang = document.getElementById('hutang');
    hutang.addEventListener('keyup', function(e)
    {
        hutang.value = formatRupiah(this.value);
    });
    //BULOG
    var bulog = document.getElementById('bulog');
    bulog.addEventListener('keyup', function(e)
    {
        bulog.value = formatRupiah(this.value);
    });
    //sewa rumah
    var sewa = document.getElementById('sewa');
    sewa.addEventListener('keyup', function(e)
    {
        sewa.value = formatRupiah(this.value);
    });
    
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function sum()
    {
        //tunjangan
        var gaji_pokok = document.getElementById('gaji_pokok').value;
        var tunj_istri = document.getElementById('tunj_istri').value;
        var tunj_anak = document.getElementById('tunj_anak').value;
        var tunj_hselon = document.getElementById('tunj_hselon').value;
        var tunj_fung_umum = document.getElementById('tunj_fung_umum').value;
        var tunj_fungsional = document.getElementById('tunj_fungsional').value;
        var tunj_kusus = document.getElementById('tunj_kusus').value;
        var tunj_terpencil = document.getElementById('tunj_terpencil').value;
        var tkd = document.getElementById('tkd').value;
        var tunj_beras = document.getElementById('tunj_beras').value;
        var tunj_pajak = document.getElementById('tunj_pajak').value;
        var tunj_bpjs = document.getElementById('tunj_bpjs').value;
        var tunj_jkk = document.getElementById('tunj_jkk').value;
        var tunj_jkm = document.getElementById('tunj_jkm').value;
        var pembulatan = document.getElementById('pembulatan').value;

        //
        var pot_pajak = document.getElementById('pot_pajak').value;
        var pot_bpjs = document.getElementById('pot_bpjs').value;
        var pot_iwp_21 = document.getElementById('pot_iwp_21').value;
        var pot_iwp_81 = document.getElementById('pot_iwp_81').value;
        var pot_tapebum = document.getElementById('pot_tapebum').value;
        var pot_jkk = document.getElementById('pot_jkk').value;
        var pot_jkm = document.getElementById('pot_jkm').value;
        var hutang = document.getElementById('hutang').value;
        var bulog = document.getElementById('bulog').value;
        var sewa = document.getElementById('sewa').value;

    // total tunjangan
    //gaji pokok
    if(gaji_pokok=="")
    {
        var gaji = 0;
    }else{
        var gaji = parseInt(gaji_pokok.split(".").join(""));
    }
    // tunjangan istri
    if(tunj_istri=="")
    {
        var istri =0;
    }else{
        var istri = parseInt(tunj_istri.split(".").join(""));
    }
    //tunjangan anak
    if (tunj_anak=="") {
        var anak =0;
    } else{
        var anak = parseInt(tunj_anak.split(".").join(""));
    }
    // tunjangan hselon
    if (tunj_hselon=="") {
        var hselon =0;
    }else{
        var hselon = parseInt(tunj_hselon.split(".").join(""));
    }
    //tunjangan umum
    if (tunj_fung_umum=="") {
        var fung_umum =0;
    }else{
        var fung_umum = parseInt(tunj_fung_umum.split(".").join(""));
    }
    //tunjangan fungsional
    if (tunj_fungsional=="") {
        var fungsional =0;
    }else{
        var fungsional = parseInt(tunj_fungsional.split(".").join(""));
    }
    //tunjangan kusus 
    if (tunj_kusus=="") {
        var kusus =0;
    }else{
       var kusus = parseInt(tunj_kusus.split(".").join("")); 
    }
    //tunjangan terpencil
    if (tunj_terpencil=="") {
        var terpencil=0;
    }else{
        var terpencil = parseInt(tunj_terpencil.split(".").join(""));
    }
    //tkd
    if (tkd=="") {
        var tkd=0;
    }else{
        var tkd = parseInt(tkd.split(".").join(""));
    }
    //tunj beras
    if (tunj_beras=="") {
        var beras =0;
    }else{
        var beras = parseInt(tunj_beras.split(".").join(""));
    }
    //tunj pajak
    if (tunj_pajak=="") {
        var pajak =0;
    }else{
        var pajak = parseInt(tunj_pajak.split(".").join(""));
    }
    //tunj bpjs
    if (tunj_bpjs=="") {
        var bpjs =0;
    }else{
        var bpjs = parseInt(tunj_bpjs.split(".").join(""));
    }
    //tunj jkk
    if (tunj_jkk=="") {
        var jkk=0;
    }else{
        var jkk = parseInt(tunj_jkk.split(".").join(""));
    }
    //tunj jkm
    if (tunj_jkm=="") {
        var jkm=0;
    }else{
      var jkm = parseInt(tunj_jkm.split(".").join(""));  
    }
    // pembulatan
    if (pembulatan=="") {
        var pembulatan =0;
    }else{
        var pembulatan = parseInt(pembulatan.split(".").join(""));
    }
    



    // total potongan
    //potongan pajak
    if (pot_pajak=="") {
        var pot_pajak=0;
    }else{
        var pot_pajak = parseInt(pot_pajak.split(".").join(""));
    }
    //potongan bpjs
    if (pot_bpjs=="") {
        var pot_bpjs=0;
    }else{
        var pot_bpjs = parseInt(pot_bpjs.split(".").join(""));
    }
    //potongan iwp 21
    if (pot_iwp_21=="") {
        var pot_iwp_21=0;
    }else{
        var pot_iwp_21 = parseInt(pot_iwp_21.split(".").join(""));
    }
    //potongan 81
    if (pot_iwp_81=="") {
        var pot_iwp_81=0;
    }else{
        var pot_iwp_81 = parseInt(pot_iwp_81.split(".").join(""));
    }
    //potongan potabum
    if (pot_tapebum=="") {
        var pot_tapebum=0;
    }else{
        var pot_tapebum = parseInt(pot_tapebum.split(".").join(""));
    }
    //potongan jkk
    if (pot_jkk=="") {
        var pot_jkk=0;
    }else{
        var pot_jkk = parseInt(pot_jkk.split(".").join(""));
    }
    //potongan jkm
    if (pot_jkm=="") {
        var pot_jkm=0;
    }else{
        var pot_jkm = parseInt(pot_jkm.split(".").join(""));
    }
    //potongan hutang / lain
    if (hutang=="") {
        var hutang=0;
    }else{
        var hutang = parseInt(hutang.split(".").join(""));
    }
    //potongan bulog
    if (bulog=="") {
        var bulog=0;
    }else{
        var bulog = parseInt(bulog.split(".").join(""));
    }
    //potongan sewa rumah
    if (sewa=="") {
        var sewa=0;
    }else{
        var sewa = parseInt(sewa.split(".").join(""));
    }


    
    // Gaji Kotor
    var kotor = gaji+istri+anak+hselon+fung_umum+fungsional+kusus+terpencil+tkd+beras+pajak+bpjs+jkk+jkm+pembulatan;

    if(!isNaN(kotor)){
            document.getElementById('jml_kotor').value = kotor.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        }
    
    // Total Potongan
    var jml_potongan = pot_pajak+pot_bpjs+pot_iwp_21+pot_iwp_81+pot_tapebum+pot_jkk+pot_jkm+hutang+bulog+sewa;

    if(!isNaN(jml_potongan)){
            document.getElementById('potongan').value = jml_potongan.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        }

    
    var jml_total = parseInt(kotor) - parseInt(jml_potongan);
        if(!isNaN(jml_total)){
            document.getElementById('jml_bersih').value = jml_total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        }
    
    }
    sum();
</script>