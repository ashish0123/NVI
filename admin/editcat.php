<?php include 'inc/header.php'?>

<?php
     if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
        echo "<script>window.location = 'viewcat.php';</script>";
		// header("Location: viewcat.php");
	 } else {
	    $id = $_GET['catid'];
	 }
?>
 
  <section class="menuhead">
	
	    <h3 class="dash">Update Category</h3>
		<?php
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			  $state = $fm->validation($_POST['state']);
			  $state = mysqli_real_escape_string($db->link, $state);
			    if(empty($state)){
				   echo "<span class='error'>Field must not be empty !!.</span>";
				} else {
				   $query     = "update tbl_category set state = '$state' where id = '$id'";
				   $updated_row = $db->update($query);
				      if($updated_row){
					     echo "<span class='success'>Category Updated Successfully !!.</span>";
					  } else {
					     echo "<span class='error'>Category Not Updated!!.</span>";
					  }
				}
			}  
		?>
		
		<?php
		      $query    = "select * from tbl_category where id = '$id' order by id desc";
		      $category = $db->select($query);
			  while($result = $category->fetch_assoc()){
		?>
		
	     <form action="" method="post">
		   <table>
		     <tr>
			   <li class="lihead"><u>Category</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Update Category &nbsp; :
			   <input type="text" name="state" size="30" value="<?php echo $result['state']; ?>" class="sicial"/></p>
			   </li>				 
			  
			   
			  </tr>
			    <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li> 
			 
			 
		   </table>
		 </form>
		 <?php } ?>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>