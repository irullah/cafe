<?php include "header.php";
if (isset($_GET['tahun']) && isset($_GET['bulan']) ) { ?>
<table>
    <thead>
        <tr>
            <th colspan="2">MENU YANG TERJUAL PADA BULAN
                <?php
                    if ($_GET['bulan'] == 1 ) {
                        echo "JANUARI";
                    }elseif ($_GET['bulan'] == 2 ) {
                        echo "FEBRUARI";
                    }elseif ($_GET['bulan'] == 3 ) {
                        echo "MARET";
                    }elseif ($_GET['bulan'] == 4 ) {
                        echo "APRIL";
                    }elseif ($_GET['bulan'] == 5 ) {
                        echo "MEI";
                    }elseif ($_GET['bulan'] == 6 ) {
                        echo "JUNI";
                    }elseif ($_GET['bulan'] == 7 ) {
                        echo "JULI";
                    }elseif ($_GET['bulan'] == 8 ) {
                        echo "AGUSTUS";
                    }elseif ($_GET['bulan'] == 9 ) {
                        echo "SEPTEMBER";
                    }elseif ($_GET['bulan'] == 10 ) {
                        echo "OKTOBER";
                    }elseif ($_GET['bulan'] == 11 ) {
                        echo "NOVEMBER";
                    }else {
                        echo "DESEMBER";
                    } ?> TAHUN <?php echo $_GET['tahun']; ?>
            </th>
        </tr>
    </thead>
</table>
<table>
    <thead>
        <tr>
            <th>Nama Menu</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
<?php
    $query = "
    SELECT nama_menu, SUM(jumlah), SUM(subtotal) FROM pesanan,menu,pesanan_detil
    WHERE pesanan_detil.id_pesanan=pesanan.id_pesanan
    AND menu.id_menu=pesanan_detil.id_menu
    AND MONTH(tanggal) = ".$_GET['bulan']."
    AND YEAR(tanggal) = ".$_GET['tahun']."
    GROUP BY nama_menu
    ORDER BY SUM(jumlah) DESC;
    ";
    $data = mysqli_query($koneksi,$query);
    $total = 0;
    while ($tampil = mysqli_fetch_array($data)) { ?>
            <tbody>
                <tr>
                    <td><?php echo $tampil['nama_menu'] ?></td>
                    <td><?php echo $tampil['SUM(jumlah)'] ?></td>
                    <td>Rp. <?php echo $tampil['SUM(subtotal)'] ?></td>
                </tr>

    <?php $total = $total + $tampil['SUM(subtotal)']; } ?>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr>
                <th colspan="2"><strong> TOTAL :</strong></td>
                <td>Rp. <?php echo $total ?></td>
            </tr>
        </tbody>
    </table>
    <table>
        <tr>
            <td>
                <button><a href="laporan.php?tahun=<?php echo $_GET['tahun'] ?>">KEMBALI</a></button>
            </td>
        </tr>
    </table>
<?php } include "footer.php";?>