<?php 
	// $name = $_GET['name'];
	$name = "Raj";
	$servername = "localhost";
	$username = "root";
	$password = "rahul@123";
	$dbname = "dbms_demo";
	$aadhar = $_GET['aadhar'];
	$scheme_name = $_GET['scheme_name'];
	// $scheme_name = "ABC ";
	// $sponsored_by = "XYZ Inc.";
	// $start_age = 18;
	// $end_age = 100;
	// $start_income = 0;
	// $end_income = 5;
	// $gender = Male;
	$sql_get_scheme = "SELECT scheme_name, sponsoredby, beneficiary_age_higher, beneficiary_age_higher, beneficiary_income_lower, beneficiary_income_higher, beneficiary_gender FROM schemes where scheme_name = '$scheme_name'";
?>
<html>
	<head>
		<title>Schemes</title>
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
			}
			div {
				width: 600px;
				padding: 20px;
				margin: 0;
			}
			.button {
				background-color: #14d18c; /* Green */
				border: none;
				color: black;
				padding: 15px 20px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 12px;
				border-radius: 8px;
				font-family: 'Georgia'; text-align:left ;font-weight: bold; font-size: 20px; color: #303030;
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
				align-items: center;
			}
			.headitem{
				font-size: 10px; 
				color:#303030;
			}
			.item{
				font-size: 10px;
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
		$con = mysqli_connect("localhost","root","rahul@123","dbms_demo");

		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		$result = mysqli_query($con, $sql_get_scheme);
		$numResults = mysqli_num_rows($result);
		
		
			    while($row = $result->fetch_assoc()) { 
			    	$scheme_name = $row['scheme_name'];
			    	$sponsored_by = $row['sponsoredby'];
			    	$start_age = $row['beneficiary_age_lower'];
			    	$end_age = $row['beneficiary_age_higher'];
			    	$start_income = $row['beneficiary_income_lower'];
			    	$end_income = $row['beneficiary_income_higher'];

			    	?> 

			        <div class="data">Scheme Name  <p class="item"><?php echo $scheme_name ?> </p></div>
					<div class="data">Sponsored By  <p class="item"><?php echo $sponsored_by ?> </p></div>
					<div class="data">Beneficiary Start Age  <p class="item"><?php echo $start_age ?> </p></div>
					<div class="data">Beneficiary End Age  <p class="item"><?php echo $end_age ?> </p></div>
					<div class="data">Beneficiary Start Income  <p class="item"><?php echo $start_income ?> LPA</p></div>
					<div class="data">Beneficiary End Income  <p class="item"><?php echo $end_income ?> LPA</p></div>
					<div class="data">Beneficiary Gender  <p class="item"><?php echo $gender ?></p></div>
					<br>
			    <?php  }
		?>
			</div><br/>
		<a class="button" href = "ViewResource.php?user_type=3&scheme_name=<?php echo $scheme_name ?>&aadhar=<?php echo $aadhar ?>">View Resource</span></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a class="button" href = "ResidentHomepage.php?aadhar=<?php echo $aadhar ?>" >Home</span></a>
</html>
