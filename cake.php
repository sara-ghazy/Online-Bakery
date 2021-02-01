
<?php

if(isset($_POST["ordercake"]))
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
	  $q="call AddtoCart($row[0],10,'Pound Cake','Cakes',15,$qq2)";
	    mysqli_query($conn,$q);
	  }
	 }
	
	 if(isset($_POST['q2'])){
	  $qq2=$_POST["q2"]; 
	  if(!empty($qq2))
	  {
		  $full=1;
	  $q="call AddtoCart($row[0],11,'Red Velvet','Cakes',15,$qq2)";
	    mysqli_query($conn,$q);
	  }
	 }
	 if(isset($_POST['q3'])){
	     $qq3=$_POST["q3"]; 
		 if(!empty($qq3))
		 {
			 $full=1;
	  $q="call AddtoCart($row[0],12,'Carrot','Cakes',17,$qq3)";
	    mysqli_query($conn,$q);
		 }
	 }
	 if(isset($_POST['q4'])){
	  $qq4=$_POST["q4"]; 
	  if(!empty($qq4))
	  {
		  $full=1;
	  $q="call AddtoCart($row[0],13,'Sponge','Cakes',15,$qq4)";
	    mysqli_query($conn,$q);
	  }
	 }
	 if(isset($_POST['q5'])){
	  $qq5=$_POST["q5"]; 
	  if(!empty($qq5))
	  {
		  $full=1;
	  $q="call AddtoCart($row[0],14,'Genoise','Cakes',15,$qq5)";
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
  <link rel="stylesheet" href="cake.css" type="text/css">
  </head>
<body>

<div class="shop">Online Bakery Shop</div>

<div class="box">
<div class="text">Cakes</div>
<img src="image/Pound.png" class="p1">
<img src="image/Red Velvet.png" class="p2">
<img src="image/Carrot.png" class="p3">
<img src="image/Sponge.png" class="p4">
<img src="image/Genoise.png" class="p5">

</div>

<form action='cake.php' method='post'>
<input type="submit" name="home" value="Home" class="home">
<input type="submit" name="cart" value="Cart" class="cart">
<input type="submit" name="logout" value="Logout" class="logout">

<div class="box_order">
<div class="order_cake">Add To Cart</div>
<input type="number" name="q1" placeholder="Quantity(Pound Cake)" min="1"  class="qr1"><br><br>
<input type="number" name="q2"  placeholder="Quantity(Red Velvet)" min="1" class="qr2"><br><br>
<input type="number" name="q3" placeholder="Quantity(Carrot)" min="1" class="qr3"><br><br>
<input type="number" name="q4" placeholder="Quantity(Sponge)" min="1" class="qr4"><br><br>
<input type="number" name="q5" placeholder="Quantity(Genoise)" min="1" class="qr5"><br><br>
<input type="submit" name="ordercake" value="Add" class="orderC">

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
$t="select *from products where category='Cakes'";
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