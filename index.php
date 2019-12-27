<<<<<<< HEAD
<html>
<head>
<title>Search Engine</title>
<link rel="stylesheet" type="text/css" href="css/ss.css" />
</head>
<body>
<div class="navbar">
        <a href="login.php">Login</i></a>
    </div>
<center>
<h1 style="margin-top: 170px;">My Perpus</h1>
    <form action="" method="post">
        <input  type="text" id="searchquery" class="search" size="60" name="keyword" placeholder="Golek eneng kene" />
        <input type="submit" id="searchbutton" value="Search" name="Search" class="submit" />
</form>
<?php
//koneksi
include 'connection.php';

if (isset($_POST['Search'])){
    //variable
    $keyword = $_POST['keyword'];
    $query = $db->query("SELECT * FROM rak_buku JOIN buku ON buku.buku_id = rak_buku.buku_id JOIN rak ON rak.rak_id = rak_buku.rak_id WHERE buku_judul LIKE '%$keyword%'");
    $row = mysqli_num_rows($query);
    //cek apakah ada satu  
    if ($row==0){
        ?>
        <center><h3>404 NOT FOUND</h3></center>
        <?php  
    }
    else{
        ?>
        <center><h3>menampilkan <?php echo $row;?> data.</h3></center>
        <?php
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
        foreach ($query as $rows){
        @$no++;
        $judul_buku = $rows['buku_judul'];
        $cover_buku = $rows['buku_cover'];
        $nama_rak =  $rows['rak_nama'];
        $jumlah_buku = $rows['buku_jumlah'];
        ?>
        <tr class="nol1">
        <td class="main2"><?php echo $no;?></td>
        <td><?php echo $judul_buku ?></td>
        <td><img width="120px;" class="buku-cover" src="modul_buku/cover/<?php echo $cover_buku  ?>"></td>
        <td><?php echo $nama_rak ?></td>
        <td><?php echo $jumlah_buku ?></td>
        </tr>
        <?php
        }
        ?>
        </table>
        <?php
    }
}
?>
</center>
</body>
</html>
=======
<?php 
header('Location: login.php');
exit();
?>
>>>>>>> 08fdac12d2cbc8e6289095777019daea96fc8873
