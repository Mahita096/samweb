<html>
<body>
<center><font size=6><b>LOGIN</b>  </center>
    <form action="CLlogin.php" method = "post">
	
        <label> UserName </label>
		<input type="username" id="name" name="name" required><br><br>
	
		<label>Password </label> 
		<input type="password" id="password" name="password" required><br><br>
		
	    <input type ="submit" name ="submit" value="LOGIN">

</form>
</body>
</html>	
<?php  
 include 'CLsignupdetail.php';
if(isset($_POST["submit"])){
	$name=$_POST['name'];                     
	$password=$_POST['password'];   
	if($name!=""&&$password!=""){
		$sql="SELECT Name,Password FROM signpdetail WHERE Name='$name' AND Password='$password'";
		$result=$conn->query($sql);
		if($result->num_rows==1){
			header('location:mahi.php'); 
		}
	
		else{
			echo "Invalid user";  
		}
		
	
	}
	
  
}
?>

