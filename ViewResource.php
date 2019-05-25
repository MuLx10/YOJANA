<?php 
	// $name = $_GET['name'];
	$name = "Raj";
	$servername = "localhost";
	$username = "root";
	$password = "rahul@123";
	$dbname = "dbms_demo";

	$user_type = $_GET['user_type'];
	$scheme_name = $_GET['scheme_name']; 
	$aadhar = $_GET['aadhar'];
	// $scheme_name = "ABC ";
	// $sponsored_by = "XYZ Inc.";
	// $start_age = 18;
	// $end_age = 100;
	// $start_income = 0;
	// $end_income = 5;
	// $gender = Male;
	$sql_scheme_details =  "SELECT resource_name, scheme_name, total_quantity, used_quantity FROM resources r where r.scheme_name = '$scheme_name'";
	$sql_manager_details = "SELECT r.resource_name, r.scheme_name, total_quantity, used_quantity FROM resources r ,(SELECT scheme_name FROM scheme_manager s where s.manager_aadhar = $aadhar) t where t.scheme_name = r.scheme_name";
	$sql_resident_details = "SELECT resource_name, scheme_name, quantity_provided as used_quantity FROM handles h where h.resident_aadhar = $aadhar";
	
	$status = "inline";
	if ($user_type == 0){
		$status = "none";
	}

?>
<html>
	<head>
		<title>Resource</title>
		<link href="https://fonts.googleapis.com/css?family=Nixie+One" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch" rel="stylesheet"> 
		<style type="text/css">
			html { 
					background: url(back.jpg) no-repeat center center fixed;
  					-webkit-background-size: cover;
  					-moz-background-size: cover;
  					-o-background-size: cover;
  					background-size: cover;
				}
			html, body {
    			height: 100%;
			}
			html {
    			display: table;
    			margin: auto;
			}
			body {
    			display: table-cell;
    			vertical-align: middle;
			}

			a:link, a:visited {
				color: white;
				text-decoration: none;
				font-size: 100px;
			}
			div {
				width: 600px;
				padding: 20px;
				margin: 0;
			}
			.data{
				width: 100%;
				height: 10%;
				font-family: sans-serif;
				word-spacing: 0px; 
				text-align:top; 
				color:#25632b;
				padding: 2px 8px;
				margin: 1px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
				border: none;
				text-decoration: none;
				display: inline-block;
				font-weight: bold;
				color: #259;
			}
			.headitem{
				font-size: 10px; 
				color:#303030;
			}
			.item{
				font-size: 15px;
				color:#007; 
				float:  right;
				margin-right: 5%;
				font-weight: normal;
				display: inline-block;
			}
			.up{
				border-radius: 5px;
				background-color: #FFFACD;
			}

		</style>
	</head>

	<body>
	<h1  style = "font-family:'Georgia', serif; font-size: 50px; word-spacing: 0px; text-align:top; color:#303030;margin-top: -60px;"> YOJANA</h1>
		<h3 id = "user" style = "font-family:'Georgia', serif; font-size: 30px; word-spacing: 0px;  color: #303030;margin-top: -10px;">Welcome <?php echo $name ?></h3>
		<p id = "user" style = "font-family:'Georgia', serif; font-size: 20px; word-spacing: 0px;  color: #006400;margin-bottom: 1px; font-weight: bold;">Scheme <?php echo $scheme_name ?></p>
		<div class="up">
		<?php  
		$con = mysqli_connect("127.0.0.1","root","rahul@123","dbms_demo");

		echo "HERE I AM";
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }

		if($user_type == 1){
			$result = mysqli_query($con, $sql_manager_details);		
		}
		else if ($user_type == 0){
			$result = mysqli_query($con, $sql_resident_details);
		}
		else{
			$result = mysqli_query($con, $sql_scheme_details);
		}

		$numResults = mysqli_num_rows($result);
		    while($row = $result->fetch_assoc()) { 
		    	$resource_name = $row['resource_name']; 
		    	$scheme_name = $row['scheme_name']; 
		    	$used_quantity = $row['used_quantity']; 
		    	$total_quantity = $row['total_quantity']; 
		    	 ?> 

		        <div class="data">Resource Name  <p class="item"><?php echo $resource_name ?> </p></div>
				<div class="data">Scheme Name  <p class="item"><?php echo $scheme_name ?> </p></div>
				<div class="data">Used Quantity  <p class="item"><?php echo $used_quantity ?> </p></div>
				<div class="data" style="display: <?php echo $status ?>">Total Quantity <p class="item"><?php echo $total_quantity ?> </p></div>
				<br>
				<hr size="3">
		    <?php  } 
		?>
			</div><br/>
			
		<a href = "ResidentHomepage.php?aadhar=<?php echo $aadhar ?>" style = "font-family: 'Georgia'; text-align:left ;font-weight: bold; font-size: 35px; color: #303030;">Home</span>
</html>
