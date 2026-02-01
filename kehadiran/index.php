<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php
include('header.php');
?>
<table width='100%' >
    <tr>
        <td width='65%' bgcolor='#E6E6FA' >
            <!-- ubah nama fail banner.jpg mengikut nama gambar anda -->
            <img src='4SC.png' width='100%'>
        </td>
        <td align='center' bgcolor='#FFFF4C' >
            <h3> Daftar Sebagai Ahli </h3>
            <h3> Klik Pautan Dibawah Untuk Mendaftar </h3>
            <a href ='signup-borang.php'> Daftar Sini </a>
        </td>
    </tr>
</table>
<?php include ('footer.php'); ?>
