<?php 
	$aadhar = $_GET['aadhar'];
	$status = "none";
	$status1 = "none";
	if($_GET['state'] == 1){
		$status = "inline";
	}
	if($_GET['state'] == 2){
		$status1 = "inline";
	}

?>
<html>
	<head>
		<title>Add Resource</title>
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
				width: 100%;
				padding: 12px 20px;
				margin: 2px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}
			input[type=number], select {
				width: 100%;
				padding: 12px 20px;
				margin: 2px 0;
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
				margin: 2px 0;
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
				margin: 2px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
			}

			input[type=radio], select {
				padding: 12px 20px;
				margin: 2px 0;
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
		<h3 id = "user" style = "font-family:'Georgia', serif; font-size: 50px; word-spacing: 0px;  color: #303030;">Welcome Scheme Initiator</h3>
		<h4 id = "user" style = "font-family:'Georgia', serif; font-size: 20px; word-spacing: 0px;  color: #303030;margin-bottom: -10px;">Add Resource</h4>
		<div >
		<!-- <a href = respondent_homepage.php style = "font-family: 'Georgia'; text-align:left ;font-size: 25px; color: #303030;">logout</span> -->
			<form action = "AddResourceBackend.php?aadhar=<?php echo $aadhar?>" method = "POST">
				<input type = "text" name = "resource_name" placeholder = "Resource Name"><br>
				<input type = "text" name = "scheme_name" placeholder = "Scheme Name">
				<input type = "text" name = "state" placeholder = "State Covered"><br>
				<input type = "text" name = "city" placeholder = "City Covered"><br>
				<input type = "text" name = "manager" placeholder = "Manager"><br>
				<input type = "number" name = "quantity" placeholder = "Quantity/ Amount"><br>
				<br>
				<br>
				<button class = "button" type = "submit" >Submit</button>
				<button class = "button" type = "button" onclick="document.location.href='SchemeInitiator.php?aadhar=<?php echo $aadhar?>'">Back</a></button><br/>
			</form>
			<p hidden style = "font-family:'Georgia', serif; font-size: 50px; word-spacing: 0px; text-align:top; color: #303030;display: <?php echo $status ?>;"> Resource and manager added </p>
			<p hidden style = "font-family:'Georgia', serif; font-size: 50px; word-spacing: 0px; text-align:top; color: #303030;display: <?php echo $status1 ?>;"> Manager already exists, only resource updated </p>
			</div><br/> <br/>
</html>
