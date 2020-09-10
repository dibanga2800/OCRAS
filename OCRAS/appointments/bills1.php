<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
$PatientName=$_POST['PatientName'];
$Consultancy_Charge=$_POST['Consultancy_Charge'];
$Payment_Status=$_POST['Payment_Status'];

$query=mysqli_query($con,"insert into bills(PatientName,Consultancy_Charge,Payment_Status) values('$PatientName','$Consultancy_Charge','$Payment_Status')");
	if($query)
	{
		echo "<script>alert('Payment successfully updated');</script>";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Receptionist  | Dashboard</title>
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


	
	<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title> Edit details </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#id').keyup(function() {
                var sid = $(this).val();
				//alert(sid);
                var data_String = 'sid=' + sid;
                $.get('search1.php', data_String, function(result) {

                    $.each(result, function(){
                        $('#id').val(this.id);
                        $('#fname').val(this.fname);
                        $('#Address').val(this.Address);
                        $('#phone').val(this.phone);
						
                    });


                });
            });
        });
    </script>
	
<script type="text/javascript">
function SubmitForm() {
var id = $("#id").val();
var fname = $("#fname").val();
var Address = $("#Address").val();
var phone = $("#phone").val();

if (fname == '' || Address == '' || phone == '' ) {
alert("Oops!.,  Some Fields are Blank....!!");
} else {
$.post("submit.php", { id: id, fname: fname, Address: Address, phone: phone},
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
								<div class="col-sm-8">
									<h1 class="mainTitle">Bills | Dashboard</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Receptionist</span>
									</li>
									<li class="active">
										<span>Dashboard</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						
							<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
								<?php echo htmlentities($_SESSION['msg1']="");?></p>	
													<form role="form" name="bill" method="post" >
														
							
							
							
							
							
							
						
						<div class="form-group"> 
		  
		   <label for="PatientID">
			Patient ID
			</label>
															
			<div class="form-group">
			<input type="text" id="id" class="form-control" name="id" placeholder="Patient ID" required>
			</div>	
		  
                                     
		   <label for="PatientName">
			Patient Name
			</label>
															
			<div class="form-group">
			<input type="text" id="fname" class="form-control" name="patient" placeholder="Patient name" required>
			</div>						
							
 <label for="Consultancy">
			Consultancy Charge
			</label>
															
			<div class="form-group">
			<input type="text" id="ConsultancyCharge" class="form-control" name="Consultancy Charge" placeholder="Consultancy Charge" required>
			</div>
 <label for="PaymentStatus">
			Payment Status
			</label>
															
			<div class="form-group">
			<input type="text" id="PaymentStatus" class="form-control" name="PaymentMode" placeholder="Payment Status" required>
			</div>			
															
																											
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
												</div>
											</div>
										

						

			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			<>
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
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
