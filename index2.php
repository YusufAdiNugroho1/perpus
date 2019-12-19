 <?php 

include 'connection.php';

 ?>

 <table class="data">
    <tr>
        <th width="10%">No</th>
        <th>Judul Buku</th>
        <th>Cover</th>
        <th>Rak</th>
        <th>Stok</th>
    </tr>
    <?php 
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $data = mysqli_query($db,"SELECT * FROM buku WHERE buku_judul WHERE buku_cover LIKE '%".$cari."%'");
    }else{
        $data = mysqli_query($db,"SELECT * FROM buku");   
    }
    $no = 1;
    while($d = mysqli_fetch_array($data)){
    ?>  
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['buku_judul']; ?></td>
        <td><img width="100px;" class="buku-cover" src="modul_buku/cover/<?php echo $rak['buku_cover'] ?>"></td>
        <td><?php echo $rak ['rak_nama'] ?></td>
        <td>Ada</td>
    </tr> 
    <?php } ?>
    </table>