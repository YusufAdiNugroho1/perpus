<html>
<head>
    <meta charset="UTF-8">
    <title>Halaman Public</title>
    <link rel="stylesheet" href="css/ss.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="navbar">
        <a href="login.php">Login</i></a>
    </div>
    
    <div class="container">
    <div class="login">
        <h1 style="text-align: left">My Perpus</h1>
		  <div class="demo-1 search">
                <form action="index.php" method="get">
                    <input type="text" name="cari" class="search" placeholder="Search here!!!">
                    <input type="submit" name="submit" class="submit" value="cari">
                </form>
            </div>
        </div>
    </div>

     <?php 

     include 'connection.php';
     include 'modul_rak/proses-list-rak.php';

        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            echo "<b>Hasil pencarian : ".$cari."</b>";
        }
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
        $data = mysqli_query($db,"SELECT * FROM rak_buku JOIN buku ON buku.buku_id = rak_buku.buku_id JOIN rak ON rak.rak_id = rak_buku.rak_id WHERE buku_judul LIKE '%".$cari."%'");
    }else{
        $data = mysqli_query($db,"SELECT * FROM rak_buku JOIN buku ON buku.buku_id = rak_buku.buku_id JOIN rak ON rak.rak_id = rak_buku.rak_id");   
    }
    $no = 1;
    while($d = mysqli_fetch_array($data)){
    ?>  
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['buku_judul']; ?></td>
        <td><img width="120px;" class="buku-cover" src="modul_buku/cover/<?php echo $d['buku_cover'] ?>"></td>
        <td><?php echo $d ['rak_nama'] ?></td>
        <td><?php echo $d ['buku_jumlah'] ?></td>
    </tr> 
    <?php } ?>
    </table>


</body>
</html>