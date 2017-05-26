<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/format.php'; ?>
<?php
$db = new Database();
$fm = new format();
?>
<!DOCTYPE html>
<html>
<head>
<?php     /*for category */  
          if(isset($_GET['category'])){
		     $pagetitle = $_GET['category'];
		  
			  $querytitle = "select * from tbl_category where state = '$pagetitle'";
			  $posttitle  = $db->select($querytitle);
			  if($posttitle){
			     while($result = $posttitle->fetch_assoc()){  ?>
		    
        <title><?php echo $result ['state']; ?>-<?php echo TITLE; ?></title>
		
           <?php }}} 
		   /*for article */  
		   elseif(isset($_GET['id'])){
		     $pagetitle = $_GET['id'];
		  
			  $querytitle = "select * from tbl_post where id = '$pagetitle'";
			  $posttitle  = $db->select($querytitle);
			  if($posttitle){
			     while($result = $posttitle->fetch_assoc()){  ?>
		    
        <title><?php echo $result ['title']; ?>-<?php echo TITLE; ?></title>
           <?php }}} 
		     /*for vission/mission */  
		   elseif(isset($_GET['vmid'])){
		     $pagetitle = $_GET['vmid'];
		  
			  $querytitle = "select * from tbl_about where id = '$pagetitle'";
			  $posttitle  = $db->select($querytitle);
			  if($posttitle){
			     while($result = $posttitle->fetch_assoc()){  ?>
		    
        <title><?php echo $result ['title']; ?>-<?php echo TITLE; ?></title>
           <?php }}} 
		      /*for home */  
		   else { ?>
        <title><?php echo "Home"; ?>-<?php echo TITLE; ?></title>
              <?php } ?>
<meta charset="utf-8">
           <meta name="description" content="News website">
  <?php /* FOR DEFINE KEYWORDS */
        if(isset($_GET['id'])){
		     $keywordid = $_GET['id'];
		  
			  $querykeywords = "select * from tbl_post where id = '$keywordid'";
			  $keywordlist  = $db->select($querykeywords);
			  if($keywordlist){
			     while($result = $keywordlist->fetch_assoc()){  ?>
		    <meta name="keyword" content="<?php echo $result['tags']; ?>">
           <?php }}} 
		      /* FOR CONSTANT KEYWORDS */  
		   else { ?>
            <meta name="keyword" content="<?php echo KEYWORDS; ?>">
              <?php } ?>
			    
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
   <script src="js/rem.min.js"></script> 
   <script src="js/nav.jquery.min.js"></script>

  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/whatsapp.css" />
  <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/defaults.min.css">
    <link rel="stylesheet" href="css/nav-core.min.css">
    <link rel="stylesheet" href="css/nav-layout.min.css">
</head>
<body>
<a href="#" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>


