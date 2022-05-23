<?php require "../koneksi.php";
$id = $_GET["id_menu"];
    if (hapus($id)>0) {
        echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'kelolamenu.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'kelolamenu.php';
        </script>
        ";
    }
 ?>