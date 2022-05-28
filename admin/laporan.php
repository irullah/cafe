<?php include "header.php";?>
<table>
    <thead>
        <tr>
            <th colspan="2">LAPORAN TAHUN INI</th>
        </tr>
        <tr>
            <form action="laporan.php" method="get">
                <td>
                    <input type="number" name="tahun" placeholder="Tahun">
                </td>
                <td>
                    <button type="submit" name="submit">Submit</button>
                </td>
            </form>
        </tr>
    </thead>
</table>
<?php
if (isset($_GET['tahun']) ) {
    $query = "SELECT MONTH(tanggal) as bulan, SUM(total_bayar) as Pendapatan FROM pesanan 
    WHERE YEAR(tanggal) = ".$_GET['tahun']."
    GROUP BY bulan ORDER BY tanggal
;";
    $data = mysqli_query($koneksi,$query);
    if ($data->num_rows > 0 ) {
        while ($tampil = mysqli_fetch_array($data)) { ?>
            <table>
                <thead>
                    <tr>
                        <th>BULAN</th>
                        <th>PENDAPATAN</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php
                        if ($tampil['bulan'] == 1 ) {
                            echo "Januari";
                        }elseif ($tampil['bulan'] == 2 ) {
                            echo "Februari";
                        }elseif ($tampil['bulan'] == 3 ) {
                            echo "Maret";
                        }elseif ($tampil['bulan'] == 4 ) {
                            echo "April";
                        }elseif ($tampil['bulan'] == 5 ) {
                            echo "Mei";
                        }elseif ($tampil['bulan'] == 6 ) {
                            echo "Juni";
                        }elseif ($tampil['bulan'] == 7 ) {
                            echo "Juli";
                        }elseif ($tampil['bulan'] == 8 ) {
                            echo "Agustus";
                        }elseif ($tampil['bulan'] == 9 ) {
                            echo "September";
                        }elseif ($tampil['bulan'] == 10 ) {
                            echo "Oktober";
                        }elseif ($tampil['bulan'] == 11 ) {
                            echo "November";
                        }else {
                            echo "Desember";
                        } ?></td>
                        <td>Rp. <?php echo $tampil['Pendapatan'] ?></td>
                        <td><button><a href="detil.php?bulan=<?php echo $tampil['bulan'] ?>&tahun=<?php echo $_GET['tahun'] ?>">Selengkapnya</a></button></td>
                    </tr>
                </tbody>
            </table>

    <?php } }else { ?>
        <table>
            <tr>
                <td>Tidak ada penghasilan pada tahun <?php echo $_GET['tahun'] ?></td>
            </tr>
        </table>
<?php } } include "footer.php";?>