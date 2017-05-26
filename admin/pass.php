<?php include 'inc/header.php'?>

<?php
	$userrole = Session::get('userRole');
?>
 
  <section class="menuhead">
	
	    <h3 class="dash">Update Password</h3>
		<?php
		      if($_SERVER['REQUEST_METHOD'] == 'POST'){
			     $oldpassword = $fm->validation(md5($_POST['oldpassword']));
			     $newpassword = $fm->validation(md5($_POST['newpassword']));
			     $rnewpassword = $fm->validation(md5($_POST['rnewpassword']));
			  
			     $oldpassword = mysqli_real_escape_string($db->link, $oldpassword);
                 $newpassword = mysqli_real_escape_string($db->link, $newpassword);
			     $rnewpassword = mysqli_real_escape_string($db->link, $rnewpassword);
				 
				   $query = "select password from tbl_user where role='$userrole'";
				   $getpass = $db->select($query);
				    if($getpass){
				     $result = $getpass->fetch_assoc();
					 if($oldpassword != $result['password']){
					     echo "<span class='error'>Your Old Password does not match with Database !!.</span>";
					 } else {
			  
			         if($newpassword != $rnewpassword){
			           echo"<span class='error'>Your New Password and Re-Type password does not match !!.</span>";
			         } else {
			  
			           $query  = "update tbl_user set password='$newpassword' where role='$userrole' and password='$oldpassword'";
			             $updated_row = $db->update($query);
				          if($updated_row){
					        echo "<span class='success'>Password Updated!!.</span>";
					      } else {
					        echo "<span class='error'>Your Old Password does not match with Database !!.</span>";
					      }
			         }//end else
				   }
				 } 
					 
		}//end main if			 
		?>
	     <form action="" method="post">
		   <table>
		     <tr>
			   <li class="lihead"><u>Update Admin Password</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Old Password &nbsp; :
			   <input type="text" name="oldpassword" size="30" placeholder=" enter old password" class="sicial"/></p>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">New Password :
			   <input type="text" name="newpassword" size="30" placeholder=" enter new password" class="sicial"/></p>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Re-Type New Password :
			   <input type="text" name="rnewpassword" size="30" placeholder=" re-type new password" class="sicial"/></p>
			   </li>
				
	   
			  </tr>
			    <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li> 
			 
			 
		   </table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>