<?php 
	// $aadhar = $_GET['aadhar'];
	$scheme_name = $_POST["scheme_name"];
	$resource_name = $_POST["resource_name"];
	$quantity = $_POST["quantity"];
	$aadhar = $_POST["resident_aadhar"];

	$con = mysqli_connect("localhost","root","rahul@123","dbms_demo");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


	$query = "SELECT * from resources r where '$scheme_name' = r.scheme_name and '$resource_name' = r.resource_name";
	$result = mysqli_query($con, $query);
	$numResults = mysqli_num_rows($result);
	if($numResults == 0){
		header ("Location: Allocate.php?state=1");
	}
	else{
		$row = $result->fetch_assoc();
		if($row['total_quantity'] - $row['used_quantity'] < $quantity){
			header ("Location: Allocate.php?state=2");		
		}
		else{
			$used_quantity = $row['used_quantity'] + $quantity;
			$query = "UPDATE resources r SET used_quantity = $used_quantity where '$scheme_name' = r.scheme_name and 
			   '$resource_name' = r.resource_name ";
			$result = mysqli_query($con, $query);
 
 			$query = "SELECT * from handles h where h.resident_aadhar = $aadhar and h.scheme_name = '$scheme_name' and h.resource_name = '$resource_name' ";
			$result = mysqli_query($con, $query);
			$numResults = mysqli_num_rows($result);

			if($numResults == 0){
				echo "Printing";

				$query = "INSERT into handles values ($quantity, $aadhar, '$resource_name', '$scheme_name') ";
				$result = mysqli_query($con, $query);
				echo $query;
				echo "Came Here!";
				echo $result;
				header ("Location: Allocate.php?state=3");
			}
			else{
				$row = $result->fetch_assoc();
				$quantity_given = $row[quantity_provided] + $quantity;

				$query = "UPDATE handles h set quantity_provided = $quantity_given where  h.resident_aadhar = $aadhar and h.scheme_name = '$scheme_name' and h.resource_name = '$resource_name' ";
				$result = mysqli_query($con, $query);
				echo "Wrong Place";
				header ("Location: Allocate.php?state=3");
			}
		}

	

	}
?>