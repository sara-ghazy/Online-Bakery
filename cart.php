
<html>
<body>
<head>
  <link rel="stylesheet" href="cart.css" type="text/css">
  </head>
  
 <div class="shop">Online Bakery Shop</div>
 <form action="cart.php" method='post'>
<input type="submit" name="home" value="Home" class="home">
<input type="submit" name="cart" value="Cart" class="cart">
<input type="submit"  name="logout" value="Logout" class="logout">

</form>

 <div class="box">
 <div class="txt">Your Cart</div>
 <form action="cart.php" method='post'>
 <div class="boxx">
 <input type="submit" name="cancel" value="Cancel" class="cancel">
 <input type="submit" name="order" value="Confirm Order" class="order">
 <input type="number" name="del" placeholder="id product" min='1' class="del">
 </div>
 </form>
 

<table border='1'>
<th>id product</th>
<th>Name</th>
<th>Category</th>
<th>Quantity</th>
<th>Cost</th>

<?php

    $conn=mysqli_connect("localhost","root","allah777agber","BK");
    $customerid="select *from customer";
    $r=mysqli_query($conn,$customerid);
	$row = mysqli_fetch_array($r);
	if($row>0){
		$row[0]=(int)$row[0];
     $r="select *from cart where id_customer=$row[0]";
	$r=mysqli_query($conn,$r);
	}
	if(!$r)
	{
		die("Error");
	}
	
	$full=0;
	while($rr = mysqli_fetch_array($r))
	{
		$full=1;
	echo "<tr>"; 
	echo "<td>".$rr[1]."</td>"; 
	echo "<td>".$rr[2]."</td>"; 
	echo "<td>".$rr[3]."</td>"; 
	echo "<td>".$rr[5]."</td>"; 
	echo "<td>".$rr[6]."</td>"; 
	echo "</tr>";
	
	}
	if($row>0)
	{
		
	  $t="select TotalCost(".$row[0].")";
	  $t=mysqli_query($conn,$t);
	   $t=mysqli_fetch_array($t);
	   if(!$t[0])
	   $t[0]=0;
	   echo "<tr>";
       echo "<div class='total'>".'TotalCost = '.$t[0]."</div>";
	   echo "</tr>";
	}
	if(isset($_POST['cancel']))
	 {
		 $d=$_POST['del'];
		 echo $d;
		 echo 'yes';
		 $r="delete from cart where id_product=$d";
		 mysqli_query($conn,$r);
		 
		 header('Location: cart.php');
	 }
	 if(isset($_POST['home']))
	{
		header('Location:bakery.php');
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
if(isset($_POST['order']))
{
	if($full>0)
	{
	header('Location:card.php');
		exit();
	}else{
	 echo '<script>alert("Your Cart is empty")</script>'; 
	}
}


?>


</table>
</div>



</body>

</html>