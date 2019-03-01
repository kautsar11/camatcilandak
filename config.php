<?php
session_start();
//variable
$nomor = "";
$kode = "";
$tanggal = "";
$perihal = "";
$ditunjukan = "";
$tembusan = "";
$dibuat_oleh = "";
$edit_state = FALSE;
//connect to database
$db = mysqli_connect('localhost','root','','kecamatan');

//jika tombol save diclick
if (isset($_POST['save'])){
  $nomor = $_POST['nomor'];
  $kode = $_POST['kode'];
  $tanggal = $_POST['tanggal'];
  $perihal = $_POST['perihal'];
  $ditunjukan = $_POST['ditunjukan'];
  $tembusan = $_POST['tembusan'];
  $dibuat_oleh = $_POST['dibuat_oleh'];

  $query = "INSERT INTO undangan (nomor, kode, tanggal, perihal, ditunjukan, tembusan, dibuat_oleh) VALUES ('$nomor', '$kode', '$tanggal', '$perihal', '$ditunjukan', '$tembusan', '$dibuat_oleh')";
  mysqli_query($db, $query);
  $_SESSION['msg'] = "Data Berhasil Disimpan";
  header('location: index.php'); //mengalihkan ke index
}
//update isi data
if (isset($_POST['update'])){
  $nomor = mysql_real_escape_string($_POST['nomor']);
  $kode = mysql_real_escape_string($_POST['kode']);
  $tanggal = mysql_real_escape_string($_POST['tanggal']);
  $perihal = mysql_real_escape_string($_POST['perihal']);
  $ditunjukan = mysql_real_escape_string($_POST['ditunjukan']);
  $tembusan = mysql_real_escape_string($_POST['tembusan']);
  $dibuat_oleh = mysql_real_escape_string($_POST['dibuat_oleh']);


  mysqli_query($db, "UPDATE undangan SET nomor='$nomor', tanggal='$tanggal', perihal='$perihal', ditunjukan='$ditunjukan', tembusan='$tembusan', dibuat_oleh='$dibuat_oleh' WHERE kode=$kode");
  $_SESSION['msg'] = "Data Berhasil di Edit";
  header('location: index.php');
}

//delete isi data
if (isset($_GET['del'])){
    $kode = $_GET['del'];
    mysqli_query($db, "DELETE FROM undangan WHERE kode=$kode");
    $_SESSION['msg'] = "Data Berhasil di Hapus";
    header('location: index.php');
}

//mengambil isi data
$results = mysqli_query($db, "SELECT * FROM undangan");
?>
