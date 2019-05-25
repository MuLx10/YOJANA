<?php 
	$aadhar = $_GET['aadhar'];
	$resource_name = $_POST["resource_name"];
	$scheme_name = $_POST["scheme_name"];
	$state = $_POST["state"];
	$city = $_POST["city"];
	$quantity = $_POST["quantity"];
	$manager = $_POST["manager"];

	$con = mysqli_connect("localhost","root","rahul@123","dbms_demo");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	echo "here";

	$query = "SELECT * from resources r where '$scheme_name' = r.scheme_name and '$resource_name' = r.resource_name and '$state' = r.state and '$city' = r.city ";
	$result = mysqli_query($con, $query);
	$numResults = mysqli_num_rows($result);
	echo "numResults";
	echo $numResults;
	if($numResults == 0){
		$query = "INSERT into resources values('$resource_name','$scheme_name', '$state', '$city',0, $quantity)" ;
		$result = mysqli_query($con, $query);
		$query = "INSERT into scheme_manager values( $manager, '$scheme_name', '$state', '$city' )";
		$result = mysqli_query($con, $query);
	header ("Location: AddResource.php?state=1&aadhar=$aadhar");
	}
	else{
		
		$row = $result->fetch_assoc();
		$quantity = $row['total_quantity']+ $quantity;
		$query = "UPDATE resources r SET total_quantity = $quantity where '$scheme_name' = r.scheme_name and 
		  '$state' = r.state and '$city' = r.city and  '$resource_name' = r.resource_name ";
		$result = mysqli_query($con, $query);
		// if($result==False)
	header ("Location: AddResource.php?state=2&aadhar=$aadhar");

	}

?>