<div id="myModal1" class="modal fade">
    <div class="modal-dialog" style="top:25%; width:350px;">
        
				<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="font-size:23px;">&#10006;</button>  
                 </div>
                <img src="images/news-social-icon.jpg" width="350px" style="position:fixed;" height="300px"/>
                  <div class="modal-footer"></div>  
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="container modal1">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close1">&times;</span>
      <p><b>Get news on whatsapp/Email</b></p>
    </div>
    <div class="modal-body">
	
		  <?php
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			   $name = $fm->validation($_POST['name']);
			   $email = $fm->validation($_POST['email']);
			   $whatsup = $fm->validation($_POST['whatsup']);
			   $phone = $fm->validation($_POST['phone']);
			   $ps = $fm->validation($_POST['ps']);
			   $distict = $fm->validation($_POST['distict']);
			   $state = $fm->validation($_POST['state']);
			   
			   $name    = mysqli_real_escape_string($db->link, $name);
			    $email    = mysqli_real_escape_string($db->link, $email);
				 $whatsup    = mysqli_real_escape_string($db->link, $whatsup);
				  $phone    = mysqli_real_escape_string($db->link, $phone);
				   $ps    = mysqli_real_escape_string($db->link, $ps);
				    $distict    = mysqli_real_escape_string($db->link, $distict);
					 $state    = mysqli_real_escape_string($db->link, $state);
					 
	           $error="";
			  if(empty($name)){
			    $error="Name must not be empty";
			  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			    $error="Invalide email id";
			  }elseif(empty($whatsup)){
			    $error="Whatsup no. must not be empty";
			  }elseif(empty($phone)){
			    $error="Phone no. must not be empty";
			  }elseif(empty($ps)){
			    $error="Police station must not be empty";
			  }elseif(empty($distict)){
			    $error="Distict must not be empty";
			  }elseif(empty($state)){
			    $error="State must not be empty";
			  }else{
			   $querycnt = "insert into tbl_contact(name,email,whatsup,phone,ps,distict,state) values('$name','$email','$whatsup','$phone','$ps','$distict','$state')";
				  $inserted_row = $db->insert($querycnt);
				     if($inserted_row){
					   $msg = "Thanks for giving your time, we will touch you soon !!";
					 } else {
					   $msg = "Please again fill the form !!";
					 }
			  
			  }
				   
	}  
	?>
	
	
      <form action="#" method="post">
    <?php  
	  if(isset($error)){
	   echo "<script>alert('$error')</script><br>";
	   }
	   if(isset($msg)){
	   echo "<script>alert('$msg')</script><br>";
	   }
	?>
  <b>Name:</b><br>
  <input type="text" name="name" placeholder="name" size="28" class="design">
  <br>
  <b>Email:</b><br>
  <input type="text" name="email" placeholder="email" size="28" class="design"><br>
  <b>Whatsapp Number:</b><br>
  <input type="text" name="whatsup" placeholder="whatsapp number" size="28" class="design"><br>
   <b>Mobile Number:</b><br>
  <input type="text" name="phone" placeholder="mobile number" size="28" class="design"><br>
   <b>Police Station:</b><br>
  <input type="text" name="ps" placeholder="police station" size="28" class="design"><br>
   <b>Distict</b><br>
  <input type="text" name="distict" placeholder="distict" size="28" class="design" ><br>
   <b>State</b><br>
  <input type="text" name="state" placeholder="state" size="28" class="design"><br>
  <br>
  <center><input type="submit" value="Submit" style="background:#00FF33; font-weight:bold; border:2px solid #00CC99;"></center>
</form> 
    </div>
     <div class="modal-footer"></div>

      
    
 
    </div>
</div>



<a href="#" style="color:#FFFFFF" class="nav-button">Menu</a>
<nav class="nav">
    <ul>
        <li><a href="index.php"><i class="fa fa-home" aria-hidden="true" style="font-size:25px;" ></i></a></li>
            <?php  
			  $querycat = "select * from tbl_category";
			  $postcat  = $db->select($querycat);
			  if($postcat){
			     while($resultcat = $postcat->fetch_assoc()){
		    ?>
        <li class="nav-submen"><a href="state.php?category=<?php echo $resultcat['state']; ?>"><?php echo $resultcat['state']; ?></a> 
		        
		                  
		     <ul>
			    <?php  
			  $st=$resultcat['state'];
			  $querycity = "select city from tbl_city where state_cat = '$st'";
			  $postcity  = $db->select($querycity);
			  if($postcity){
			     
			     while($resultcity = $postcity->fetch_assoc()){
		    ?>
			    <li><a href="state.php?category=<?php echo $resultcat['state']; ?>"><?php echo $st; ?></a></li>
                <li class="nav-submenu"><a href="state.php?category=<?php echo $resultcat['state']; ?>"><?php echo $resultcity['city']; ?></a>
				  
				<?php $st = ""; $ct= $resultcity['city'];  ?>
                     <ul>
					      <?php  
                           
			              $queryarea = "select area from tbl_area where city_cat = '$ct'";
			              $postarea  = $db->select($queryarea);
			              if($postarea){
			              while($resultarea = $postarea->fetch_assoc()){
					     ?>
                        <li><a href="state.php?category=<?php echo $resultcat['state']; ?>"><?php echo $resultarea['area']; ?></a></li>
						 
				       <?php }}  ?>
                    </ul>
					<?php }}?>
                </li>
			 </ul>
		</li>
		 <?php } } ?>
    </ul>
