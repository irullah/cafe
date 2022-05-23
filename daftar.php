<?php include "header.php";
if (isset($_POST['submit'])) {
    $hasil = daftar($_POST);
    if( $hasil > 0){
        echo "<script>
            alert('Data Berhasil terdaftar silahkan login');
            document.location.href = 'login.php';
        </script>";
    }elseif  ($hasil == 0 ) {
        echo "<script>
            alert('Username ".$_POST['username']. " sudah terdaftar ');
        </script>";
    }else {
        echo "<script>
            alert('Password dan Confirm password tidak sama');
        </script>";
    }
}
?>
<div class="container">
    <form id="signup" method="post">
        <div class="formheader">
            <h3>Register</h3>
        </div>
        <div class="sep"></div>
        <div class="inputs">
            <input type="text" name="username" placeholder="username" autofocus required />
            <input type="password" name="password" placeholder="Password" required/>
            <input type="password" name="confirm" placeholder="Confirm Password" required/>
            <button type="submit" name="submit">Daftar</button>
            <a href="login.php">Login disini!</a>
        </div>
    </form>
</div>
<?php include "footer.php"; ?>