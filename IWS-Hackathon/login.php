<DOCTYPE! HTML>
<?php
session_start();
	require "connect.inc.php";
	
	require "username.inc.php";
?>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="homepage.css"/>
		
		<title>iws</title>
	</head>
		
	<body>
		
		<div id="heading">
			
			<h1 align="right">iws</h1>
		</div>
		<div id="login">
			<form action="login.php" method = 'POST'>
				USER ID: <input type='text' name='username'>
				PASSWORD: <input type='password' name='password'>
				<input type ='submit' name='sub' value='LOG IN' >
		
			</form>

		</div>
	
	</body>


</html>
<?php




 function getidfield() {
	$query_id = "select userId from login where username = '".$_POST['username']."'";
	$query_run = mysql_query($query_id);
	if($res = mysql_fetch_array($query_run)){
		 return $res[0];
	}
}
	
	function getusersfield($field) {
		$query2 = "select `$field` from login where userId = '".getidfield()."' ";
		$query_run2 = mysql_query($query2) or die(mysql_error());
		if ($query_res2 = mysql_fetch_array($query_run2)){
			return $query_res2[0];
		}
	
	}
	
	

		
		if(isset($_POST['username']) || isset($_POST['password'])){
			$user = $_POST['username'];
			$password =	$_POST['password'];
			$_SESSION["username"] = $user;
			$_SESSION["password"] = $password;
				
			
			
			$_SESSION['id'] = getidfield();
	    	$_SESSION['name'] = getusersfield("username") ;
			$_SESSION['password'] = getusersfield("password")  ;
	
				 
			$id = getidfield();
			$name = getusersfield("username");
			$password1 = getusersfield("password");
			
			
			//$password_hash = md5($password);
			if(!empty($_SESSION["username"]) && !empty($_SESSION["password"])){
			
						
						if(isset($_POST['sub'])){
							
							$query_username = "select userId from login where username = '".$user."' and password = '".$password."' ";
							$query_work= mysql_query($query_username);
							
							if($query_work){
								
								$rows = mysql_num_rows($query_work);
								
								if($rows>0){
									
									
									printf("<script> window.location='home.php' </script>");
									
									
								}
								else{
									
									echo "invalid";
								}
							}
							else {
								echo "false";
							}
						}
							
			}
			else{
				echo "Fill all the fields";
	        }
		}
		   


?>