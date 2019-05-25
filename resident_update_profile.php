<?php 
	// $name = $_GET['name'];
	$name = "Raj";
	$aadhar = $_GET['aadhar'];
?>
<html>
	<head>
		<title>Update Profile</title>
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
				/*border: 5px solid gray;*/
				margin: 0;
			}
			.button {
				background-color: #FFFFFF; /* Green */
				border: none;
				color: black;
				padding: 15px 32px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
			}

			input[type=text], select {
				width: 49%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}
			input[type=number], select {
				width: 49%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}
			input[type=date], select {
				width: 49%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}
			.right {
				position: relative;
				right: 0px;
				left : 300px;
				padding: 0px;
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
			.income{
				width: 30%;
				padding: 12px 20px;
				margin: 8px 0;
				color:  #303030;
				background-color: #000;
			}

			.genderT{
				width: 50%;
				margin-bottom: -10px; 
				color:  #303030;
				font-family:'Georgia', serif;
			}
			input[type=password], select {
				width: 100%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}

			input[type=radio], select {
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
				font-size: 10px;
				color: #303030;
			}

		</style>
	</head>

	<body>
	<h1  style = "font-family:'Georgia', serif; font-size: 50px; word-spacing: 0px; text-align:top; color:#303030;"> YOJANA</h1><br/>
		<h3 id = "user" style = "font-family:'Georgia', serif; font-size: 50px; word-spacing: 0px;  color: #303030;">Welcome <?php echo $name ?></h3>
		<p id = "user" style = "font-family:'Georgia', serif; font-size: 50px; word-spacing: 0px;  color: #303030;">Enter the updated information</p>
		<div >
		<!-- <a href = respondent_homepage.php style = "font-family: 'Georgia'; text-align:left ;font-size: 25px; color: #303030;">logout</span> -->
			<form action = "resident_up_backend.php?user_type=<?php echo $user_type?>" method = "POST">
				<input type = "number" name = "aadhar" width = "100" placeholder = "Aadhar"><br>
				<input type = "text" name = "name" width = <?php echo $inp_width ?>px placeholder = "Name"><br>
				<input type = "number" name = "income" width = <?php echo $inp_width ?>px placeholder = "Income"><br>
				<input type = "date" name ="dob", width = <?php echo $inp_width ?>px placeholder="Date of birth"><br><br>
				<button class = "button" type = "submit" >Submit</button>
				<a class = "button" type = "button" href='ResidentHomepage.php?aadhar=<?php echo $aadhar ?>'>Back</a></button><br/>
			</form>
		
			</div><br/> <br/>
</html>
