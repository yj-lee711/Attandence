<?php
# memulakan fungsi SESSION
session_start ();

# Memanggil fail header.php & fail connection.php
include ('header.php');
include ('connection.php');
?>

<div style="margin: auto; width: fit content; margin-top:8%; text-align: left; margin-left: 40%">
<!-- Tajuk antaramuka-->
<h3>Pendaftaran Ahli Baru</h3>

<!-- Borang Pendaftaran Ahli Baru -->
<form action = 'signup-proses.php' method = 'POST'>

    Nama Ahli <input type  = 'text' name ='nama' required> <br>
    Nokp Ahli <input type  = 'text' name ='nokp' required> <br>
    Tingkatan <select name ='id_kelas' ><br>
              <option selected disabled value> Sila Pilih Kelas </option>
              <?php
              # Proses memaparkan senarai kelas dalam bentuk drop down list
              $arahan_sql_pilih = "select* from kelas";
              $laksana_arahan_pilih = mysqli_query($condb, $arahan_sql_pilih);
              while ($m=mysqli_fetch_array($laksana_arahan_pilih))
              {
                echo "<option value='" .$m['id_kelas']."'>
                ".$m['ting']. " ". $m['nama_kelas']."
                </option>";
              }
              ?>
               </select> <br>
    Katalaluan <input type = 'password' name ='katalaluan' required> <br>
               <input type = 'submit'   value ='Daftar' >
</form>

</div>
<?php include ('footer.php');?>
