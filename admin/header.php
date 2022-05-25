<?php require "../koneksi.php";
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: ../login.php");
}else {
    if ($_SESSION['level'] != 'admin') {
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
        <h1 class="logo"><a href="">Nokira Cafe</a> </h1>
        <ul class="main-nav">
            <li><a href="kelolamenu.php">Kelola Menu</a></li>
            <li><a href="verifbayar.php">Pembayaran</a></li>
            <li><a href="laporan.php">Laporan</a></li>
        </ul>
	</header>
    <div class="content">
