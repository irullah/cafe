<?php include "header.php";
if (isset($_POST['submit'])) {
    $hasil = login($_POST);
    if( $hasil ){
        $_SESSION['username'] = $hasil['username'];
        if ($hasil['level'] == 'admin') {
            $_SESSION['level'] = 'admin';
            echo "<script>
                alert('Anda berhasil login sebagai admin!');
                document.location.href = 'admin/index.php';
            </script>";
        }else {
            $_SESSION['level'] = 'pembeli';
            echo "<script>
                alert('Anda berhasil login sebagai pembeli!');
                document.location.href = 'pembeli/index.php';
            </script>";
        }

    } else {
        echo "<script>
            alert('Anda gagal login ! ');
        </script>";
    }
}
 ?>
<div class="container">
    <form id="signup" method="POST">
        <div class="formheader">
            <h3>Login</h3>
        </div>
        <div class="sep"></div>
        <div class="inputs">
            <input type="text" name="username" placeholder="username" autofocus />
            <input type="password" name="password" placeholder="Password" />
            <button type="submit" name="submit">Login</button>
            <a href="daftar.php">Daftar disini!</a>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>