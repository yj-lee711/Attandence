<?php
# memulakan fungsi session
session_start();

# memanggil fail luaran dan istihar pemboleh ubah.
include('header.php');
include('kawalan-admin.php');
include('connection.php');
$masa=date("H:i:s");
$status=""; # digunakan untuk memaparkan status kehadiran
$warna="";  # digunakan untuk warna latar belakang status

# menyemak kewujudan data POST
if(!empty($_POST['nokp'])){

    # menyemak adakah nokp yang dimasukkan telah wujud dalam pangkalan data
    $arahan_sql_semak     ="select* from ahli where nokp = '".$_POST['nokp']."' ";
    $laksana_arahan_semak =mysqli_query($condb,$arahan_sql_semak);
    if(mysqli_num_rows($laksana_arahan_semak)!=1)
    {
        # jika nokp yang dimasukkan telah wujud.
        $status="Nokp yang dimasukkan/diimbas tiada dalam sistem";
        $warna="red";
    } else {
        # Proses Menyemak nokp yang dimasukkan telah merekodkan kehadiran atau tidak
        $arahan_semak="select* from kehadiran where nokp='".$_POST['nokp']."'
                        and id_aktiviti ='".$_GET['id_aktiviti']."' limit 1";
                       
        $laksana_arahan = mysqli_query($condb,$arahan_semak);
        if(mysqli_num_rows($laksana_arahan)==1)
        {
            $status="Anda telah mengesahkan kehadiran sebelum ini.";
            $warna="red";

        } else {

            # Proses Menyimpan data kehadiran
            $simpandata=mysqli_query($condb,"insert into kehadiran
            (nokp, id_aktiviti, masa_hadir) values
            ('".$_POST['nokp']."','".$_GET['id_aktiviti']."','$masa') ");


            # menyemak adakah proses menyimpan data berjaya
            if($simpandata)
            {
                $status="Kehadiran Telah Disahkan";
                $warna="green";
            }
            else
            {
                $status="Kehadiran Gagal Direkodkan";
                $warna="red";
            }
        }
    }
}

# Menyemak kewujudan data GET['id_aktiviti']
if(!empty($_GET['id_aktiviti']))
{
# Proses mendapatkan data aktiviti
$sql_aktiviti = "select* from aktiviti where id_aktiviti = '".$_GET['id_aktiviti']."'";
$laksana_aktiviti = mysqli_query($condb,$sql_aktiviti);
$ma=mysqli_fetch_array($laksana_aktiviti);
}
?>

<h1 align='center'> Laman Rekod Kehadiran Kaunter Urusetia </h1>
<h3 align='center'>
<?php
$bg_color = '#CBC3E3';
echo "<body style='background-color: $bg_color;'>";
?>
<!-- Borang carian Aktiviti -->
<form action='' method='GET'>
    Aktiviti <select name='id_aktiviti'>
    <option selected disabled value>Sila Pilih Aktiviti</option>

    <?php
      # Proses memaparkan senarai aktiviti dalam bentuk drop down list
      $arahan_sql_pilih     = "select* from aktiviti";
      $laksana_arahan_pilih = mysqli_query($condb,$arahan_sql_pilih);
      while($n=mysqli_fetch_array($laksana_arahan_pilih))
      {
        echo "<option value='".$n['id_aktiviti']."'>
               ".$n['id_aktiviti']."  | ".$n['nama_aktiviti']."
               </option>";
      }
    ?>
    </select>

    <input type='submit' value='Cari'>
</form>

<?php if(!empty($_GET['id_aktiviti'])) { ?>
<!-- Header bagi jadual untuk memaparkan senarai aktiviti -->
    <?= $ma['nama_aktiviti'] ?><br>
    <?= $ma['tarikh_aktiviti'] ?>  | <?= $ma['masa_mula'] ?><br>
</h3>

<form align='center' action ='' method='POST'>

    <label> Masukkan / Imbas Nokp / KOD anda di sini </label><br>
    <input type ='text' name='nokp' autofocus autocomplete="off" required
    onblur="this.focus()" ><br>

    <input type='submit' value='Rekod Kehadiran'>
</form>

<table width='50%' border='1' align='center'>
    <caption style="background-color :<?= $warna ?>"><h3><?= $status; ?></h3></caption>
    <tr bgcolor='yellow'>
        <td>#</td>
        <td>Nama</td>
        <td>Nokp</td>
        <td>Kelas</td>
        <td>Masa Hadir</td>
    </tr>

<?php
    $bil=0;

    # Proses untuk memaparkan data kehadiran dalam bentuk jadual
    $arahan_sql_kehadiran = "select* from ahli, aktiviti, kehadiran, kelas
    where
        ahli.nokp             = kehadiran.nokp
    and ahli.id_kelas         = kelas.id_kelas
    and aktiviti.id_aktiviti  = kehadiran.id_aktiviti
    and kehadiran.id_aktiviti = '".$_GET['id_aktiviti']."'
    order by kehadiran.masa_hadir DESC";

    $laksana_kehadiran = mysqli_query($condb,$arahan_sql_kehadiran);

    while($m = mysqli_fetch_array($laksana_kehadiran))
    {
        echo "  <tr>
                    <td>".++$bil."</td>
                    <td>".$m['nama']."</td>
                    <td>".$m['nokp']."</td>
                    <td>".$m['ting']." ".$m['nama_kelas']."</td>
                    <td>".$m['masa_hadir']."</td>
                </tr>" ;
    }
?>
</table>
<?php
$bg_color = '#CBC3E3';
echo "<body style='background-color: $bg_color;'>";
?>
<?php } ?>