</nav>
<a href="#" style="color:#FFFFFF" class="nav-close">Close Menu</a>

<div class="container-fluid" style="background-color:#FFFF66; ">
 <div class="row">
   <div class="md-col-2" style="float:left;">
      <abbr title="www.newviralindia.com"><img src="images/logo.jpg" class="img-responsive" width="100%" alt="logo" /></abbr>
   </div>
   
   
   <div class="md-col-6" style="float:right; padding-right:20px;">
     <h4 class="fu">Follow Us</h4><br/>
	<p style="margin-top:-27px; cursor:pointer;">
	<?php
	    
		      $query    = "select * from tbl_social where id='1'";
		      $social = $db->select($query);
			  while($result = $social->fetch_assoc()){
	?>
	<a href="<?php echo $result['fb']; ?>"><i class="fa fa-facebook-square" aria-hidden="true" style="font-size:25px;" ></i></a>&nbsp; &nbsp;  
	<a href="<?php echo $result['tw']; ?>"><i class="fa fa-twitter-square" aria-hidden="true" style="font-size:25px;"></i></a>&nbsp; &nbsp;
	<a href="<?php echo $result['gp']; ?>"><i class="fa fa-google-plus-square" aria-hidden="true" style="font-size:25px;"></i></a>&nbsp; &nbsp; 
	<a href="<?php echo $result['pn']; ?>"><i class="fa fa-pinterest-square" aria-hidden="true" style="font-size:25px;"></i></a>&nbsp; &nbsp;
	<a href="<?php echo $result['ln']; ?>"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size:25px;"></i></a>&nbsp; &nbsp;
	
	<?php } ?>
	<a id="myBtn"><i class="fa fa-envelope-square" aria-hidden="true" style="font-size:25px;"></i>&nbsp; &nbsp;<i class="fa fa-whatsapp" aria-hidden="true" style="font-size:25px;"></i></a></p>
    <!--<a id="myBtn1"><i class="fa fa-whatsapp" aria-hidden="true" style="font-size:25px;"></i></a>-->
   </div>
   
      <div class="md-col-4" id="app">
        <h4 class="doa">Download our app</h4><br/>
	    <p style="margin:-33px 0 0 15px;;">
		<?php
	    
		      $query    = "select * from tbl_app where id='1'";
		      $app = $db->select($query);
			  while($result = $app->fetch_assoc()){
	    ?>
	     <a href="<?php echo $result['android']; ?>" class="btn btn-social-icon btn-android"><span class="fa fa-android" style="font-size:23px;"></span></a> 
	     <a href="<?php echo $result['window']; ?>" class="btn btn-social-icon btn-windows"><span class="fa fa-windows" style="font-size:23px;"></span></a>
	     <a href="<?php echo $result['apple']; ?>" class="btn btn-social-icon btn-apple"><span class="fa fa-apple" style="font-size:23px;"></span></a>
		 <?php } ?>
		</p>
   </div>

   
 </div>  
</div>   
 
 
 
    <div class="breakingnews"> 
	   <div class="newsheading clear" >
	    <?php
		   $querymarq = "select * from tbl_marquee"; 
		      $postmarq  = $db->select($querymarq);
			  if($postmarq){
			     while($resultmarq = $postmarq->fetch_assoc()){
				
		 ?>
	      
			 <marquee class="marq" ><?php echo $resultmarq['body']; ?></marquee><div class="right-arrow">
		     <h4>Headlines</h4></div>
			 <?php }} ?>
	  </div>
</div>
    