<?php include('config2.php');

//mengambil isi data untuk diupdate
if (isset($_GET['edit'])){
  $kode = $_GET['edit'];
  $edit_state = TRUE;
  $rec = mysqli_query($db, "SELECT * FROM masuk WHERE kode=$kode");
  $record = mysqli_fetch_array($rec);
  $nomor = $record['nomor'];
  $kode = $record['kode'];
  $tanggal = $record['tanggal'];
  $perihal = $record['perihal'];
  $ditunjukan = $record['ditunjukan'];
  $asal_surat = $record['asal_surat'];
  $keterangan = $record['keterangan'];

}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Aplikasi Camat</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
  <?php if (isset($_SESSION['msg'])): ?>
    <div class="msg">
      <?php
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      ?>
    </div>
  <?php endif ?>

  <a href="index.php">
   <button id="kl">Undangan Keluar</button>
  <a>
  <h4><center> UNDANGAN MASUK</center></h4>
  <table>
    <thead>
     <tr>
        <th>Nomor</th>
        <th>Kode</th>
        <th>Tanggal</th>
        <th>Perihal</th>
        <th>Ditunjukan</th>
        <th>Asal Surat</th>
        <th>Keterangan</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($results)){ ?>
        <tr>
          <td><?php echo $row['nomor']; ?></td>
          <td><?php echo $row['kode']; ?></td>
          <td><?php echo $row['tanggal']; ?></td>
          <td><?php echo $row['perihal']; ?></td>
          <td><?php echo $row['ditunjukan']; ?></td>
          <td><?php echo $row['asal_surat']; ?></td>
          <td><?php echo $row['keterangan']; ?></td>
          <td>
            <a class="edit_btn" href="index2.php?edit=<?php echo $row['kode']; ?>">Edit</a>
          </td>
          <td>
            <a class="del_btn" href="config2.php?del=<?php echo $row['kode']; ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>

    </tbody>
  </table>

  <form method="post" action="config2.php">

    <div class="input-group">
      <label>Nomor</label>
      <input type="number" name="nomor" value="<?php echo $nomor; ?>">
    </div>
    <div class="input-group">
      <label>Kode</label>
      <input type="number" name="kode" value="<?php echo $kode; ?>">
    </div>
    <div class="input-group">
      <label>Tanggal</label>
      <input type="date" name="tanggal" value="<?php echo $tanggal; ?>">
    </div>
    <div class="input-group">
      <label>Perihal</label>
      <input type="text" name="perihal" value="<?php echo $perihal; ?>">
    </div>
    <div class="input-group">
      <label>Ditunjukan</label>
      <input type="text" name="ditunjukan" value="<?php echo $ditunjukan; ?>">
    </div>
    <div class="input-group">
      <label>Asal Surat</label>
      <input type="text" name="asal_surat" value="<?php echo $asal_surat; ?>">
    </div>
    <div class="input-group">
      <label>Keterangan</label>
      <input type="text" name="keterangan" value="<?php echo $keterangan; ?>">
    </div>
    <div class="input-group">
      <?php if ($edit_state == FALSE): ?>
          <button type="submit" name="save" class="btn">Save</button>
      <?php else: ?>
          <button type="submit" name="update" class="btn">Update</button>
      <?php endif ?>

    </div>
  </form>

</body>
</html>
