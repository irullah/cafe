<?php
//koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$database = "nokiracafe";

$koneksi = mysqli_connect($host,$user,$pass,$database);

function addMenu($data)
{
    global $koneksi;

	$nama = htmlspecialchars($data["nama_menu"]);
	$harga = htmlspecialchars($data["harga"]);
    $kategori = htmlspecialchars($data["kategori"]);

	$query = "
		INSERT INTO menu VALUES
		('', '$nama', '$harga', '$kategori')
	";
	$result = mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function upMenu($data){
	global $koneksi;

	// Menampung data ke variabel
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama_menu"]);
	$harga = htmlspecialchars($data["harga"]);
    $kategori = htmlspecialchars($data["kategori"]);
	// Membuat Query update data
	$query = "UPDATE menu SET nama_menu='$nama', harga='$harga', kategori='$kategori' WHERE id_menu = '$id'";

	// Mengeksekusi Query
	mysqli_query($koneksi, $query);
	return mysqli_affected_rows($koneksi);
}

function active_radio_button($value,$input){
	// apabilan value dari radio sama dengan yang di input
	$result = $value==$input?'checked':'';
	return $result;
}

function hapus($id){
	global $koneksi;
	// Membuat Query Hapus
	$query = "DELETE FROM menu WHERE id_menu = $id";
	// Mengeksekusi Query dengan mysql_querry dengan dua parameter
	mysqli_query($koneksi, $query);

	// Return mysqli_affected_rows untuk mengetahui apakah ada baris yang terpengaruhi dari query diatas
	return mysqli_affected_rows($koneksi);
}

function login($data){
	global $koneksi;
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);

	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	// Mengeksekusi Query dengan mysql_querry dengan dua parameter
	$datalogin = mysqli_query($koneksi, $query);

	// Return mysqli_affected_rows untuk mengetahui apakah ada baris yang terpengaruhi dari query diatas
	return mysqli_fetch_assoc($datalogin);
}
function verif($id){
	global $koneksi;
	// Membuat Query UPsate
	$query = "UPDATE pesanan SET status='Lunas' WHERE id_pesanan = $id";
	// Mengeksekusi Query dengan mysql_querry dengan dua parameter
	mysqli_query($koneksi, $query);

	// Return mysqli_affected_rows untuk mengetahui apakah ada baris yang terpengaruhi dari query diatas
	return mysqli_affected_rows($koneksi);
}

function daftar($data)
{
    global $koneksi;

	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
    $confirm = htmlspecialchars($data["confirm"]);

	$cekuser = mysqli_query($koneksi, "SELECT * FROM user WHERE username ='$username'");
	if ($cekuser->num_rows > 0) {
		return 0;
	} elseif ($password != $confirm) {
		return -1;
	}else {
		$query = "
			INSERT INTO user VALUES
			('$username', '$password', 'pembeli')
		";
		$result = mysqli_query($koneksi, $query);
		return mysqli_affected_rows($koneksi);
	}
}

function getIdpesan($data) {
	global $koneksi;
	$username = htmlspecialchars($data["username"]);
	$today = date("Y-m-d");
	$query = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE nama_pelanggan='$username' AND tanggal='$today'");
	if ($query->num_rows > 0 ) {
		$pesanan = mysqli_fetch_assoc($query);
		mysqli_query($koneksi,"UPDATE pesanan SET status='Belum Lunas' WHERE id_pesanan = $pesanan[id_pesanan]");
		return $pesanan['id_pesanan'];
	}else {
		mysqli_query($koneksi, "INSERT INTO pesanan VALUES ('', '$username', '$today','','Belum lunas')");
		return mysqli_insert_id($koneksi);
	}
}

function addDetil($data,$id)
{
    global $koneksi;

	$idpesanan = htmlspecialchars($id);
	$idmenu = htmlspecialchars($data["id_menu"]);
    $jumlah = htmlspecialchars($data["jumlah"]);

	$query = "
		INSERT INTO pesanan_detil VALUES
		('', '$idpesanan', '$idmenu', '$jumlah','')
	";
	$result = mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

 ?>