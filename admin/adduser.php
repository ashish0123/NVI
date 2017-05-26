<?php include 'inc/header.php'?>
<?php if(Session::get('userRole') !== '1'){
    echo "<script>window.location = 'index.php';</script>";
	}
?>

 
  <section class="menuhead">
	
	    <h3 class="dash">Add New User</h3>
		<?php
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			  $username = $fm->validation($_POST['username']);
			  $email = $fm->validation($_POST['email']);
			  $password = $fm->validation(md5($_POST['password']));
			  $role = $fm->validation($_POST['role']);
			  
			  $username = mysqli_real_escape_string($db->link, $username);
			  $email = mysqli_real_escape_string($db->link, $email);
			  $password = mysqli_real_escape_string($db->link, $password);
			  $role = mysqli_real_escape_string($db->link, $role);
			  
			    if(empty($username) || empty($password) || empty($role) || empty($email)){
				   echo "<span class='error'>Field must not be empty !!.</span>";
				} else {
				    $mailquery    = "select * from tbl_user where email = '$email' limit 1";
				    $mailcheck = $db->select($mailquery);
				    if($mailcheck != false){
				       echo "<span class='error'>Email Already Exits !!.</span>";
				           }
				    else {
				      $query     = "insert into tbl_user(username,email,password,role) values('$username','$email','$password','$role')";
				     $insertuser = $db->insert($query);
				       if($insertuser){
					     echo "<span class='success'>User Created Successfully !!.</span>";
					   } else {
					      echo "<span class='error'>User Not Created !!.</span>";
					          }
				       }
				  }
			}  
		?>
		
	     <form action="" method="post">
		   <table>
		     <tr>
			   <li class="lihead"><u>Add User</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Username &nbsp; :
			   <input type="text" name="username" size="30" placeholder=" enter new username here" class="sicial"/></p>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :
			   <input type="text" name="email" size="30" placeholder=" enter valid email address" class="sicial"/></p>
			   </li>				 
			  
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Password &nbsp; :
			   <input type="text" name="password" size="30" placeholder=" enter password  here" class="sicial"/></p>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">User Role &nbsp; :
			   <select name="role" class="sicial">
			     <option>Select User Role</option>
				 <option value="1">Admin</option>
				 <option value="2">Author</option>
			   </select></p>
			   </li>
			   
			  </tr>
			    <li class="litext"><input type="submit" class="upd" name="submit" value="Create"/></li> 
			 
			 
		   </table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>