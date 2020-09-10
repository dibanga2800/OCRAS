<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$PatientId=intval($_GET['id']);// get Patient id

if(isset($_POST['submit']))
{
$PatientId=$_POST['PatientId'];
$Rfactor=$_POST['Rfactor'];
$Phistory=$_POST['Phistory'];
$Ccomplaint=$_POST['Ccomplaint'];
$RSPH=$_POST['RSPH'];
$RCYL=$_POST['RCYL'];
$RAXIS=$_POST['RAXIS'];
$LSPH=$_POST['LSPH'];
$LCYL=$_POST['LCYL'];
$LAXIS=$_POST['LAXIS'];
$LHDist=$_POST['LHDist'];
$LVDist=$_POST['LVDist'];
$LHNear=$_POST['LHNear'];
$LVNear=$_POST['LVNear'];
$RHDist=$_POST['RHDist'];
$RVDist=$_POST['RVDist'];
$RHNear=$_POST['RHNear'];
$RVNear=$_POST['RVNear'];
$Purpose=$_POST['Purpose'];
$Quality=$_POST['Quality'];
$Remark=$_POST['Remark'];

$query=mysqli_query($con,"insert into pexam(PatientId,Rfactor	,Phistory,Ccomplaint,RSPH,RCYL,RAXIS,LSPH,LCYL,LAXIS,LHDIST,LVDIST,LHNEAR,LVNEAR,RHDIST,RVDIST,RHNEAR,RVNEAR,purpose,quality,remark) values('$PatientId','$Rfactor','$Phistory','$Ccomplaint','$RSPH','$RCYL','$RAXIS','$LSPH','$LCYL','$LAXIS','$LHDist','$LVDist','$LHNear','$LVNear','$RHDist','$RVDist','$RHNear','$RVNear','$Purpose','$Quality','$Remark')");
if($query)
{

echo "<script>alert('Patient Details Saved Successfully.');</script>";
echo "<script>window.location.href ='dashboard.php'</script>";

}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Doctor | Patient Examination Details</title>
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
<link rel="stylesheet" href="assets/css/special.css">


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
<div class="col-sm-8">
<h1 class="mainTitle">Doctor | Patient Examination Details</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Doctor</span>
</li>
<li class="active">
<span>Patient Examination Details</span>
</li>
</ol>
</div>
</section>


<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 style="color: green; font-size:18px; ">
<?php if($msg) { echo htmlentities($msg);}?> </h5>
<div class="row margin-top-10">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h5 class="panel-title">Patient Examination info</h5>
</div>
<div class="panel-body">
<?php $sql=mysqli_query($con,"select * from appointment where id='$PatientId'");
while($data=mysqli_fetch_array($sql))
{
?>

<h4><?php echo htmlentities($data['PatientName']);?>'s Profile</h4>
<p><b>Appointment Date: </b><?php echo htmlentities($data['appointmentDate']);?></p>

<?php if($data['updationDate']){?>
<?php } ?>
<hr />
<form role="form" name="adddoc" method="post" onSubmit="return valid();">
<div class="form-group">
<label for="PatientID">
Patient ID
</label>

<input name="PatientId" class="form-control"  value="<?php echo htmlentities($data['PatientId']);?>"readonly>

<?php $sql=mysqli_query($con,"select * from appointment where id='$PatientId'");
while($data=mysqli_fetch_array($sql))
{
?>
<?php } ?>


</input>
</div>


<div class="form-group">
<label for="Rfactor">
Risk Factor
</label>
<select name="Rfactor" class="form-control" required="required">
<option value="<?php echo htmlentities($data['Rfactor']);?>">
<?php echo htmlentities($data['Rfactor']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['Rfactor']);?>">
<?php echo htmlentities($row['Rfactor']);?>
</option>
<?php } ?>

</select>
</div>

<div class="form-group">
<label for="Phistory">
Past History
</label>
<select name="Phistory" class="form-control" required="required">
<option value="<?php echo htmlentities($data['Phistory']);?>">
<?php echo htmlentities($data['Phistory']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['Phistory']);?>">
<?php echo htmlentities($row['Phistory']);?>
</option>
<?php } ?>

</select>
</div>


<div class="form-group">
<label for="Ccomplaint">
Chief Complaint
</label>
<select name="Ccomplaint" class="form-control" required="required">
<option value="<?php echo htmlentities($data['Ccomplaint']);?>">
<?php echo htmlentities($data['Ccomplaint']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['Ccomplaint']);?>">
<?php echo htmlentities($row['Ccomplaint']);?>
</option>
<?php } ?>

</select>
</div>
<div>
</br>

<h4>
AUTO REFRACTOMETER TEST
</h4>

</div>
</br>
<p4>SPH   CYL  AXIS</p4>

<div class="form-group">
<label for="R">
R
</label>
<select name="RSPH" placeholder="SPH" required="required">
<option value="<?php echo htmlentities($data['SPH']);?>">
<?php echo htmlentities($data['SPH']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['SPH']);?>">
<?php echo htmlentities($row['SPH']);?>
</option>
<?php } ?>

