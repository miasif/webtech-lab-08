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
				<li><a href="editprofile.php">Edit_Profile</a></li>
				<li><a href="changeprofile.php">Change Profile</a></li>
				<li><a href="changepassword.php">Change password</a></li>
				<li><a href="login.php">logout</a></li>
			</ul>
		 </div>
		 
	   <div class="menu_right">
			<h2>Welcome <?php echo $username; ?></h2>
			
	   </div>
	</div>
	
	
	

		<div class="content_right">
			<h3>Change Password</h3>
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "userdb";
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT id, name, username, email,password FROM users WHERE username='".$_SESSION["uname"]."'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					
					while($row = $result->fetch_assoc()) {
						$eid=$row["id"];
						$ename=$row["name"];
						$eemail=$row["email"];
						$uuname=$row["username"];
						$epass=$row["password"];
					}
					
				} else {
					echo "0 results";
				}

				$conn->close();
				
				
			 ?>
		<form method="post">
		<table>
			<tr>
				<td><b>Current password :</b></td>
				<td><input type="text" name="oldpass" /></td>
				
			</tr>
			<tr>
				<td><b>New password :</b></td>
				<td><input type="text" name="newpass"/></td>
				
			</tr>
			
			<tr>
				<td><b>Retype New Password :</b></td>
				<td><input type="text" name="renewpass"/></td>
				
			</tr>
			
			
			
			
			<tr>
				<td align="center" colspan="2"><input type="submit" value="Submit" /></td>
				
			</tr>
			
		</table>
		
			
		
	</form>
			
		</div>
	</div>
		
	<div class="footer_area">
	</div>
		
	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "userdb";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					$sql="UPDATE users SET name='".$_POST["name"]."',email='".$_POST["email"]."' WHERE id='".$eid."'";
					//$sql = "INSERT INTO products (product_name, description, quantity)
					//VALUES ('".$_POST["pname"]."', '".$_POST["description"]."', '".$_POST["quantity"]."')";

					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$conn->close();
			$_SESSION["uname"]=$_POST["uname"];
			header("Location:login.php");	
		}
		
		
	?>
</body>
</html>