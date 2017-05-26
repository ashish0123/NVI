<?php include 'inc/header.php'?>
<?php
      $userrole = Session::get('userRole');
     if(!isset($_GET['editpostid']) || $_GET['editpostid'] == NULL){
        echo "<script>window.location = 'viewpost.php';</script>";
		// header("Location: viewcat.php");
	 } else {
	    $postid = $_GET['editpostid'];
	 }
?>

 
  <section class="menuhead">
	
	    <h3 class="dash">Update Post</h3>
		   <?php
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
			  $category = mysqli_real_escape_string($db->link, $_POST['category']);
			  $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
			  $body     = mysqli_real_escape_string($db->link, $_POST['body']);
			  $role     = mysqli_real_escape_string($db->link, $_POST['role']);
	
				 
			   $permited1 = array('jpg', 'jpeg', 'png', 'gif', '');
			  $file_name1= $_FILES['addimage']['name'];
			  $file_size1= $_FILES['addimage']['size'];
			  $file_temp1= $_FILES['addimage']['tmp_name'];
			  $div1      = explode('.',$file_name1);
			  $file_ext1 = strtolower(end($div1));
			  $unique_image1 = substr(md5(time()), 0, 12).'.'.$file_ext1;
			  
			  $uploade_image1 = "upload/".$unique_image1;
                 if($file_size1>1048567){
				  echo "<span class='error'>Image should be less than 1MB!!.</span>";
				} elseif(in_array($file_ext1, $permited1) === false){
				  echo "<span class='error'>You can upload only:-".implode(', ', $permited1)."!!.</span>";
				} else {
				  move_uploaded_file($file_temp1, $uploade_image1);
				}
						 
			
				
				
				
				 if($title == "" || $category == "" || $body == "" || $tags == "" || $role == ""){
				   echo "<span class='error'>Field must not be empty!!.</span>"; 
				    
				   } 
				 elseif($file_name=="" && $file_name1==""){
				
				 $query = "update tbl_post set state_cat='$category',title='$title',body='$body',tags='$tags' where id = '$postid'";
				  $updated_row = $db->update($query);
				     if($updated_row){
					   echo "<span class='success'>Post Updated!!.</span>";
					 } else {
					   echo "<span class='error'>Post Not Updated!!.</span>";
					 }
					} 
				 elseif(empty($file_name) && !empty($file_name1)){
				
				 $query = "update tbl_post set state_cat='$category',title='$title',body='$body',tags='$tags',ad_image='$uploade_image1',role='$role' where id = '$postid'";
				  $updated_row = $db->update($query);
				     if($updated_row){
					   echo "<span class='success'>2nd Post Updated!!.</span>";
					 } else {
					   echo "<span class='error'>Post Not Updated!!.</span>";
					 }
				 }
				elseif(!empty($file_name) && empty($file_name1)){
				
				 $query = "update tbl_post set state_cat='$category',title='$title',body='$body',tags='$tags',image='$uploade_image',role='$role' where id = '$postid'";
				  $updated_row = $db->update($query);
				     if($updated_row){
					   echo "<span class='success'>2nd Post Updated!!.</span>";
					 } else {
					   echo "<span class='error'>Post Not Updated!!.</span>";
					 }
					
			    } else {
				     $query = "update tbl_post set state_cat='$category',title='$title',body='$body',image='$uploade_image',tags='$tags',ad_image='$uploade_image1',role='$role' where id = '$postid'";
				  $updated_row = $db->update($query);
				     if($updated_row){
					   echo "<span class='success'>Post Updated!!.</span>";
					 } else {
					   echo "<span class='error'>Post Not Updated!!.</span>";
					 }
				   }
			           
			} 
			
		   ?>
		   <?php
		        $query = "select * from tbl_post where id='$postid' order by id desc";
				$getpost = $db->select($query);
				//if($getpost){
				while($postresult = $getpost->fetch_assoc()){
		   ?>
	      <form action="" method="post" enctype="multipart/form-data">
		   <table>
		     <tr>
			   <li class="lihead"><u>Update here</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Title &nbsp;&nbsp; :</p>
			   <textarea name="title" cols="30" rows="3" class="sicial"><?php echo $postresult['title'] ?></textarea>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Category &nbsp;&nbsp; :
			   <select name="category" class="sicial">
			     <option value="-1" >select..</option>
				 <?php
				    $query    = "select * from tbl_category";
					$category = $db->select($query);
					if($category){
					    while($result = $category->fetch_assoc()){
				 ?>
			     <option  <?php if($postresult['state_cat']==$result['state']){ ?>
				        selected="selected"
				 
				<?php } ?> value="<?php echo $result['state'] ?>"><?php echo $result['state'] ?></option>
			     <?php }} ?>
			   </select></p>
			   </li>
			   
			   <li class="litext"> 
			   <span style="font-size:18px; font-weight:bold; color:#000066; display:inline">Image :
			   <img src="<?php echo $postresult['image'] ?>" height="80px" width="150px" />
			   <input type="file" name="image" class="sicial"/></span>
			   </li>
			   
			    <li class="litext"> 
			   <span style="font-size:18px; font-weight:bold; color:#000066; display:inline">Adv. Image :
			   <img src="<?php echo $postresult['ad_image'] ?>" height="80px" width="150px" />
			   <input type="file" name="addimage" class="sicial"/></span>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Keywords &nbsp;&nbsp; :</p>
			   <textarea name="tags" cols="30" rows="2"  class="sicial"><?php echo $postresult['tags'] ?></textarea>
			   </li>
			   
			   <li class="litext">
			   <p style="font-size:18px; font-weight:bold; color:#000066">Post &nbsp;&nbsp; :</p>
			   <textarea id="myTextarea" name="body"><?php echo $postresult['body'] ?></textarea></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">
			   <input type="hidden" readonly name="role" class="sicial" value="<?php echo Session::get('userRole'); ?>"></p>
			   </li>
			   
               <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li>    
			 </tr>
			 
		   </table>
		 </form>
		 <?php } ?>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>
 
 
 
 			 
			  
 
 
