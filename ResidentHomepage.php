<?php 
	
	$name = $_GET['name'];
	$aadhar = $_GET['aadhar'];
	$servername = "localhost";
	$username = "root";
	$password = "rahul@123";
	$dbname = "dbms_demo"; 

?>
<html>
	<head>
		<title>Resident Homepage</title>
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

			.button {
				background-color: #14d18c; /* Green */
				border: none;
				color: black;
				padding: 15px 32px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
			}

			body {
    			display: table-cell;
    			vertical-align: middle;
			}

			a:link, a:visited {
				color: white;
				text-decoration: none;
				
			}
			div {
				width: 600px;
				padding: 20px;
				margin: 0;
			}

		</style>
	</head>

	<body>
	<h1  style = "font-family:'Georgia', serif; font-size: 50px; word-spacing: 0px; text-align:top; color:#303030;"> YOJANA</h1><br/>
	<a class="button" href = "ViewResource.php?user_type=0&aadhar=<?php echo $aadhar ?>" style = "font-family: 'Georgia'; text-align:left ;font-size: 25px; color: #303030;">My Resources</a>
	<a class="button" href = "resident_update_profile.php?aadhar=<?php echo $aadhar ?>" style = "font-family: 'Georgia'; text-align:left ;font-size: 25px; color: #303030;">Update Profile</a>
	<a class="button" href = index.php style = "font-family: 'Georgia'; text-align:left ;font-size: 25px; color: #303030;">Logout</a>
		<h3 id = "user" style = "font-family:'Georgia', serif; font-size: 50px; word-spacing: 0px;  color: #303030;">Welcome <?php echo $name ?></h3>
		<p id = "user" style = "font-family:'Georgia', serif; font-size: 50px; word-spacing: 0px;  color: #303030;">Here is a list of curated schemes</p>
		<div >
		 <?php 
		$con = mysqli_connect($servername,$username, $password, $dbname);

		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  } ?>

		<?php 
		$residentquery = "SELECT * from resident where $aadhar = resident.aadhar";
		$result = mysqli_query($con, $residentquery);
		$row = $result->fetch_assoc();
		$city = $row['city'];
		$gender = $row['gender'];
		$income = $row['family_income'];
		$dob = $row['dob'];
		
		$query = "SELECT scheme_name from schemes s where (s.beneficiary_gender is NULL or s.beneficiary_gender =  '$gender') and s.beneficiary_income_lower < $income and s.beneficiary_income_higher > $income and exists(select * from resources r where s.scheme_name = r.scheme_name and r.city = '$city' )";
		$result = mysqli_query($con, $query);
		$numResults = mysqli_num_rows($result);

		    while($row = $result->fetch_assoc()) { 
		    	$s_name = $row['scheme_name']?>
		        <a href ='ViewScheme.php?scheme_name=<?php echo $s_name?>&aadhar=<?php echo $aadhar ?>'><button class = "button" type = "button"><?php echo $row['scheme_name']?></button></a>
		    <?php } 
		?>
		<br><br>
			
			</div><br/> <br/>
</html>
