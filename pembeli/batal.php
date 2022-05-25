<?php require "../koneksi.php";
session_start();
$id = $_GET["index"];
unset($_SESSION['keranjang'][$id]);
echo "
    <script>
        alert('Pesanan berhasil dibatalkan');
        document.location.href = 'keranjang.php';
    </script>
    ";

 ?>