<?php
	session_start();
	$username=$_SESSION["uname"];
	
	
	
	?>
<!DOCTYPE HTML>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASIF MIA</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body> 

   <div class="header_area">
		<div class="header_left">
			<h1>XCompany</h1>
		</div>
		
	<div class="header">	
		<div class="header_index">
			<h3><a href="index.php">Home</a></h3>
		</div>
		<div class="header_login">
			<h3>Logged in as<a style="color:blue;" href="profile.php"><?php echo  $username; ?></a></h3>
		</div>
		<div class="header_registration">
			<h3><a href="login.php">Logout</a></h3>
		</div>
	</div>	
   </div>
	
	
	<div class="content_area">
	   <div class="menu_left">
		 <h3>Account</h3>
		  </hr>
 	   </div>
	   </hr>
	     <div class="menu">
			<ul>
				<li><a href="dashboard.php">Dasboard</a></li>
				<li><a href="profile.php">View Profile</a></li>
				<li><a href="editprofile.php">Edit Profile</a></li>
				<li><a href="changeprofile.php">Change Profile</a></li>
				<li><a href="changepassword.php">Change password</a></li>
				<li><a href="login.php">logout</a></li>
			</ul>
		 </div>
		 
	   <div class="menu_right">
	       <h3>Profile Picture</h3>
				<form action="upload.php" method="post" enctype="multipart/form-data">
					Select image to upload:
					<input type="file" name="fileToUpload" id="fileToUpload">
					<input type="submit" value="Upload Image" name="submit">
				</form>
				
			<div class="content_right_r">
			
			</div>
		</div>
	</div>
	<div class="footer_area">
	</div>
</body>
</html>