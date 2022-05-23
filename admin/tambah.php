<?php include "header.php";
if (isset($_POST['submit'])) {
    $hasil = addMenu($_POST);
    if( $hasil > 0){
        echo "<script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'kelolamenu.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Ditambahkan ');
        </script>";
    }
}
?>
<div class="container">
    <form id="tambah" method="POST">
        <div class="formheader">
            <h3>Tambah Menu</h3>
        </div>
        <div class="sep"></div>
        <div class="inputs">
            <label for="nama_menu">Nama Menu : </label>
            <input type="text" name="nama_menu"  autofocus />
            <label for="harga">Harga : </label>
            <input type="number" name="harga"  />
            <label for="kategori">Kategori : </label>
            <div class="radio">
                <input type="radio" name="kategori" value="makanan" >Makanan
                <input type="radio" name="kategori" value="minuman" >Minuman
                <input type="radio" name="kategori" value="snack" >Snack
            </div>
            <button type="submit" name="submit">Tambah</button>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>