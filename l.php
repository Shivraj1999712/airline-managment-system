<html>
<head>
<title>Login System</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1 style="margin-left:535px;"><img src="https://cdn.dribbble.com/users/2761722/screenshots/7138526/image.png" height="100" width="100"/></h1>
<h1 style="margin-left:450px;">SHS Flight Booking</h1>
<?php
require('d.php');
session_start();
if (isset($_POST['username'])){
$username = stripslashes($_REQUEST['username']);
$username = mysqli_real_escape_string($con,$username);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($con,$password);
$query = "SELECT * FROM users WHERE username='$username'
and password='$password'";
$result = mysqli_query($con,$query) or die(mysql_error());
$rows = mysqli_num_rows($result);
if($rows==1){
$_SESSION['username'] = $username;
header("Location: H.php");
}else{
echo "<div class='form'>
<h3>Please Sign up first!</h3>
<br/>Click here to <a class='pa'href='r.php'>Sign up</a></div>";
}
}else{
?>
<div class="form">
<h1 style="color:green;">Sign in</h1>
<form action="" method="post" name="login">
<div class="imgcontainer">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRRMMvktNrU0p6IMp3Jq79ebNeedXbdJQQQbA&usqp=CAU" class="avatar">
</div>
<input type="text" name="username" placeholder="Enter username" required /><br>
<input type="password" name="password" placeholder="Enter password" required /><br>
<input name="submit" type="submit" value="Login" />
</form>
<p>New User? <a href='r.php' class="pa"> <b>Sign up</b></a></p><br>
<a href='pass.php' style="text-decoration:none;"><b>Forgot Password?</b></a>
</div>
<?php } ?>
</body>
</html>