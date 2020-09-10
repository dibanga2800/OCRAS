<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
$specialization=$_POST['Doctorspecialization'];
$doctorid=$_POST['doctor'];
$PatientId=$_POST['PatientId'];
$PaymentStatus=$_POST['PaymentStatus'];
$appdate=$_POST['appdate'];
$time=$_POST['apptime'];
$PatientName=$_POST['PatientName'];
$docstatus=1;
$query=mysqli_query($con,"insert into appointment(doctorSpecialization,doctorId,PatientId,PaymentStatus,appointmentDate,appointmentTime,doctorStatus,PatientName) values('$specialization','$doctorid','$PatientId','$PaymentStatus','$appdate','$time','$docstatus','$PatientName')");
if($query)
{
?>
<script type="text/javascript">
alert('Appointment Successfully booked.');
window.location.href = "dashboard.php";
</script>
<?php

}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Patient  | Book Appointment</title>
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
<script>
function getdoctor(val) {
$.ajax({
type: "POST",
url: "get_doctor.php",
data:'specializationid='+val,
success: function(data){
$("#doctor").html(data);
}
});
}
</script>
<script>
function getfee(val) {
$.ajax({
type: "POST",
url: "get_doctor.php",
data:'doctor='+val,
success: function(data){
$("#fees").html(data);
}
});
}
</script>

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

<script type="text/javascript">
function SubmitForm() {
var PatientId = $("#PatientId").val();
var PatientName = $("#PatientName").val();
var Payment_Status = $("#Payment_Status").val();


if (PatientName == '' || Payment_Status == '' ) {
alert("Oops!.,  Some Fields are Blank....!!");
} else {PatientName
$.post("submit.php", { PatientId: PatientId, PatientName: PatientName, Payment_Status: Payment_Status},
function(data) {
alert("Data Loaded: " + data);
$('#myForm')[0].reset();
});
} }
</script>
</head>
<body>
<div id="app">
<?php include('include/sidebar.php');?>
<div class="app-content">

<?php include('include/header.php');?>

<!-- end: TOP NAVBAR -->
<div class="main-content" >
<div class="wrap-content container" id="container">
<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8"><hr>
<h1 class="mainTitle">Patient | Book Appointment</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Patient</span>
</li>
<li class="active">
<span>Book Appointment</span>
</li>
</ol>
</section>
<!-- end: PAGE TITLE -->
<!-- start: BASIC EXAMPLE -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">

<div class="row margin-top-1">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h5 class="panel-title">Book Appointment</h5>
</div>
<div class="panel-body">
<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
<?php echo htmlentities($_SESSION['msg1']="");?></p>
<form role="form" name="book" method="post" >



<div class="form-group">

<label for="PatientName">
Patient ID
</label>

<div class="form-group">
<input type="text" id="PatientId" class="form-control" name="PatientId" placeholder="Patient ID" required>
</div>


<label for="PatientName">
Patient Name
</label>

<div class="form-group">
<input type="text" id="PatientName" class="form-control" name="PatientName" placeholder="Patient name" required>
</div>


<label for="DoctorSpecialization">
Doctor Specialization
</label>
<select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
<option value="">Select Specialization</option>
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
<label for="doctor">
Doctors
</label>
<select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required=
"required">
<option value="">Select Doctor</option>
</select>
</div>


<label for="PaymentStatus">
Payment Status
</label>

<div class="form-group">
<input type="text" id="Payment_Status" class="form-control" name="PaymentStatus" placeholder="Payment Status" readonly>
</div>


<div class="form-group">
<label for="AppointmentDate">
Date
</label>
<input class="form-control datepicker" name="appdate"  required="required" data-date-format="yyyy-mm-dd">

</div>

<div class="form-group">
<label for="Appointmenttime">

Time

</label>
<input class="form-control" name="apptime" id="timepicker1" required="required">eg : 10:00 PM
</div>

<button type="submit" name="submit" class="btn btn-o btn-primary">
Submit
</button>
</form>
</div>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

</body>
</html>
