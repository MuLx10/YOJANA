<?php

$con = mysqli_connect("localhost","root","rahul@123","dbms_demo");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$user_type = $_GET['user_type'];
$aadhar = $_POST["aadhar"];
$password = ($_POST["password"]);

$query = "SELECT name FROM resident r WHERE r.aadhar=$aadhar and r.password='$password'" ;
$result = mysqli_query($con, $query);
$numResults = mysqli_num_rows($result);
echo "numResults: ";
echo $numResults;
$row = $result->fetch_assoc();

echo "user_type";
echo $user_type;

echo ": row: ";
echo $row;

if($row) {
	$name = $row['name'];
	echo "I am inside";
	
	if($user_type == 2) { 
		header ("Location: SchemeInitiator.php?name=$name&aadhar=$aadhar");
	}
	if($user_type == 1) { //already exist
		header ("Location: SchemeManager.php?name=$name&aadhar=$aadhar");
	}
	if($user_type == 0) { //already exist
		header ("Location: ResidentHomepage.php?name=$name&aadhar=$aadhar");
	}  
}else{
header ("Location: signin_with_signup.php?state=3&user_type=$user_type");
	
}
echo "printing results";
echo $numResults;

?>
