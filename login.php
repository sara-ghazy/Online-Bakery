
<?php
if(isset($_POST['submit']))
{
 $conn=mysqli_connect("localhost","root","allah777agber","BK");
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$error=array();
	if(empty($user))
	$error['u']='UserName Requires';
	
	if(empty($pass))
	{
		$error['p']='Password Requires';
	}
	
	if(count($error)==0)
	{
		$q="select *from register where username='$user'";
		$q=mysqli_query($conn,$q);
		if(mysqli_num_rows($q)>0)
		{
			$r=mysqli_fetch_array($q);
			$hash=$r['passwordd'];
		if(password_verify($pass,$hash))
		{
			$q="select id from register where username='$user'";
			$q=mysqli_query($conn,$q);
			$r=mysqli_fetch_array($q);
			$r=$r['id'];
			
			$q="call insert_customer($r,'$user')";
			 mysqli_query($conn,$q);
			 $q="delete from cart where id_customer=$r";
			 mysqli_query($conn,$q);
			  $q="delete from card where customer_id=$r";
			  mysqli_query($conn,$q);
			 
		header('Location: bakery.php');
		 exit();
		}else{
			$error['p']='UserName/Password is not correct';
		}
		}else{
			$error['p']='UserName/Password is not correct';
		}
	}
	
}
?>
<html>
<body>

<head>
<link rel="stylesheet" href="register.css">
</head>
<div class='signin_form'>
<h1>Sign in<h1>
<form action='login.php' method='post'>
<input type='text' name='user' placeholder='UserName'><br>
<font   style="color:red;" size="5"><?php if(isset($error['u'])) echo $error['u'] ;?></font><br>
<input type="password" name='pass' placeholder='Password'><br>
<font   style="color:red;"size="5" ><?php if(isset($error['p'])) echo $error['p'] ;?> </font><br><br>
<input type='submit' name='submit' value='Login'><br><br>
</form>
</div>
</body>

</html>