<?php
include '../login/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query untuk menghapus data
    $query = "DELETE FROM dingen WHERE id_barang = '$id'";

    if ($koneksi->query($query)) {
        echo "<script>alert('Data berhasil dihapus');</script>";
        header("Location: product-data.php");
        exit();
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
        header("Location: product-data.php");
        exit();
    }
}
?>