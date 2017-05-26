<?php include 'inc/header.php'?>


 
  <section class="menuhead">
	
	    <h3 class="dash">Social Media</h3>
		 <?php
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			    $fb = $fm->validation($_POST['fb']);
				$tw = $fm->validation($_POST['tw']);
				$gp = $fm->validation($_POST['gp']);
				$pn = $fm->validation($_POST['pn']);
				$ln = $fm->validation($_POST['ln']);
			
			    $fb    = mysqli_real_escape_string($db->link, $fb);
			    $tw     = mysqli_real_escape_string($db->link, $tw);
				$gp    = mysqli_real_escape_string($db->link, $gp);
			    $pn     = mysqli_real_escape_string($db->link, $pn);
				$ln     = mysqli_real_escape_string($db->link, $ln);
				
				 if($fb == "" || $tw == "" || $gp == "" || $pn == "" || $ln == ""){
				   echo "<span class='error'>Field must not be empty!!.</span>"; 
				 
				 } else {
				  $query = "update tbl_social set fb='$fb',tw='$tw',gp='$gp',pn='$pn',ln='$ln' where id = '1'";
				  $updated_row = $db->update($query);
				     if($updated_row){
					   echo "<span class='success'> Social Media Updated!!</span>";
					 } else {
					   echo "<span class='error'> Social Media Not Updated!!.</span>";
					 }
				   }
				   
				 }  
		?>
		<?php
		      $query    = "select * from tbl_social where id='1'";
		      $social = $db->select($query);
			  while($result = $social->fetch_assoc()){
		?>
	     <form action="" method="post">
		   <table>
		     <tr>
			   <li class="lihead"><u>Update social media</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Facebook &nbsp;:
			   <input type="text" name="fb" size="30" value="<?php echo $result['fb']; ?>" class="sicial"/></p>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Twitter &nbsp; &nbsp; &nbsp; :
			   <input type="text" name="tw" size="30" value="<?php echo $result['tw']; ?>" class="sicial"/></p>
			   </li>
				
			   <li class="litext"> <p style="font-size:18px; font-weight:bold; color:#000066">Google+ &nbsp; &nbsp;: 
			   <input type="text" name="gp" size="30" value="<?php echo $result['gp']; ?>" class="sicial"/></p>
			   </li>
				 
			   <li class="litext"> <p style="font-size:18px; font-weight:bold; color:#000066">Pinterest &nbsp;&nbsp;:
			   <input type="text" name="pn" size="30" value="<?php echo $result['pn']; ?>" class="sicial"/></p>
			   </li>
				  
			   <li class="litext"> <p style="font-size:18px; font-weight:bold; color:#000066">Linkedin &nbsp; &nbsp;:
			   <input type="text" name="ln" size="30" value="<?php echo $result['ln']; ?>" class="sicial"/></p>
			   </li>
			   
			  </tr>
			    <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li> 
			 
			 
		   </table>
		 </form>
		 <?php } ?>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>