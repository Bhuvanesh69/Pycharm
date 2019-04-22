<?php
session_start();
$connection=mysqli_connect("localhost","root","1971383","booknow");
if(isset($_POST["sub"]))
{
	$name=$_POST["uname"];
	$_SESSION['uname1']=$name;
	$pwd=$_POST["pwd"];
	$query="select password from user_details where username='$name'";
	$query1=" select movie_name from movie_details where movie_id=(select movie_id from booking_details where booking_id=(select max(booking_id) from booking_details where username='$name'))";
	$query2="select donation_amount, card_no from payment_details where payment_id=(select payment_id from booking_details where booking_id=(select max(booking_id) from booking_details where username='$name'))";
	$result=mysqli_query($connection,$query);
	$result1=mysqli_query($connection,$query1);
	$result2=mysqli_query($connection,$query2);
	$rows=mysqli_fetch_assoc($result);
	foreach($rows as $key=>$value)
	{
		$password=$value;//$password is the variable to store the db pwd
	}
	$movienames=[];
	while($rows1=mysqli_fetch_assoc($result1)){
	foreach($rows1 as $key=>$value)
	{
		array_push($movienames,$value);
	}
	}
	$_SESSION['mov']=$movienames;
	$rows2=mysqli_fetch_assoc($result2);
	$_SESSION['pay1']=$rows2;
	if($pwd==$password)
	{
		header("location: wel.php");
	}
	else
	{
		header("location: loginass.php");
	}
}
?>
<html>
<body>
<form action="php2.php" method="post">
	<center><br><br><br>Username: <input type="text" name="uname"><br><br>
	Password: <input type="password" name="pwd"><br><br>
	<input type="submit" name="sub" value="submit"></center>
</form>
</body>
</html>