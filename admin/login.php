<?php
  include '../lib/Session.php';
  Session::checkLogin();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/format.php'; ?>




<?php
$db = new Database();
$fm = new format();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>NEWS VIRAL iNDiA</title>

	<!-- Google Fonts -->
	<link href='#' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate1.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style1.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	
<style>
.error{
text-align:center;
padding:10px 0;
color:red;
font-size:20px;
z-index:1}
</style>
</head>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">NEWS VIRAL <span>iNDiA</span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
		
		    <form action="login.php" method="post">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<label for="username">Username</label>
			<br/>
			<input type="text" name="username"  id="username">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" name="password"   id="password">
			<br/>
			<button type="submit">Sign In</button>
			<br/>
			<a href="forgetpass.php"><p class="small">Forgot your password?</p></a>
			</form>
			
			<?php
		   if($_SERVER['REQUEST_METHOD'] == 'POST'){
		      $username = $fm->validation($_POST['username']);
			  $password = $fm->validation(md5($_POST['password']));
			  
			  $username = mysqli_real_escape_string($db->link, $username);
			  $password = mysqli_real_escape_string($db->link, $password);
			  
			  $query  = "select * from tbl_user where username='$username' and password='$password'";
			  $result = $db->select($query);
			  if($result != false){
			     //$value = mysqli_fetch_array($result);
				 $value = $result->fetch_assoc();
					   Session::set("login", true);
					   Session::set("username", $value['username']);
					   Session::set("userId", $value['id']);
					   Session::set("userRole", $value['role']);
					   header("Location:index.php");
					} else {
					    echo"<span class='error'>Username and Password does not match !!.</span>";
					}
			
				 
				 
		   }
		
		?>
			
		</div>
	</div>
	
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>