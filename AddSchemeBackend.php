<?php 
	$aadhar = $_GET['aadhar'];
	$sponsered_by = $_POST["sponsered_by"];
	$scheme_name = $_POST["scheme_name"];
	$start_age = $_POST["start_age"];
	$end_age = $_POST["end_age"];
	$start_income = $_POST["start_income"];
	$end_income = $_POST["end_income"];
	$gender = $_POST["gender"];

	$con = mysqli_connect("localhost","root","rahul@123","dbms_demo");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$query = "SELECT * from schemes r where '$scheme_name' = r.scheme_name";
	$result = mysqli_query($con, $query);
	$numResults = mysqli_num_rows($result);
	if($numResults == 0){
		$query = "INSERT into schemes values('$scheme_name', 1,'$gender', $start_age, '$end_age', $start_income, $end_income, '$sponsered_by' )" ;
		$result = mysqli_query($con, $query);
		echo "aadhar: "; echo $aadhar;
		$query = "INSERT into scheme_initiator values( $aadhar, '$scheme_name' )";
		$result = mysqli_query($con, $query);
	header ("Location: AddScheme.php?state=1&aadhar=$aadhar");
	}
	else{

	header ("Location: AddScheme.php?state=2&aadhar=$aadhar");

	}

?>