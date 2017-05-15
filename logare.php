<?php
// establishing the MySQLi connection
$con = mysqli_connect("localhost","root","","registru1");
if (mysqli_connect_errno())
{
echo "MySQLi Connection was not established: " . mysqli_connect_error();
}
// checking the user
if(isset($_POST['login'])){
$email = mysqli_real_escape_string($con,$_POST['nume']);
$pass = mysqli_real_escape_string($con,$_POST['password']);
$sel_user = "select * from admin where nume='$email' AND parola='$pass'";
$run_user = mysqli_query($con, $sel_user);
$check_user = mysqli_num_rows($run_user);
if($check_user>0){
$_SESSION['nume']=$email;
echo "<script>window.open('indexx.php','_self')</script>";
}
else {
echo "<script> alert('Email or password is not correct, try again!')</script>";
}
}
?>