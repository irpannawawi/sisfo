<?php include '../../lib/autoload.php'; ?>
<?php include '../../lib/session_checker.php'; ?>
 <?php 
 use Lib\Database\Absensi;
 $absensiObj = new Absensi;
 $date = explode('-',$_POST['tgl']);
 $tgl = $date[2].'-'.$date[1].'-'.$date[0];
 $absensi = $absensiObj->getAbsensi($tgl);
 if(!$absensi){
  echo $absensiObj->conn->error;die;
 }
 ?>



              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Lampiran</th>
                  <th>Jam Masuk</th>
                  <th>Jam Keluar</th>
                  <th>Selfie</th>
                </tr>
              </thead>
              <tbody>
                <?php $n=0; while ($row = $absensi->fetch_assoc() ): $n++ ?>
                  <tr>
                    <td><?=$n?></td>
                    <td><?=$row['nama']?></td>
                    <td><?=$row['tgl']?></td>
                    
                  <td>
                    <h5><u><?=$row['tugas']?></u></h5>
                    <p><?=$row['keterangan']?></p>
                  </td>
                    <td><?=$row['jam_masuk']?></td>
                    <td><?=$row['jam_keluar']?></td>
                    <td><img src="<?=BASE_URL?>/assets/absensi/<?=$row['foto']?>" alt="" height="100" width="100"></td>
                  </tr>
                <?php endwhile ?>
              </tbody>
            