<?php 
if(isset($_POST['create']))
{
	
		$conn=mysqli_connect("localhost","root","allah777agber","BK");
		$name=$_POST['name'];
		$ad=$_POST['ad'];
		$u=$_POST['user'];
		$phone=$_POST['phone'];
		$p=$_POST['p'];
		$p1=$_POST['p1'];
	    $error=array();
  
        function error_name()
		{
			$name=$_POST['name'];
			if(empty($name))
		{
			$error['n']="Name Requires";
			return $error['n'];
		}
		}
		
		 function error_address()
		{
			$ad=$_POST['ad'];
			if(empty($ad))
		{
			$error['add']="Address Requires";
			return $error['add'];
		}
		}
		function error_user()
		{
		$u=$_POST['user'];
		$conn=mysqli_connect("localhost","root","allah777agber","BK");
		$username="select *from register where username='$u'";
	    $username=mysqli_query($conn,$username);
	
	    if(empty($u))
		{
			$error['u']="Uesrname Requires";
			return $error['u'];
		}else if(mysqli_num_rows($username)>0)
		{
			$error['u']="Uesrname is not available";
		   return $error['u'];
		}
		
		}
		
		function error_phone()
		{$phone=$_POST['phone'];
			
		if(empty($phone))
		{
			$error['phone']="Number Requires";
			return $error['phone'];
		}
		}
		
		function error_passord()
		{
		$conn=mysqli_connect("localhost","root","allah777agber","BK");
		$p=$_POST['p'];
		if(empty($p)){
		$error['p']='Passord Requires';
		return  $error['p'];
		}
		}
		
		function error_passord1()
		{
         $conn=mysqli_connect("localhost","root","allah777agber","BK");
		$p1=$_POST['p1'];
		if(empty($p1)){
		$error['p1']='ConfirmPassord Requires';
		return  $error['p1'];
		}
		}
		
		if(!empty(error_name()))
		{
		$error['n']=error_name();
		}
		if(!empty(error_address()))
		{
		$error['add']=error_address();
		}
		if(!empty(error_user()))
		{
		$error['u']=error_user();
		}
		if(!empty(error_phone()))
		$error['phone']=error_phone();
		if(!empty(error_passord()))
		$error['p']=error_passord();
		if(!empty(error_passord1()))
		$error['p1']=error_passord1();
		else if($p!=$p1)
		{
			$error['p1']="ConfirmPassord is not correct";
		}else{
			$hash=password_hash($p,PASSWORD_DEFAULT);
		}
		
		if(count($error)==0){
		$q="Call Sign_up('".$name."','".$ad."','".$u."','".$phone."','".$hash."')";
		  $q=mysqli_query($conn,$q);
		  if($q)
		  echo 'Y';
		  else
		  echo 'N';

		header('Location: Login.php');
		exit();
		}
		
}

?>
<html>
<body>
<head>
<link rel="stylesheet" href="register.css">
</head>


<div class="signup_form">
<h2>Online Bakery Management System</h2>
<h1>Sign Up For Free</h1>
<form action="Register.php" method="post">
<input type="text" name="name" placeholder="Name"><br>
<div  style="color:red;"><?php if(isset($error['n'])) echo $error['n'] ;?> </div><br>
<input type="text" name="ad" placeholder="Address"><br>
<div  style="color:red;"><?php if(isset($error['add'])) echo $error['add'] ;?> </div><br>
<input type="text" name="phone" placeholder="Phone Number"><br>
<div  style="color:red;"><?php if(isset($error['phone'])) echo $error['phone'] ;?> </div><br>
<input type="text" name="user" placeholder="UserName"><br>
<div   style="color:red;"><?php if(isset($error['u'])) echo $error['u'] ;?> </div><br>
<input type="password" name="p" placeholder="Password" ><br>
<div   style="color:red;"><?php if(isset($error['p'])) echo $error['p'] ;?> </div><br>
<input type="password" name="p1" placeholder="Confirm Password"><br>
<div  style="color:red;"><?php if(isset($error['p1'])) echo $error['p1'] ;?> </div><br>
<input type="submit"name="create" value="Create a Account"><br><br><br>
<p>Already Have a Account?
<a href="login.php">Login Here!</a>
</p>
</form>
</div>

</body>

</html>