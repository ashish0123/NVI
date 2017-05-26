<?php
  include '../lib/Session.php';
  Session::checkSession();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/format.php'; ?>

<?php
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: Sat,26 Jul 1997 05:00:00 GMT');
header('Cache-Control: max-age=2592000');
?>



<?php
$db = new Database();
$fm = new format();
?>


<!DOCTYPE HTML>
<html>
	<head>
<title>News viral iNDiA</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "#myTextarea",
	forced_root_block:"",
	width:650,
	height:400
 });
</script>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="css/sidebar-menu.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid ">
   <div class="row header">
   
     <div class="sm-col-6" style="float:left;">
      <span><img src="images/logo.png" class="img-responsive" width="90%" alt="logo"/></span>
	  <h3>NEWS VIRAL iNDiA</h3>
     </div>
	 
	 <?php
	    if(isset($_GET['action']) && isset($_GET['action']) == "logout"){
		   Session::destroy();
		}
	 ?>
	 
	 <div class="sm-col-6" style="float:right;">
	 <?php
	            $userrole = Session::get('userRole');
		        $query = "select username from tbl_user where role='$userrole'";
				$getuser = $db->select($query);
				if($getuser){
				while($result = $getuser->fetch_assoc()){
		   ?>

	  <p> <i class="fa fa-user" aria-hidden="true">&nbsp;&nbsp; Hello <?php echo $result['username']; ?> || <a href="?action=logout" style="text-decoration:none"><i class="fa fa-power-off" aria-hidden="true" style="font-size:20px;" >&nbsp;&nbsp;Logout</i></a></i></p>  
	  <?php }} ?>
	 </div>
	 
   </div>
</div>

<div class="container-fluid" style="border-radius:0">
  <nav class="nav">
    <ul>
        <li><a href="index.php"><i class="fa fa-dashboard" aria-hidden="true" style="font-size:20px;" >&nbsp;&nbsp;Dashboard</i></a></li>
		<li><a href="profile.php"><i class="fa fa-edit" aria-hidden="true" style="font-size:20px;" >&nbsp;&nbsp;User Profile</i></a></li>
		<?php if(Session::get('userRole')=='1'){?>
		<li><a href="adduser.php"><i class="fa fa-user-plus" aria-hidden="true" style="font-size:20px;" >&nbsp;&nbsp;Add User</i></a></li>
		<?php } ?>
		<li><a href="userlist.php"><i class="fa fa-list" aria-hidden="true" style="font-size:20px;" >&nbsp;&nbsp;User List</i></a></li>
	    <li><a href="pass.php"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:20px;">&nbsp;&nbsp;Change Password</i></a></li>
		<?php if(Session::get('userRole')=='1'){?>
	    <li><a href="contact.php"><i class="fa fa-inbox" aria-hidden="true" style="font-size:20px;" >&nbsp;&nbsp;Inbox
		
		    <?php
			    $query    = "select * from tbl_contact where status = '0' order by id desc";
				   $inbox = $db->select($query);
				     if($inbox){
					 $count = mysqli_num_rows($inbox);
					 echo "(<p style='color:green; display:inline';>".$count."</p>)";
					   } else {
					 echo "(0)"; 
					   }
			?>
		</i></a></li>
		<?php } ?>
	    <li><a href="http://localhost/Basic_Php/NVI/news%20viral%20india/index.php" target="_blank"><i class="fa fa-desktop" aria-hidden="true" style="font-size:20px;" >&nbsp;&nbsp;Visit Website</i></a></li>
	</ul>
  </nav>	
</div>
<?php include 'inc/sidemenu.php'?>