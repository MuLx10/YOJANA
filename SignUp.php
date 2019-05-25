<?php 
	$user_type = $_GET['user_type'];
	$status = "none";
	if($_GET['state'] == 1){
		$status = "inline";
	}
?>
<html>
	<head>
		<title>YOJANA</title>
		<link href="https://fonts.googleapis.com/css?family=Nixie+One" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch" rel="stylesheet"> 
		<style type="text/css">
			html { 
					background: url(playing.jpg) no-repeat center center fixed;
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
				text-align: center;
    			display: table-cell;
    			vertical-align: middle;
			}
			.center {
    			margin: auto;
			    width: 25%;
			}
			input[type=text],input[type=select], select {
				width: 50%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}
			input[type=number], select {
				width: 50%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}
			input[type=date], select {
				width: 50%;
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
			.radioo {
				border: none;
				color: black;
				padding: 15px 32px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
			}
			.genderT{
				color:  #303030;
				display: inline-block;
				font-family:'Georgia', serif;
				font-size: 50px;
			}
			input[type=password], select {
				width: 50%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}
		</style>
	</head>

	<body class = "right" style = "font-family:'Georgia', serif; font-size: 100px; word-spacing: 0px; text-align:top; color: #303030;"> YOJANA
	<br>
	<center>
		<h3 style = "font-family:'Georgia', serif; font-size: 50px; word-spacing: 0px; text-align:center; color: #303030;">Signup</h3>
		<form action = "SignupBackend.php?user_type=<?php echo $user_type ?>" method = "POST">
			<div style="float:left;">
			<input type = "number" name = "aadhar" placeholder = "Aadhar Number">
			<input type = "password" name = "password" type = "password" placeholder = "Password">
			<input type = "text" name = "name" placeholder = "Name">
			<input type = "number" name = "mobile" placeholder = "Mobile Number">
			<input type = "text" name = "state" placeholder = "State">
			<input type = "text" name = "city" placeholder = "City"><br>		
			<input type = "date" name = "dob" placeholder = "Date of Birth">
			<input type = "number" name = "income" placeholder = "Family/Personal Income">
			<select name="gender">
			  <option style="color:#259;text-align: center;" value="male">Male</option>
			  <option style="color:#259;text-align: center;" value="female">Female</option>
			  <option style="color:#259;text-align: center;" value="other">Other</option>
			  <option style="color:#259;text-align: center;" value="null">None</option>
			</select>
			<br>
			<button class = "button" type = "submit" >Submit</button>
			<button class = "button" type = "button" onclick="document.location.href='signin_with_signup.php'">Back</a></button>
			</div>
		</form>
		<p hidden style = "font-family:'Georgia', serif; font-size: 50px; word-spacing: 0px; text-align:top; color: #303030;display: <?php echo $status ?>;"> User Already exists! </p>
	</center>
</body>
</html>
