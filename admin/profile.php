<?php include 'inc/header.php'?>
<?php
    $userid = Session::get('userId');
	$userrole = Session::get('userRole');
?>

 
  <section class="menuhead">
	
	    <h3 class="dash">User Profile</h3>
		   <?php
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			 
			 
			  $name     = mysqli_real_escape_string($db->link, $_POST['name']);
			  $username = mysqli_real_escape_string($db->link, $_POST['username']);
			  $email    = mysqli_real_escape_string($db->link, $_POST['email']);
			  $detail   = mysqli_real_escape_string($db->link, $_POST['detail']);
	
				 
			  
				
				 if($name == "" || $username == "" || $email == "" || $detail == ""){
				   echo "<span class='error'>Field must not be empty!!.</span>"; 
				   
				 } else {
				
			$query = "update tbl_user set name='$name',username='$username',email='$email',detail='$detail' where id = '$userid' and role='$userrole'";
		      $updated_row = $db->update($query);
				     if($updated_row){
					   echo "<span class='success'>Profile Updated!!.</span>";
					 } else {
					   echo "<span class='error'>Profile Not Updated!!.</span>";
					 }
					
					}
				       
     			} 
			
		   ?>
		   <?php
		        $query = "select * from tbl_user where id='$userid' and role='$userrole'";
				$getuser = $db->select($query);
				if($getuser){
				while($result = $getuser->fetch_assoc()){
		   ?>
	      <form action="" method="post">
		   <table>
		     <tr>
			   <li class="lihead"><u>Update here</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Name &nbsp;&nbsp; :
			   <input type="text" name="name" class="sicial" value="<?php echo $result['name'] ?>"></p>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">UserName &nbsp;&nbsp; :
			   <input type="text" name="username" class="sicial" value="<?php echo $result['username'] ?>"></p>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Email &nbsp;&nbsp; :
			   <input type="text" name="email" size="30" class="sicial" value="<?php echo $result['email'] ?>"></p>
			   </li>
			   
			   <li class="litext">
			   <p style="font-size:18px; font-weight:bold; color:#000066">Details &nbsp;&nbsp; :</p>
			   <textarea id="myTextarea" name="detail"><?php echo $result['detail'] ?></textarea></li>
			   
               <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li>    
			 </tr>
			 
		   </table>
		 </form>
		 <?php } } ?>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>
 
 
 
 			 
			  
 
 
