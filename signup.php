<?php
	require('connection.php');
	$status = 0;
	if(isset($_POST['submit']))
	{
		$uname=$_POST['username'];
		$pass=md5($_POST['psw']);
		$email=$_POST['email'];

		$sql="select * from credentials where username='$uname' or email='$email'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$status = 2;
		} 
		else
		{		
			$sql = "INSERT INTO `credentials`(`username`, `email`, `password`) VALUES ('$uname','$email','$pass')";
			mysqli_query($conn,$sql);
			$status = 1;
		}
	}
	function success()
	{
		echo '<div class="alert alert-success" role="alert">
				<h4 class="alert-heading">Successful!</h4>
				</div>';
	}
	function fail()
	{
		echo '<div class="alert alert-danger" role="alert">
				<h4 class="alert-heading">Already Registered!</h4>
				</div>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="well container" style="padding-left: 25%; padding-right: 25%;">
		<?php if($status == 1) success();
				elseif ($status == 2) fail();?>
	<form action="signup.php" style="border:1px solid #ccc" method="post">
		<div class="jumbotron">
    <h1 class="text-center">Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <div class="form-group">
    <label for="username"><b>Username</b></label><br>
    <input type="text" class="form-control" placeholder="Enter Username" name="username" required><br>
	</div>

    <div class="form-group">
    <label for="email"><b>Email</b></label><br>
    <input type="email" class="form-control" placeholder="Enter Email" name="email" required><br>
    </div>

	<div class="form-group">
    <label for="psw"><b>Password</b></label><br>
    <input type="password" class="form-control" placeholder="Enter Password" name="psw" required><br>
    </div>

    <div class="form-group">
    <input type="submit" class="btn btn-success" style="float: right; margin-left: 10px;" name="submit" value="Submit">
    <input type="reset" class="btn btn-default" style="float: right; margin-left: 10px;" name="reset" value="Reset">
    </div>
	</div>
  </div>
</form> 
</body>
</html>