<?php

$con = mysqli_connect("localhost","root","rahul@123","dbms_demo");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user_type = $_GET["user_type"];
$password = md5($_POST["password"]);

$query = NULL;
$residentquery = NULL;
$aadhar = $_POST["aadhar"];
$residentquery = "SELECT * from Resident where '$aadhar' = resident.aadhar";
$result = mysqli_query($con, $residentquery);
$row = $result->fetch_assoc();
$query = "SELECT scheme_name from schemes s where s.beneficiary_age_lower <= year(CURDATE())-year($row["dob"]) and s.beneficiary_age_higher >= $row["age"] and (s.gender = NULL or s.gender =  $row["gender"]) and s.beneficiary_income_lower <= $row["family_income"] and s.beneficiary_income_higher >= $row["family_income"] and exists(select * from resources r where s.scheme_name = r.scheme_name and  $row["city"] = r.city )";
$result = mysqli_query($con, $query);
$numResults = mysqli_num_rows($result);





$query = "SELECT * from Schemes s where s.Scheme_name = '$scheme'";

?>
