<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
//check_login();

if(isset($_GET['del']))
{
mysqli_query($con,"delete from appointment where id = '".$_GET['id']."'");
$_SESSION['msg']="data deleted !!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Patients | Appointment History</title>
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


<?php include('include/header.php');?>
<div class="main-content" >
<div class="wrap-content container" id="container">
<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Patients  | Appointment History</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Patients </span>
</li>
<li class="active">
<span>Appointment History</span>
</li>
</ol>
</div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">

<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?></p>
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">#</th>
<th class="hidden-xs">Doctor Name</th>
<th>Patient Name</th>
<th>Specialization</th>
<th>Appointment Date / Time </th>
<th>Appointment Creation Date  </th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql=mysqli_query($con,"select doctors.doctorName as docname,patient.fname as pname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId join patient on patient.id=appointment.patientId ");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['docname'];?></td>
<td class="hidden-xs"><?php echo $row['pname'];?></td>
<td><?php echo $row['doctorSpecialization'];?></td>
<td><?php echo $row['appointmentDate'];?> / <?php echo
$row['appointmentTime'];?>
</td>
<td><?php echo $row['postingDate'];?></td>
<td>

</div>
<div class="visible-md visible-lg hidden-sm hidden-xs">
<a href= "edit-appointment.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>

<a href="appointment-history.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
</div>

<div class="visible-xs visible-sm hidden-md hidden-lg">
<div class="btn-group" dropdown is-open="status.isopen">
<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
</button>

</div>
</div>
</td>
</tr>

<?php
$cnt=$cnt+1;
}?>
</tbody>
</table>
</div>
</div>
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
<script src="vendor/switchery/switchery.min.js"></script>
<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="vendor/autosize/autosize.min.js"></script>
<script src="vendor/selectFx/classie.js"></script>
<script src="vendor/selectFx/selectFx.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
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
