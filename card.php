
<html>
<body>
<head>
  <link rel="stylesheet" href="card.css" type="text/css">
  </head>
  
 <div class="shop">Online Bakery Shop</div>
 <form action="card.php" method='post'>
<input type="submit" name="home" value="Home" class="home">
<input type="submit" name="cart" value="Cart" class="cart">
<input type="submit"  name="logout" value="Logout" class="logout">

</form>

 <div class="box">
 <div class="boxx">
 <form action="card.php" method='post'>
   <div class="txt">Name On Card  <input type="text" name="NC"> </div><br><br>
    <div class="cr">Creadit Card No  <input type="text" name="CC"> </div><br><br>
	 <div class="cv">CVV No  <input type="text" name="CV"> </div><br><br>
	 <input type="submit" name="done" value="Done" class="done"><br>
 </form>
 </div>
</div>

<?php

    $conn=mysqli_connect("localhost","root","allah777agber","BK");
    $customerid="select *from customer";
    $r=mysqli_query($conn,$customerid);
	$row = mysqli_fetch_array($r);
     $r="select TotalCost(".$row[0].")";
	$r=mysqli_query($conn,$r);
	$r= mysqli_fetch_array($r);
	
	
	
	if(isset($_POST['done']))
	{
		$name=$_POST['NC'];
		$CC=$_POST['CC'];
		$CV=$_POST['CV'];
		if(!empty($name)&&!empty($CC)&&!empty($CV))
		{
		
			$rr="call insert_card(".$row[0].",'".$name."','".$CC."','".$CV."',".$r[0].")";
			$rr=mysqli_query($conn,$rr);
			echo '<script>alert("Your request has been completed.")</script>'; 
			
		}else{
			echo '<script>alert("You shoud fill in all your data!")</script>'; 
		}
	}
	
	
	 if(isset($_POST['home']))
	{
		header('Location:bakery.php');
		exit();
	}
	
	if(isset($_POST['cart']))
	{
		header('Location:cart.php');
		exit();
	}
	if(isset($_POST['logout']))
	{
		$conn=mysqli_connect("localhost","root","allah777agber","BK");
	$d="delete from customer";
	mysqli_query($conn,$d);
		
		header('Location:Register.php');
		exit();
	}



?>




</body>

</html>