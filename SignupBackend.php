<?php

$con = mysqli_connect("localhost","root","rahul@123","dbms_demo");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$user_type = $_GET['user_type'];
$name = $_POST["name"];
$mobile = $_POST["mobile"];
$aadhar = $_POST["aadhar"];
$password = ($_POST["password"]);
$income = $_POST['income'];
$city = $_POST['city'];
$state = $_POST['state'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];

$query = "SELECT * FROM resident r WHERE r.aadhar=$aadhar";
$result = mysqli_query($con, $query);
$numResults = mysqli_num_rows($result);

echo "printing results";
echo $numResults;
if($numResults>0) { //already exist
	header ("Location: signin_with_signup.php?state=1&user_type=$user_type");
}
else {
$ins_query = "INSERT INTO resident values ($aadhar, '$name', '$gender', '$dob', $income, '$state', '$city', $mobile, '$password')";
$re = mysqli_query($con, $ins_query);
echo "Here: ";
echo $re;
}

echo $ins_query;
header ("Location: signin_with_signup.php?state=2&user_type=$user_type");
?>
