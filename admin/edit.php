<?php include "header.php";
$id = $_GET['id_menu'];
$menu = mysqli_query($koneksi, "SELECT * FROM menu where id_menu='$id'");
$row = mysqli_fetch_array($menu);
if (isset($_POST['submit'])) {
    $hasil = upMenu($_POST);
    if( $hasil > 0){
        echo "<script>
                alert('Data Berhasil Diubah');
                document.location.href = 'kelolamenu.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Diubah');
            </script>";
    }
}

 ?>

<div class="container">
    <form id="tambah" method="POST">
        <div class="formheader">
            <h3>Edit Menu</h3>
        </div>
        <div class="sep"></div>
        <div class="inputs">
            <label for="nama_menu">Nama Menu : </label>
            <input type="text" name="nama_menu" value="<?php echo $row['nama_menu'];?>" autofocus />
            <label for="harga">Harga : </label>
            <input type="number" name="harga" value="<?php echo $row['harga'];?>" />
            <label for="kategori">Kategori : </label>
            <div class="radio">
                <input type="radio" name="kategori" value="makanan" <?php echo active_radio_button("makanan", $row['kategori'])?> >Makanan
                <input type="radio" name="kategori" value="minuman" <?php echo active_radio_button("minuman", $row['kategori'])?> >Minuman
                <input type="radio" name="kategori" value="snack" <?php echo active_radio_button("snack", $row['kategori'])?> >Snack
            </div>
            <button type="submit" name="submit">Simpan</button>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>