</select>

<select name="RCYL"  required="required" >
<option value="<?php echo htmlentities($data['CYL']);?>">
<?php echo htmlentities($data['CYL']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['CYL']);?>">
<?php echo htmlentities($row['CYL']);?>
</option>
<?php } ?>

</select>

<select name="RAXIS" title="AXIS" required="required">
<option value="<?php echo htmlentities($data['AXIS']);?>">
<?php echo htmlentities($data['AXIS']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['AXIS']);?>">
<?php echo htmlentities($row['AXIS']);?>
</option>
<?php } ?>

</select>


<div class="form-group">
<label for="L">
L
</label>
<select name="LSPH" placeholder="SPH" required="required">
<option value="<?php echo htmlentities($data['SPH']);?>">
<?php echo htmlentities($data['SPH']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['SPH']);?>">
<?php echo htmlentities($row['SPH']);?>
</option>
<?php } ?>

</select>

<select name="LCYL" placeholder="SPH" required="required">
<option value="<?php echo htmlentities($data['CYL']);?>">
<?php echo htmlentities($data['CYL']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['CYL']);?>">
<?php echo htmlentities($row['CYL']);?>
</option>
<?php } ?>

</select>

<select name="LAXIS" title="AXIS" required="required">
<option value="<?php echo htmlentities($data['AXIS']);?>">
<?php echo htmlentities($data['AXIS']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['AXIS']);?>">
<?php echo htmlentities($row['AXIS']);?>
</option>
<?php } ?>

</select>
</div>
<div>
</br>
<h4>
SPECTACLE PRESCRIPTION
</h4>

</div>
</br>

<c4>H-DIST   V-DIST  H-NEAR V-NEAR</c4>

<div class="form-group">
<label for="LPrism">
LPrism
</label>
<select name="LHDist"  required="required">
<option value="<?php echo htmlentities($data['SPH']);?>">
<?php echo htmlentities($data['SPH']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['SPH']);?>">
<?php echo htmlentities($row['SPH']);?>
</option>
<?php } ?>

</select>

<select name="LVDist"  required="required" >
<option value="<?php echo htmlentities($data['CYL']);?>">
<?php echo htmlentities($data['CYL']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['CYL']);?>">
<?php echo htmlentities($row['CYL']);?>
</option>
<?php } ?>

</select>

<select name="LHNear" required="required">
<option value="<?php echo htmlentities($data['AXIS']);?>">
<?php echo htmlentities($data['AXIS']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['AXIS']);?>">
<?php echo htmlentities($row['AXIS']);?>
</option>
<?php } ?>

</select>

<select name="LVNear" required="required">
<option value="<?php echo htmlentities($data['vision']);?>">
<?php echo htmlentities($data['vision']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['vision']);?>">
<?php echo htmlentities($row['vision']);?>
</option>
<?php } ?>

</select>


<div class="form-group">
<label for="RPrism">
RPrism
</label>
<select name="RHDist" required="required">
<option value="<?php echo htmlentities($data['SPH']);?>">
<?php echo htmlentities($data['SPH']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['SPH']);?>">
<?php echo htmlentities($row['SPH']);?>
</option>
<?php } ?>

</select>

<select name="RVDist" placeholder="RVDist" required="required">
<option value="<?php echo htmlentities($data['CYL']);?>">
<?php echo htmlentities($data['CYL']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['CYL']);?>">
<?php echo htmlentities($row['CYL']);?>
</option>
<?php } ?>

</select>

<select name="RHNear"  required="required">
<option value="<?php echo htmlentities($data['AXIS']);?>">
<?php echo htmlentities($data['AXIS']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['AXIS']);?>">
<?php echo htmlentities($row['AXIS']);?>
</option>
<?php } ?>

</select>

<select name="RVNear" required="required">
<option value="<?php echo htmlentities($data['vision']);?>">
<?php echo htmlentities($data['vision']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['vision']);?>">
<?php echo htmlentities($row['vision']);?>
</option>
<?php } ?>

</select>

</div>

<div class="form-group">
<label for="Purpose">
Purpose
</label>
<select name="Purpose" class="form-control" required="required">
<option value="<?php echo htmlentities($data['Purpose']);?>">
<?php echo htmlentities($data['Purpose']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['Purpose']);?>">
<?php echo htmlentities($row['Purpose']);?>
</option>
<?php } ?>

</select>
</div>

<div class="form-group">
<label for="Quality">
Quality
</label>
<select name="Quality" class="form-control" required="required">
<option value="<?php echo htmlentities($data['Quality']);?>">
<?php echo htmlentities($data['Quality']);?></option>
<?php $ret=mysqli_query($con,"select * from Etest");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['Quality']);?>">
<?php echo htmlentities($row['Quality']);?>
</option>
<?php } ?>

</select>
</div>
<div class="form-group">
<label for="Remark">Remark</label>
<TextArea name="Remark" class="form-control" required="required"></TextArea>
</div>
<?php } ?>
</br>
<button type="submit" name="submit" class="btn btn-o btn-primary">
Save
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
