<?php
# memulakan fungsi session
session_start();

# memanggil fail header.php, connection.php dan guard-aktiviti.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');

?>
<h3 align='center'>Senarai Aktiviti</h3>

<!-- Header bagi jadual untuk memaparkan senarai aktiviti -->
<table align='center' width='100%' border='1' id='saiz'>
    <tr bgcolor='cyan'>
        <td >
            <form action='' method='POST' style="margin:0; padding:0;">
               <input type='text'    name='nama_aktiviti' placeholder='Carian Aktiviti'>
               <input type='submit'  value='Cari'>
            </form>
        </td>
        <td colspan='2' align='right'>
            | <a href='aktiviti-daftar-borang.php'>Daftar Aktiviti / Perjumpaan Baru</a> |
            <!-- Memanggil fail butang saiz bagi membolehkan pengguna mengubah saiz tulisan -->
            <?php include('butang-saiz.php'); ?>

        </td>
    </tr>
    <tr bgcolor='yellow' align='center'>
        <td>Nama Aktiviti</td>
        <td>Tarikh | Masa</td>
        <td>Tindakan</td>
    </tr>
<?php

# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai aktiviti
$tambahan="";
if(!empty($_POST['nama_aktiviti']))
{
    $tambahan= "where nama_aktiviti like '%".$_POST['nama_aktiviti']."%'";
}

# arahan query untuk mencari senarai Aktiviti
$arahan_papar="select* from aktiviti $tambahan ";

# laksanakan arahan mencari data aktiviti
$laksana = mysqli_query($condb,$arahan_papar);

# Mengambil data yang ditemui
    while($m = mysqli_fetch_array($laksana))
    {
        # memaparkan senarai nama dalam jadual
        echo"<tr>
        <td>".$m['nama_aktiviti']."</td>
        <td>".$m['tarikh_aktiviti']." | ".$m['masa_mula']." </td> ";

        # memaparkan navigasi untuk kemaskini dan hapus data aktiviti
        echo"<td align='right'>
        | <a href='aktiviti-kemaskini-borang.php?id_aktiviti=".$m['id_aktiviti']."'>
        Kemaskini</a>

        | <a href='aktiviti-padam-proses.php?id_aktiviti=".$m['id_aktiviti']."'
        onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
        Hapus</a>

        | <a href='kehadiran-borang.php?id_aktiviti=".$m['id_aktiviti']."'>
        Pengesahan Kehadiran</a> |

        </td>
        </tr>";
    }
?>
</table>
<?php include ('footer.php'); ?>