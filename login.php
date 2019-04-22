<script type="text/javascript">
	function showPasswordAlert(){
		document.getElementById('IncorrectLogin').style = "display:block";
	}
</script>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="login.php" method="post">
              <div class="form-label-group">
                <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <div class="alert alert-danger alert-dismissible fade show" id="IncorrectLogin" name ="login"style="display: none;">
    				<strong>Incorrect username/password !</strong>
  			 </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="Submit">Sign in</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php
session_start();

$connection=mysqli_connect("localhost","root","1971383","beemail");

if(isset($_POST['Submit']))
{
	$_SESSION['email_id']=$_POST['Email'];
	$email=$_POST["Email"];
	$pwd=$_POST["pwd"];
	$query="select password from users where email='$email'";
	$result=mysqli_query($connection,$query);
	$rows=mysqli_fetch_assoc($result);

	foreach ($rows as $i=>$j) {
		
		if($j==$pwd)
		{
		
			header("location: http://localhost/email/home.php");
		}
		else
		{
			echo "<script type='text/javascript'> showPasswordAlert(); </script>";
		}
		
	
}
}
?>
