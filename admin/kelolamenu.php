<?php include "header.php"; ?>

    <table>
        <thead>
            <tr>
                <td>
                    <button><a href="tambah.php"><h3>Tambah</h3></a></button>
                </td>
            </tr>
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $no=1;
            $data = mysqli_query($koneksi, "SELECT * FROM menu ORDER BY kategori");
            while ($tampil = mysqli_fetch_array($data)) {
         ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><strong><?php echo $tampil['nama_menu'] ?></strong></td>
                <td><?php echo $tampil['harga'] ?></td>
                <td><?php echo $tampil['kategori'] ?></td>
                <td>
                    <button><a href="edit.php?id_menu=<?php echo $tampil['id_menu'] ?>">Edit</a></button>
                    <button><a href="hapus.php?id_menu=<?php echo $tampil['id_menu'] ?>">Hapus</a></button>
                </td>
            </tr>
        <?php
            $no++;
            }
         ?>
        </tbody>
    </table>

<?php include "footer.php"; ?>