
<?php

if(isset($_POST["orderpastries"]))
{
$conn=mysqli_connect("localhost","root","allah777agber","BK");
	$customerid="select *from customer";
    $r=mysqli_query($conn,$customerid);
	$row = mysqli_fetch_array($r);
	$full=0;
	if(isset($_POST['q1'])){
	  $qq2=$_POST["q1"]; 
	  if(!empty($qq2))
	  {
		  $full=1;
	  $q="call AddtoCart($row[0],15,'Blind baking','Pastries',16,$qq2)";
	    mysqli_query($conn,$q);
	  }
	 }
	
	 if(isset($_POST['q2'])){
	  $qq2=$_POST["q2"]; 
	  if(!empty($qq2))
	  {
		  $full=1;
	  $q="call AddtoCart($row[0],16,'Filo pastry','Pastries',16,$qq2)";
	    mysqli_query($conn,$q);
	  }
	 }
	 if(isset($_POST['q3'])){
	     $qq3=$_POST["q3"]; 
		 if(!empty($qq3))
		 {
			 $full=1;
	  $q="call AddtoCart($row[0],17,'Puff pastry','Pastries',20,$qq3)";
	    mysqli_query($conn,$q);
		 }
	 }
	 
	  if($full==1)
	 {
	 echo '<script>alert("It has been added")</script>'; 
	 }
	 else
	 {
	  echo '<script>alert("You should select Item")</script>'; 
	 }
	 $conn->close();
}
?>
<html>
<head>
  <link rel="stylesheet" href="pastries.css" type="text/css">
  </head>
<body>

<div class="shop">Online Bakery Shop</div>

<div class="box">
<div class="text">Pastries</div>
<img src="image/Blind baking.png" class="p1">
<img src="image/Filo pastry.png" class="p2">
<img src="image/Puff pastry.png" class="p3">


</div>

<form action='pastries.php' method='post'>
<input type="submit" name="home" value="Home" class="home">
<input type="submit" name="cart" value="Cart" class="cart">
<input type="submit" name="logout" value="Logout" class="logout">

<div class="box_order">
<div class="order_pastries">Add To Cart</div>
<input type="number" name="q1" placeholder="Quantity(Blind baking)" min="1"  class="qr1"><br><br>
<input type="number" name="q2"  placeholder="Quantity(Filo pastry)" min="1" class="qr2"><br><br>
<input type="number" name="q3" placeholder="Quantity(Puff pastry)" min="1" class="qr3"><br><br>

<input type="submit" name="orderpastries" value="Add" class="orderP">

</div>
</form>

<table border="1">
<tr>
<th>ProductId</th>
<th>Name</th>
<th>Product</th>
<th>Price</th>


</tr>

<?php

$conn=mysqli_connect("localhost","root","allah777agber","BK");
$t="select *from products where category='Pastries'";
	$r=mysqli_query($conn,$t);
	if(!$r)
	{
		die("Error");
	}
	while($row = mysqli_fetch_array($r))
	{
		
	echo "<tr>"; 
	echo "<td>".$row[0]."</td>"; 
	echo "<td>".$row[1]."</td>";
	echo "<td> </td>";
	echo "<td>".$row[3]."</td>";
	echo "</tr>";
	}
	if(isset($_POST['cart']))
	{
		header('Location:cart.php');
		exit();
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
?>


</table>
</body>
</html>