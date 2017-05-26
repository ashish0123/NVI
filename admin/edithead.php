<?php include 'inc/header.php'?>
<?php
     if(!isset($_GET['headid']) || $_GET['headid'] == NULL){
        echo "<script>window.location = 'viewhead.php';</script>";
		// header("Location: viewcat.php");
	 } else {
	    $id = $_GET['headid'];
	 }
?>
 
 
 
 
<section class="menuhead">
	
	    <h3 class="dash">Headline news</h3>
		
		<?php
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			 // $body = $fm->validation($_POST['body']);
			  $body = mysqli_real_escape_string($db->link,  $_POST['body']);
			    if(empty($body)){
				   echo "<span class='error'>Field must not be empty !!.</span>";
				} else {
				   $query     = "update tbl_marquee set body = '$body' where id = '$id'";
				   $updated_row = $db->update($query);
				      if($updated_row){
					     echo "<span class='success'>Headline Updated Successfully !!.</span>";
					  } else {
					     echo "<span class='error'>Headline Not Updated!!.</span>";
					  }
				}
			}  
		?>
		
		
		<?php
		      $query    = "select * from tbl_marquee where id = '$id'";
		      $headline = $db->select($query);
			  while($result = $headline->fetch_assoc()){
		?>
	     <form action="" method="post">
		   <table>
		     <tr>
			   <li class="lihead"><u>Update headline news</u></li>
			   
			   <li class="litext">
			   <p style="font-size:18px; font-weight:bold; color:#000066">Headline &nbsp;&nbsp; :</p>
			   <textarea id="myTextarea" name="body" ><?php echo $result['body']; ?></textarea>
			   </li>
			   
               <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li>    
			 </tr>
			 
		   </table>
		 </form>
		 <?php } ?>
  </section>
 
 
 <?php include 'inc/footer.php'?>