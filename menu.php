<?php include "header.php"; ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Kategori</th>
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
            </tr>
        <?php
            $no++;
            }
         ?>
        </tbody>
    </table>

<?php include "footer.php"; ?>