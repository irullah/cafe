<?php include "header.php";
    $hasil = addDetil($_SESSION['keranjang']);
    if( $hasil > 0){
        echo "<script>
            alert('Anda  Sudah membayar Terimakasih telah menggunakan layanan kami');
            document.location.href = 'keranjang.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Ditambahkan ');
        </script>";
    }