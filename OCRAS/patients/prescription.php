<?php
session_start();
include('include/config.php');
include('include/checklogin.php');
check_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Patient  | Dashboard</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta content="" name="description" />
<meta content="" name="author" />
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/plugins.css">
<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
</head>
<body>
<div id="app">
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/pheader.php');?>
<div class="main-content" >
<div class="wrap-content container" id="container">
<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
	<h1 class="mainTitle">Patient | Dashboard</h1>
									</div>
</div>
</section>

<div class="container-fluid container-fullw bg-white">
<?php
$conn =mysqli_connect ("localhost", "root", "", "ocras");
$query1=mysqli_query($con,"select * from pexam where PatientId='".$_SESSION['id']."'");
?>
<h3>SPECTACLE PRESCRIPTION</h3><hr>
<h4>L-PRISM</h4>
<table class="table table-bordered table-striped table-condensed">
<thead><th></th><th>H-DIST</th><th>V-DIST</th><th>H-NEAR </th><th>V-NEAR </th></thead>

<?php   while($row=mysqli_fetch_array($query1)): ?>
<tr>
<td>
</td>
<td><?=$row['LHDIST'];?></td>
<td><?=$row['LVDIST'];?></td>
<td><?=$row['LHNEAR'];?></td>
<td><?=$row['LVNEAR'];?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table><hr>


<?php
$conn =mysqli_connect ("localhost", "root", "", "ocras");
$query2=mysqli_query($con,"select * from pexam where PatientId='".$_SESSION['id']."'");
?>
<h4>R-PRISM</h4>
<table class="table table-bordered table-striped table-condensed">
<thead><th></th><th>H-DIST</th><th>V-DIST</th><th>H-NEAR </th><th>V-NEAR </th></thead>
<?php   while($row=mysqli_fetch_array($query2)): ?>
<tr>
<td>
</td>
<td><?=$row['RHDIST'];?></td>
<td><?=$row['RVDIST'];?></td>
<td><?=$row['RHNEAR'];?></td>
<td><?=$row['RVNEAR'];?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>

</div>
</div>
</div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php');?>
</div>


<!-- start: MAIN JAVASCRIPTS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>

<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="vendor/autosize/autosize.min.js"></script>
<script src="vendor/selectFx/classie.js"></script>
<script src="vendor/selectFx/selectFx.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="assets/js/main.js"></script>
<!-- start: JavaScript Event Handlers for this page -->
<script src="assets/js/form-elements.js"></script>
<script>
jQuery(document).ready(function() {
Main.init();
FormElements.init();
});
</script>
</body>
</html>
