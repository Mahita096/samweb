<html>
<head>
<style>  
.error {color: #FF0001;}  
</style> 
</head>
<body>
 <?php
 include "CLsignupdetail.php";
 $nameErr = $mailErr = $passwordErr = $conpassErr ="";  
 $name = $mail= $password = $conpass ="";  
if($_SERVER["REQUEST_METHOD"] == "POST") {
if(empty($_POST['name'])){
		$nameErr = "name is required";		
	}
	else{
		$name = $_POST['name'];
		if(!preg_match("/^[a-zA-z ]*$/",$name)){
			$nameErr = "only letter and white sapce allowed";
		}
	}
	if(empty($_POST['mail'])){
		$mailErr = "email is required";		
	}
	else{
		$mail = $_POST['mail'];
		if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
			$mailErr = "Invalid email format";
	}
	}
if(empty($_POST['password'])){
		$passwordErr = "password is required";		
	}
	else{
		$password = $_POST['password'];
	}
	if(empty($_POST['conpass'])){
		$conpassErr = "confirm_password is required";		
	}
	else{
		$Confirmpassword=$_POST['conpass'];
		if($_POST['password']!= $_POST['conpass']){
		$conpassErr = "password not equel to same";
	}
	
	
	}
	
		}
		if(isset($_POST["clsubmit"])) {
			
			$sql= "INSERT INTO signpdetail(Name,Mail_Id,Password,Confirmpassword) VALUES('".$_POST["name"]."','".$_POST["mail"]."','".$_POST["password"]."','".$_POST["conpass"]."')";
	
	if (mysqli_query($conn,$sql)){
		echo "Account Successfully Created.";
	}
	else{
		echo "Error: ". $sql . "<br>" . mysqli_connect_error($conn);
		}
		}

?>
  
   <center><font size=6><b>Create an Account</b> </center>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
	
	
        <label for="username">UserName </label>
		<input type="text" id="name" name="name">  
		<span class = "Error" ><?php echo $nameErr ?></span><br><br>
		
        <label for="mail">Mail_Id</label> 
		<input type="text" id="mail" name="mail" >  
		<span class = "Error" ><?php echo $mailErr ?></span><br><br>
		
		<label for="password">Password </label> 
		<input type="password" id="password" name="password" >
		<span class = "Error" ><?php echo $passwordErr ?></span><br><br> 
		
		<label for="password">Confirm Password</label> 
		<input type="password" id="conpass" name="conpass" > 
		<span class = "Error" ><?php echo $conpassErr ?></span><br><br> 

                            
                        
		<input type="submit" name="clsubmit" value="SIGNIN" >
		
    </form>
 </body>
 </html>