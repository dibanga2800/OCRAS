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
									<h1 class="mainTitle">Patient | Dashboard</h1><hr>
								</div></div>
							</section>
<h2>How to read your glasses’ eye prescription</h2>
<h3> By Gary Heiting, OD</h3>
<p><img src="/OCRAS/images/headerlogo/testresult.png" alt="Test Result"></p><br/>
<h3> Terms On Your Spectacle Prescription</h3>
<p><h3>Sphere (SPH).</h3> This indicates the amount of lens power, measured in dioptres (D), prescribed to correct shortsightedness or longsightedness. If the number appearing under this heading has a minus sign (–), you are shortsighted; if the number has a plus sign (+) or is not preceded by a plus sign or a minus sign, you are longsighted.
The term "sphere" means that the correction for shortsightedness or longsightedness is "spherical," or equal in all meridians of the eye.
</p><hr>
<p><h3>Cylinder (CYL).</h3> This indicates the amount of lens power for astigmatism. If nothing appears in this column, either you have no astigmatism, or your astigmatism is so slight that it is not really necessary to correct it with your spectacle lenses.
</br></br>The term "cylinder" means that this lens power added to correct astigmatism is not spherical, but instead is shaped so one meridian has no added curvature, and the meridian perpendicular to this "no added power" meridian contains the maximum power and lens curvature to correct astigmatism.
</br><br/>The number in the cylinder column may be preceded with a minus sign (for the correction of shortsighted astigmatism) or a plus sign (for longsighted astigmatism). Cylinder power always follows sphere power in a spectacle prescription.
</p>
<p><img src="/OCRAS/images/headerlogo/eye.png" alt="Test Result"></p><br/>
<p>Meridians of the eye are determined by superimposing a protractor scale on the eye's front surface. The 90-degree meridian is the vertical meridian of the eye, and the 180-degree meridian is the horizontal meridian.</p>
<p><h3>Axis.</h3> This describes the lens meridian that contains no cylinder power to correct astigmatism. The axis is defined with a number from 1 to 180. The number 90 corresponds to the vertical meridian of the eye, and the number 180 corresponds to the horizontal meridian.
If a spectacle prescription includes cylinder power, it also must include an axis value, which follows the cyl power and is preceded by an "x" when written freehand.
The axis is the lens meridian that is 90 degrees away from the meridian that contains the cylinder power.</br></br>
<h3>Add.</h3> This is the added magnifying power applied to the bottom part of multifocal lenses to correct presbyopia. The number appearing in this section of the prescription is always a "plus" power, even if it is not preceded by a plus sign. Generally, it will range from +0.75 to +3.00 D and will be the same power for both eyes.</br></br>
<h3>Prism.</h3> This is the amount of prismatic power, measured in prism dioptres ("p.d." or a superscript triangle when written freehand), prescribed to compensate for eye alignment problems. Only a small percentage of spectacle prescriptions include prism.</br>
When present, the amount of prism is indicated in either metric or fractional English units (0.5 or ½, for example), and the direction of the prism is indicated by noting the relative position of its "base" or thickest edge. Four abbreviations are used for prism direction: BU = base up; BD = base down; BI = base in (toward the wearer's nose); BO = base out (toward the wearer's ear).
Sphere power, cylinder power and add power always appear in dioptres. They are in decimal form and generally are written in quarter-dioptre (0.25 D) increments. Axis values are whole numbers from 1 to 180 and signify only a meridional location, not a power. When prism dioptres are indicated in decimal form, typically only one digit appears after the decimal point (e.g., 0.5).
</p></br>
<p><h3>An Example Of A Spectacle Prescription</h3>
Confused? Let's use an example to clear things up. (Pun intended.)</br></br>
<h4>Here is a sample spectacle prescription:</h4>
<h4>RE -2.00 SPH +2.00 add 0.5 p.d. BD</h4>
<h4>LE -1.00 -0.50 x 180 +2.00 add 0.5 p.d. BU</h4>
In this case, the optician has prescribed -2.00 D sphere for the correction of myopia in the right eye (RE, or OD).</br> There is no astigmatism correction for this eye, so no cylinder power or axis is noted. This optician has elected to add "SPH," to confirm the right eye is being prescribed only spherical power. (Some doctors will add "DS" for "dioptres sphere;" others will leave this area blank.)</br></br>
The left eye (LE, or OS) is being prescribed -1.00 D sphere for myopia plus -0.50 D cylinder for the correction of astigmatism. The cyl power has its axis at the 180 meridian, meaning the horizontal (180-degree) meridian of the eye has no added power for astigmatism and the vertical (90-degree) meridian gets the added -0.50 D.</br></br>
Both eyes are being prescribed an "add power" of +2.00 D for the correction of presbyopia, and this spectacle prescription includes a prismatic correction of 0.5 prism dioptre in each eye. In the right eye, the prism is base down (BD); in the left eye, it's base up (BU).

</p>
</div>
</div>
</div>
<!-- start: FOOTER -->
<footer class="text-center" id="footer">&copy; copyright 2019 OCRAS MSC Project </footer>
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
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
	</body>
</html>
