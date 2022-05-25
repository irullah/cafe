<?php include "header.php"; ?>
<table>
    <thead>
        <tr>
            <th>KERANJANG </th>
        </tr>
    </thead>
</table>
<?php
$no = 0;
if (isset ($_SESSION['keranjang']) && $_SESSION['keranjang'] != NULL) { ?>
    <table>
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
    <?php
    $total = 0;
    foreach ($_SESSION['keranjang'] as $pesanan) {
        $query = "SELECT nama_menu, harga FROM menu WHERE id_menu=".$pesanan[2];
        $menu = mysqli_query($koneksi,$query);
        $tampil = mysqli_fetch_assoc($menu);
        $subtotal = ((int)$tampil['harga'] * (int)$pesanan[3]);
        $total = $total + $subtotal;
        ?>
            <tbody>
                <tr>
                    <td><strong><?php echo $tampil['nama_menu'] ?></strong></td>
                    <td><?php echo $tampil['harga'] ?></td>
                    <td><?php echo $pesanan[3] ?></td>
                    <td><?php echo $subtotal ?></td>
                    <td><button><a href="batal.php?index=<?php echo $no ?>">BATAL</a></button></td>
                </tr>
            </tbody>
        <?php
    $no++;
    }
    if ($_SESSION['keranjang'] != NULL) {
    ?>
            <tr>
                <td colspan="5"> &nbsp;</td>
            </tr>
            <tr>
                <th colspan="3"><strong> TOTAL :</strong></td>
                <td><?php echo $total ?></td>
                <td>
                    <button><a href="bayar.php">BAYAR</a></button>
                </td>
            </tr>
        </table>


<?php } } include "footer.php";?>