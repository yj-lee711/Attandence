<?php
# Memulakan fungsi session
session_start();

# memanggil fail header.php
include ('header.php');
?>

<div style="margin: auto; width: fit content; margin-top:8%; text-align: left; margin-left: 40%">
<!-- Tajuk antaramuka log masuk -->
<h3>Login Ahli</h3>

<!-- borang daftar masuk (log in/ sign in) -->
<form action ='login-proses.php' method ='POST'>
    <span>Nokp</span>
    <input type='text' name='nokp' >
    <br>
    <span>Katalaluan</span>
    <input type='password' name='katalaluan' >
    <br>
    <input type='submit'   value='Login'>
</form>
</div>
<?php include ('footer.php'); ?>