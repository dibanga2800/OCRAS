<?php
session_start();
include("doctor/include/config.php");
include 'includes/mainnav.php';
include 'includes/head2.php';

error_reporting(0);
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM doctors WHERE docEmail='".$_POST['username']."' and password='".md5($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="doctor/dashboard.php";
$_SESSION['dlogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$host  = $_SERVER['HTTP_HOST'];
$_SESSION['dlogin']=$_POST['username'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Doctor Login</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta content="" name="description" />
<meta content="" name="author" />
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="doctor/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="doctor/vendor/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="doctor/vendor/themify-icons/themify-icons.min.css">
<link href="doctor/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
<link href="doctor/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
<link href="doctor/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="doctor/assets/css/styles.css">
<link rel="stylesheet" href="doctor/assets/css/plugins.css">
</head>

<body class="login">
<div class="row">

<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">

<div class="logo margin-top-20">
<hr><br/>
</div>
<div class="box-login">
<form class="form-login" method="post">
<fieldset>

<legend>
Doctor's Login
</legend>
<p>
Please enter your email and password to log in.<br />
<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
</p>
<div class="form-group">
<span class="input-icon">
<input type="text" class="form-control" name="username" placeholder="Username">
<i class="fa fa-user"></i> </span>
</div>
<div class="form-group form-actions">
<span class="input-icon">
<input type="password" class="form-control password" name="password" placeholder="Password">
<i class="fa fa-lock"></i>
</span>
<a href="forgot-password.php">
Forgot Password ?
</a>
</div>
<div class="form-actions">

<button type="submit" class="btn btn-primary " name="submit">
Login <i class="fa fa-arrow-circle-right"></i>
</button>
</div>
</fieldset>
</form>

<!--footer -->
<div class="copyright">
&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> OCRAS</span>. <span>All rights reserved</span>
</div>

</div>
</div>
</div>
<script src="doctor/vendor/jquery/jquery.min.js"></script>
<script src="doctor/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="doctor/vendor/modernizr/modernizr.js"></script>
<script src="doctor/vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="doctor/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="doctor/vendor/switchery/switchery.min.js"></script>
<script src="doctor/vendor/jquery-validation/jquery.validate.min.js"></script>

<script src="doctor/assets/js/main.js"></script>

<script src="doctor/assets/js/login.js"></script>
<script>
jQuery(document).ready(function() {
Main.init();
Login.init();
});
</script>
<style>
body{
background-image:url("/OCRAS/images/headerlogo/background3.jpg");
background-size:100vw 100vh;
background-attachment: fixed;
}
</style>
</body>
<!-- end: BODY -->
</html>
