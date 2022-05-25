<?php include "header.php";
if (isset($_POST['submit'])) {
    if ($_POST['jumlah'] > 0) {
        $idpesanan = getIdpesan($_POST);
        if( $idpesanan != 0 ) {
            $detil = putInarray($_POST,$idpesanan);
            if (isset ($_SESSION['keranjang'])) {
                array_push($_SESSION['keranjang'],$detil);
            }else {
                $_SESSION['keranjang'][0] = $detil;
            }
            echo "<script>
                alert('Pesanan Ditambahkan  kedalam keranjang');
            </script>";
        }
    } else {
        echo "<script>
            alert('Jumlah tidak boleh kurang dari 1');
        </script>";
    }
}
?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Pesan</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no=1;
            $data = mysqli_query($koneksi, "SELECT * FROM menu");
            while ($tampil = mysqli_fetch_array($data)) {
         ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><strong><?php echo $tampil['nama_menu'] ?></strong></td>
                <td><?php echo $tampil['harga'] ?></td>
                <td><?php echo $tampil['kategori'] ?></td>
                <form method="post">
                    <input type="hidden" name="no" value="<?php echo $no ?>">
                    <td><input type="number" name="jumlah"></td>
                    <input type="hidden" name="id_menu" value="<?php echo $tampil['id_menu'] ?>">
                    <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">
                    <td><button type="submit" name="submit">Pesan</button></td>
                </form>
            </tr>
        <?php
            $no++;
            }
         ?>
        </tbody>
    </table>

<?php include "footer.php"; ?>