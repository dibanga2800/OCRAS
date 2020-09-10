<?php
session_start();
//error_reporting(0);
include('include/config.php');
$id=intval($_GET['id']);// get appointment id
if(isset($_POST['submit']))
{
$PatientName=$_POST['PatientName'];
$doctorSpecialization=$_POST['Doctorspecialization'];
$appointmentDate=$_POST['appointmentDate'];
$appointmentTime=$_POST['appointmentTime'];
$sql=mysqli_query($con,"Update appointment set PatientName='$PatientName',Doctorspecialization='$doctorSpecialization',appointmentDate='$appointmentDate',appointmentTime='$appointmentTime' where id='$id'");

if($sql)
{
$msg="Appointment Details updated Successfully";

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin | Edit Patient Details</title>
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


<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title> Edit details </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$('#PatientId').keyup(function() {
var sid = $(this).val();
//alert(sid);
var data_String = 'sid=' + sid;
$.get('search2.php', data_String, function(result) {

$.each(result, function(){
$('#PatientId').val(this.PatientId);
$('#PatientName').val(this.PatientName);
$('#Payment_Status').val(this.Payment_Status);

});
});
});
});
</script>

</head>
<body>
<div id="app">
<?php include('include/sidebar.php');?>
<div class="app-content">

<?php include('include/header.php');?>
<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->

<!-- end: TOP NAVBAR -->
<div class="main-content" >
<div class="wrap-content container" id="container">
<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Admin | Edit Appointment Details</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Admin</span>
</li>
<li class="active">
<span>Edit Appointment Details</span>
</li>
</ol>
</div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 style="color: green; font-size:18px; ">
<?php if($msg) { echo htmlentities($msg);}?> </h5>
<div class="row margin-top-30">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h5 class="panel-title">Edit Appointment info</h5>
</div>
<div class="panel-body">
<?php $sql=mysqli_query($con,"select * from appointment where id='$id'");
while($data=mysqli_fetch_array($sql))
{
?>
<h4><?php echo htmlentities($data['PatientName']);?>'s Profile</h4>
<p><b>Profile Reg. Date: </b><?php echo htmlentities($data['postingDate']);?></p>
<?php if($data['updatedDate']){?>
<p><b>Profile Last Updated Date: </b><?php echo htmlentities($data['updatedDate']);?></p>
<?php } ?>
<hr />
<form role="form" name="addappt" method="post" onSubmit="return valid();">



<div class="form-group">
<label for="PatientName">
Patient Name
</label>
<input type="text" name="PatientName" class="form-control" value="<?php echo htmlentities($data['PatientName']);?>" >
</div>

<div class="form-group">
<label for="DoctorSpecialization">
Doctor Specialization
</label>
<select name="Doctorspecialization" class="form-control">
<option value="<?php echo htmlentities($data['specialization']);?>">
<?php echo htmlentities($data['doctorSpecialization']);?></option>
<?php $ret=mysqli_query($con,"select * from doctorspecialization");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['specialization']);?>">
<?php echo htmlentities($row['specialization']);?>
</option>
<?php } ?>

</select>
</div>

<div class="form-group">
<label for="doctorId">
Doctor ID
</label>
<input type="text" name="doctorId" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['doctorId']);?>" >
</div>


<div class="form-group">
<label for="appointmentDate">
Date
</label>
<input class="form-control datepicker" name="appointmentDate"  required="required" data-date-format="yyyy-mm-dd" value="<?php echo htmlentities($data['appointmentDate']);?>">

</div>


<div class="form-group">
<label for="appointmentTime">
Time
</label>
<input class="form-control" name="appointmentTime" id="timepicker1" required="required" value="<?php echo htmlentities($data['appointmentTime']);?>">eg : 10:00 PM
</div>

<?php } ?>
<button type="submit" name="submit" class="btn btn-o btn-primary">
Update
</button>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="panel panel-white">


</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php');?>
<!-- end: FOOTER -->

<!-- start: SETTINGS -->
<?php include('include/setting.php');?>

<!-- end: SETTINGS -->
</div>
<!-- start: MAIN JAVASCRIPTS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="vendor/autosize/autosize.min.js"></script>
<script src="vendor/selectFx/classie.js"></script>
<script src="vendor/selectFx/selectFx.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="assets/js/main.js"></script>
<!-- start: JavaScript Event Handlers for this page -->
<script src="assets/js/form-elements.js"></script>
<script>
jQuery(document).ready(function() {
Main.init();
FormElements.init();
});

$('.datepicker').datepicker({
format: 'yyyy-mm-dd',
startDate: '-3d'
});
</script>
<script type="text/javascript">
$('#timepicker1').timepicker();
</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

</body>
</html>
