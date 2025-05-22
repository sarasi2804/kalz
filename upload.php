<?php 
    include '../login/koneksi.php'; 
    if(!empty($_FILES["image"]["tmp_name"]))
    {
        $kategori=$_POST["kategori"];
        $nama_barang=$_POST["nama_barang"];

        $gambar = $_FILES['image']['name'];
        $dot = explode('.',$gambar);
        $ekstensi = strtolower(end($dot));
        $fileinfo=PATHINFO($_FILES["image"]["tmp_name"]);

        $newFilename = md5(uniqid($gambar,true) . time()).'.'.$ekstensi;
        move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $newFilename);
        $location="upload/" . $newFilename;

        $harga=$_POST["harga"];
        mysqli_query($koneksi,"insert into dingen (kategori,nama_barang,lokasi,harga) values ('$kategori','$nama_barang','$location','$harga')");
        // mysqli_query($koneksi,"insert into barang (kategori,nama_barang,lokasi,harga) values ('$kategori','$nama_barang','','$harga')");
        header("Location:product-data.php");
    }else
    {
        echo "<script>alert('Haish.');location.replace('./product-data.php');</script>";
    }
 ?>