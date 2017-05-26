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
		
		    <form action="" method="post">
			<div class="box-header">
				<h2>Password Recovery</h2>
			</div>
			<label for="username">Enter Your Email</label>
			<br/>
			<input type="text" placeholder=" Enter Valid Email " name="email"  id="username">
			<br/>
			
			<button type="submit">Recover</button>
			<br/>
			<a href="login.php"><p class="small">Log In Here</p></a>
			</form>
			
			<?php
		   if($_SERVER['REQUEST_METHOD'] == 'POST'){
		      $email = $fm->validation($_POST['email']);
			 
			  $email = mysqli_real_escape_string($db->link, $email);
			  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			     echo "<span class='error'>Invalide email id</span>";
			  } else {
			   
			        $mailquery    = "select * from tbl_user where email = '$email' limit 1";
				    $mailcheck    = $db->select($mailquery);
				    if($mailcheck != false){
				      while($value = $mailcheck->fetch_assoc()){
					     $userid = $value['id'];
						 $username = $value['username'];
					  }
					  $text    = substr($email, 0, 3);
					  $rand    = rand(10000, 99999);
					  $newpass = "$text$rand";
					  $password= md5($newpass);
					  
					  $updatequery       = "update tbl_user set password = '$password' where id = '$userid'";
				      $updated_row = $db->update($updatequery);
					  
					  $to = "$email";
					  $from = "newsviralindia@info.com";
					  $headers = "From: $from\n";
					  $headers .= 'MIME-Version: 1.0' ."\r\n";
					  $headers .= 'Content-type: text/html; charset=iso-8859-1' ."\r\n";
					  $subject  = "Your Recover Password";
					  $message  = "your username is ".$username."and password is".$newpass."Please website to login";
					  
					  $sendmail = mail($to, $subject, $message, $headers);
					     if($sendmail){
						    echo"<span class='error'>Please check your email for new password !!.</span>";
						   } else {
						    echo"<span class='error'>Email Not Send || Try again || !!.</span>";
						   }
				    } else {
					    echo"<span class='error'>Email Not Exist !!.</span>";
					}
                 }// end else
				 
				 
		   }// main if
		
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