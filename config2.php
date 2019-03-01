<?php
session_start();
//variable
$nomor = "";
$kode = "";
$tanggal = "";
$perihal = "";
$ditunjukan = "";
$asal_surat = "";
$keterangan = "";
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
  $asal_surat = $_POST['asal_surat'];
  $keterangan = $_POST['keterangan'];

  $query = "INSERT INTO masuk (nomor, kode, tanggal, perihal, ditunjukan, asal_surat, keterangan) VALUES ('$nomor', '$kode', '$tanggal', '$perihal', '$ditunjukan', '$asal_surat', '$keterangan')";
  mysqli_query($db, $query);
  $_SESSION['msg'] = "Data Berhasil Disimpan";
  header('location: index2.php'); //mengalihkan ke index
}
//update isi data
if (isset($_POST['update'])){
  $nomor = mysql_real_escape_string($_POST['nomor']);
  $kode = mysql_real_escape_string($_POST['kode']);
  $tanggal = mysql_real_escape_string($_POST['tanggal']);
  $perihal = mysql_real_escape_string($_POST['perihal']);
  $ditunjukan = mysql_real_escape_string($_POST['ditunjukan']);
  $asal_surat = mysql_real_escape_string($_POST['asal_surat']);
  $keterangan = mysql_real_escape_string($_POST['keterangan']);


  mysqli_query($db, "UPDATE masuk SET nomor='$nomor', tanggal='$tanggal', perihal='$perihal', ditunjukan='$ditunjukan', asal_surat='$asal_surat', keterangan='$keterangan' WHERE kode=$kode");
  $_SESSION['msg'] = "Data Berhasil di Edit";
  header('location: index2.php');
}

//delete isi data
if (isset($_GET['del'])){
    $kode = $_GET['del'];
    mysqli_query($db, "DELETE FROM masuk WHERE kode=$kode");
    $_SESSION['msg'] = "Data Berhasil di Hapus";
    header('location: index2.php');
}

//mengambil isi data
$results = mysqli_query($db, "SELECT * FROM masuk");
?>
