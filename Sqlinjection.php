<?php
include("config.php");
@ $conn= new mysqli('localhost','root','0959','db_secure');

if ($conn->connect_error) {
    echo "Acess denied: " . $conn->connect_error;
    printf("<br><a href=Lab-1.php>Return to home page </a>");
    exit();
}

if(isset($_POST['username'],$_POST['password'])){
	$userna= mysqli_real_escape_string($conn,$_POST['username']); 
	$userpas=sha1($_POST['password']);
	
	//echo "Username:'{$userna}' </br>Userpass = '{$userpas}'";
	

	$query = ("SELECT * FROM tb_users WHERE username='{$userna}' "." AND userpass ='{$userpas}'");
	
	$stmt=$conn->prepare($query);
	$stmt->execute();
	$stmt->store_result();

	$totalcount = $stmt->num_rows;
	
}


		@ $db = mysqli_connect("localhost","root","0959","the_photo");
		
		if ($db->connect_error) {
    		echo "Acess denied: " . $db->connect_error;
   		 	printf("<br><a href=Lab-1.php>Return to home page </a>");
    		exit();
			
			
}

			
			
			
?>

<?php
	include("header.php");
?>
<?php
	if(isset($totalcount)){
		if($totalcount==0){
			echo"</br>Please typing the correct password";
		}else{
			echo"The link to page:<a href=Auploading.php>Uploading you picture</a>";
		}
	}
	?>
<form method="POST"action="" >
    <h1>Log in</h1>
    <h2>Username:</h2>
	<input type="text" name="username"></br>
	<h2>Password:</h2>
    <input type="password" name="password"></br>
    <input type="submit" value="Come on">	
</form>
</div>
<?php
	include("footer.php");
?>
</div>
</body>
</html>