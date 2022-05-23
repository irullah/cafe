<?php require "../koneksi.php";
$id = $_GET["id_menu"];
    if (verif($id)>0) {
        echo "
        <script>
            alert('Data berhasil terverifikasi');
            document.location.href = 'verifbayar.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diverifikasi');
            document.location.href = 'verifbayar.php';
        </script>
        ";
    }
 ?>