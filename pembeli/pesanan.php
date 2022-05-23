<?php include "header.php";
if (isset($_POST['submit'])) {
    $idpesanan = getIdpesan($_POST);
    if( $idpesanan != 0 ){
        $detil = addDetil($_POST,$idpesanan);
    } else {
        echo "<script>
            alert('Data Gagal Ditambahkan  kedalam keranjang');
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
                <P>11</P>
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