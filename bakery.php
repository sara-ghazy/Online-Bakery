<html>
  <head>
  <link rel="stylesheet" href="S_B.css" type="text/css">
  </head>
<body>
<div class="shop">Online Bakery Shop</div>
<div class="box">
<div class="text">Category</div>
<form action='bakery.php' method='post'>
<input type="submit" name="bread" value=""  class="bread">
<input type="submit" name="cookie"value="" class="cookie">
<input type="submit" name="cake" value="" class="cake">
<input type="submit" name="pastrie" value="" class="pastrie">
<div class="part1">Breads</div>
<div class="part2">Cookies</div>
<div class="part3">Cake</div>
<div class="part4">Pastries</div>

</div>
<input type="submit" value="Home" class="home">
<input type="submit" name="cart" value="Cart" class="cart">
<input type="submit" name="logout" value="Logout" class="logout">
</form>

<?php
if(isset($_POST['bread']))
{
	header('location:bread.php');
	exit();
}

if(isset($_POST['cookie']))
{
	header('location:cookie.php');
	exit();
}
if(isset($_POST['cake']))
{
	header('location:cake.php');
	exit();
}
if(isset($_POST['pastrie']))
{
	header('location:pastries.php');
	exit();
}
if(isset($_POST['cart']))
{
	header('location:cart.php');
	exit();
}
if(isset($_POST['logout']))
{
	$conn=mysqli_connect("localhost","root","allah777agber","BK");
	$d="delete from customer";
	mysqli_query($conn,$d);
	
	header('location:Register.php');
	exit();
}



?>
</body>
</html>