<?php include 'inc/header.php'?>

 
  <section class="menuhead">
	
	    <h3 class="dash">Mobile App</h3>
		<?php
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			    $android = $fm->validation($_POST['android']);
				$window = $fm->validation($_POST['window']);
				$apple = $fm->validation($_POST['apple']);
				
			
			    $android    = mysqli_real_escape_string($db->link, $android);
			    $window     = mysqli_real_escape_string($db->link, $window);
				$apple    = mysqli_real_escape_string($db->link, $apple);
			   
				
				 if($android == "" || $window == "" || $apple == "" ){
				   echo "<span class='error'>Field must not be empty!!.</span>"; 
				 
				 } else {
				  $query = "update tbl_app set android='$android',window='$window',apple='$apple' where id = '1'";
				  $updated_row = $db->update($query);
				     if($updated_row){
					   echo "<span class='success'> App Link Updated Successfully!!</span>";
					 } else {
					   echo "<span class='error'> App Link Not Updated!!.</span>";
					 }
				   }
				   
				 }  
		?>
		<?php
		      $query    = "select * from tbl_app where id='1'";
		      $app = $db->select($query);
			  while($result = $app->fetch_assoc()){
		?>
	     <form action="" method="post">
		   <table>
		     <tr>
			   <li class="lihead"><u>Update Mobile App</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Android &nbsp; :
			   <input type="text" name="android" size="30" value="<?php echo $result['android']; ?>" class="sicial"/></p>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Windows :
			   <input type="text" name="window" size="30" value="<?php echo $result['window']; ?>" class="sicial"/></p>
			   </li>
				
			   <li class="litext"> <p style="font-size:18px; font-weight:bold; color:#000066">iOS &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: 
			   <input type="text" name="apple" size="30" value="<?php echo $result['apple']; ?>" class="sicial"/></p>
			   </li>
				 
			  
			   
			  </tr>
			    <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li> 
			 
			 
		   </table>
		 </form>
		 <?php } ?>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>