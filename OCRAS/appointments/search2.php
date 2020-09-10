<?php
header('Content-Type: application/json');
$response = array();
if (isset($_GET['sid'])){
//database connection
$con=mysqli_connect("localhost", "root", "", "ocras");
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$qry = "SELECT * FROM bills WHERE PatientId = '".$_GET['sid']."' ";

$result = mysqli_query($con, $qry);  //mysql_query($qry);

while ($row = mysqli_fetch_array($result)){
    array_push($response, $row);
}

echo json_encode($response);
}
?>
