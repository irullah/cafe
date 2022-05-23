<?php require "../koneksi.php";
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: ../login.php");
}else {
    if ($_SESSION['level'] != 'pembeli') {
        header("Location: /paw/projek/".$_SESSION['level']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header class="header">
        <h1 class="logo"><a href="index.php">Nokira Cafe</a></h1>
        <ul class="main-nav">
            <li><a href="pesanan.php"> Pesan</a></li>
            <li><a href="keranjang.php"> Keranjang</a></li>
        </ul>
	</header>
    <div class="content">
