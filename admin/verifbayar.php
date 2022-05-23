<?php include "header.php";
$query = "SELECT * FROM pesanan WHERE status='Belum Lunas'";
$data = mysqli_query($koneksi,$query); ?>
<table>
    <thead>
        <tr>
            <th>VERIFIKASI PEMBAYARAN</th>
        </tr>
    </thead>
</table>
<?php
while ($tampil = mysqli_fetch_array($data)) { ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Tanggal</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong><?php echo $tampil['id_pesanan'] ?></strong></td>
                <td><?php echo $tampil['nama_pelanggan'] ?></td>
                <td><?php echo $tampil['tanggal'] ?></td>
                <td><?php echo $tampil['total_bayar'] ?></td>
                <td><?php echo $tampil['status'] ?></td>
                <td><button><a href="verif.php?id_menu=<?php echo $tampil['id_pesanan'] ?>">TANDAI LUNAS</a></button></td>
            </tr>
        </tbody>
    </table>
    <?php } ?>

<?php include "footer.php";?>