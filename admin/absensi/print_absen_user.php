<?php include '../../lib/autoload.php'; ?>
<?php include '../../lib/session_checker.php'; ?>
 <?php 
 use Lib\Database\Absensi;
 $absensiObj = new Absensi;
 $tgl = date('Y-m');
 $nip = $_GET['nip'];
 $absensi = $absensiObj->getAbsensiById($nip, $tgl);
 $ab = $absensi;
 $user = $absensiObj->getAbsensiById($nip, $tgl)->fetch_object();
 if(!$absensi){
  print_r($absensiObj->conn);die;
 }

require_once '../../vendor/autoload.php';
use Dompdf\Dompdf;
$pdf = new Dompdf();
ob_start();
?>
<title>Laporan Absensi</title>
<link rel="shortcut icon" href="../logo/bm.png">
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
</head>
<body>
    <h2 align="center">RS. BHAYANGKARA</h2>
    <hr>
    <h3 align="center">Laporam Absensi</h3>
    <p>Tanggal : <?=$tgl?></p>
    <p>Nama : <?=strtoupper($user->nama)?></p>
            <table class="table table-striped col-12" id="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Lampiran</th>
                  <th>Jam Masuk</th>
                  <th>Jam Keluar</th>
                </tr>
              </thead>
              <tbody>
                <?php $n=0; while ($row = $absensi->fetch_assoc() ): $n++ ?>
                  <tr>
                    <td><?=$n?></td>
                    <td><?=$row['nama']?></td>
                    <td><?=$row['tgl']?></td>
                  <td>
                    <b><u><?=$row['tugas']?></u></b><br>
                    <p><?=$row['keterangan']?></p>
                  </td>
                    <td><?=$row['jam_masuk']?></td>
                    <td><?=$row['jam_keluar']?></td>
                  </tr>
                <?php endwhile ?>
              </tbody>
            </table>
</body>
</html>

<?php
$html =ob_get_clean();

$pdf->loadHtml($html);

$pdf->setPaper('F4', 'Potrait',1, 1, 1, 1);

$pdf->render();
$pdf->stream('Data Gaji Pegawai '.$data_pegawai['nama'].'_Bulan_'.$bln.'_'.$tahun.'.pdf', Array('Attachment'=>0));
?>

