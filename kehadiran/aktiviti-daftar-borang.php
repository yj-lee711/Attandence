<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header dan fail kawalan-admin.php
include('header.php');
include('kawalan-admin.php');
?>

<div style="margin: auto; width: fit content; margin-top:8%; text-align: left; margin-left: 40%">
<h3>Daftar Aktiviti Baharu</h3>
<!-- borang untuk menerima data dari pengguna -->
<form action='aktiviti-daftar-proses.php' method='POST'>

Nama Aktiviti
<input type='text' name='nama_aktiviti' required><br>

Tarikh Aktiviti
<input type='date' name='tarikh_aktiviti' min='<?= date("Y-m-d") ?>' required><br>

Masa Mula
<input type='time' name='masa_mula' required><br>

<input type='submit' value='Daftar'>

</form>
</div>
<?php include ('footer.php'); ?>