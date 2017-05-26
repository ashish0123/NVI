<?php include 'inc/header.php'?>
<?php
     if(!isset($_GET['vmid']) || $_GET['vmid'] == NULL){
        echo "<script>window.location = 'viewVM.php';</script>";
		// header("Location: viewcat.php");
	 } else {
	    $id = $_GET['vmid'];
	 }
?>
 
 
 
 
<section class="menuhead">
	
	    <h3 class="dash">Update Vission / Mission</h3>
		
		 <?php
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$id = $_GET['vmid'];
			  $permited = array('jpg', 'jpeg', 'png', 'gif', '');
			  $file_name= $_FILES['image']['name'];
			  $file_size= $_FILES['image']['size'];
			  $file_temp= $_FILES['image']['tmp_name'];
			  $div      = explode('.',$file_name);
			  $file_ext = strtolower(end($div));
			  $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			  
			  $uploade_image = "upload/".$unique_image;

			      if($file_size>1048567){
				  echo "<span class='error'>Image should be less than 1MB!!.</span>";
				  
				} elseif(in_array($file_ext, $permited) === false ){
				  echo "<span class='error'>You can upload only:-".implode(', ', $permited)."!!.</span>";
				} else {
				  move_uploaded_file($file_temp, $uploade_image);
				}
				$title    = mysqli_real_escape_string($db->link, $_POST['title']);
			    $body     = mysqli_real_escape_string($db->link, $_POST['body']);
				
				 if($title == "" || $body == ""){
				   echo "<span class='error'>Field must not be empty!!.</span>"; 
				 }
				 
				 elseif($file_name==""){
				
				 $query = "update tbl_about set title='$title',body='$body' where title = '$id'";
				  $updated_row = $db->update($query);
				     if($updated_row){
					   echo "<span class='success'> $id Updated!!.</span>";
					 } else {
					   echo "<span class='error'>$id Not Updated!!.</span>";
					 }
				} else {
				
				 
		              $query1   = "select * from tbl_about where title = '$id'";
		              $getData = $db->select($query1);
		              if($getData){
		                while($delimg = $getData->fetch_assoc()){
		                $dellink = $delimg['image'];
		                unlink($dellink);
					    }
					  }
		  
				  $query = "update tbl_about set title='$title',image='$uploade_image',body='$body' where title = '$id'";
				  $updated_row = $db->update($query);
				     if($updated_row){
					   echo "<span class='success'> $id Updated!!</span>";
					 } else {
					   echo "<span class='error'>$id Not Updated!!.</span>";
					 }
				   }
		}	  
		?>
		
		
		<?php
		      $query    = "select * from tbl_about where title = '$id'";
		      $vm = $db->select($query);
			  while($result = $vm->fetch_assoc()){
		?>
	     <form action="" method="post" enctype="multipart/form-data">
		   <table>
		     <tr>
			   <li class="lihead"><u>Vission / Mission</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Title &nbsp;&nbsp; :
			   <input type="text" name="title" size="30"value="<?php echo $result['title']; ?>" class="sicial"/></p>
			   </li>
			   
			   <li class="litext"> 
			   <span style="font-size:18px; font-weight:bold; color:#000066; display:inline">Image :
			    <img src="<?php echo $result['image'] ?>" height="80px" width="150px" />
			   <input type="file" name="image" class="sicial"/></span>
			   </li>
			   
			   <li class="litext">
			   <p style="font-size:18px; font-weight:bold; color:#000066">Post &nbsp;&nbsp; :</p>
			   <textarea id="myTextarea" name="body" ><?php echo $result['body'] ?></textarea></li>
			   
               <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li>    
			 </tr>
			 
		   </table>
		 </form>
		 <?php } ?>
  </section>
 
 
 <?php include 'inc/footer.php'?>