<?php include 'inc/header.php'?>


 
  <section class="menuhead">
	
	    <h3 class="dash">Post</h3>
		   <?php
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			 
			  $permited = array('jpg', 'jpeg', 'png', 'gif');
			  $file_name= $_FILES['image']['name'];
			  $file_size= $_FILES['image']['size'];
			  $file_temp= $_FILES['image']['tmp_name'];
			  $div      = explode('.',$file_name);
			  $file_ext = strtolower(end($div));
			  $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			  
			  $uploade_image = "upload/".$unique_image;

			    if($file_name == ""){
				  echo "<script>alert('Image must not be empty!!.')</script>";
				} elseif($file_size>1048567){
				  echo "<span class='error'>Image should be less than 1MB!!.</span>";
				} elseif(in_array($file_ext, $permited) === false ){
				  echo "<span class='error'>You can upload only:-".implode(', ', $permited)."!!.</span>";
				} else {
				  move_uploaded_file($file_temp, $uploade_image);
				}
			  
			 if($_SERVER['REQUEST_METHOD'] == 'POST'){
			 
			  $title    = mysqli_real_escape_string($db->link, $_POST['title']);
			  $category = mysqli_real_escape_string($db->link, $_POST['category']);
			  $tags     = mysqli_real_escape_string($db->link, $_POST['tags']);
			  $body     = mysqli_real_escape_string($db->link, $_POST['body']);
			  $role    = mysqli_real_escape_string($db->link, $_POST['role']);
			 
			  $permited1 = array('jpg', 'jpeg', 'png', 'gif');
			  $file_name1= $_FILES['addimage']['name'];
			  $file_size1= $_FILES['addimage']['size'];
			  $file_temp1= $_FILES['addimage']['tmp_name'];
			  $div1      = explode('.',$file_name1);
			  $file_ext1 = strtolower(end($div1));
			  $unique_image1 = substr(md5(time()), 0, 12).'.'.$file_ext1;
			  
			  $uploade_image1 = "upload/".$unique_image1;
               if($file_name == ""){
				  echo "<script>alert('Adv. Image must not be empty!!.')</script>";
				} elseif($file_size1>1048567){
				  echo "<span class='error'>Image should be less than 1MB!!.</span>";
				} elseif(in_array($file_ext1, $permited1) === false){
				  echo "<span class='error'>You can upload only:-".implode(', ', $permited1)."!!.</span>";
				} else {
				  move_uploaded_file($file_temp1, $uploade_image1);
				}
				 if($title == "" || $category == "" || $body == "" || $file_name == "" || $file_name1 == "" || $tags == "" || $role == "" ){
				   echo "<span class='error'>Field must not be empty!!.</span>"; 
				   } else {
				  $query = "insert into tbl_post(state_cat,title,body,image,tags,ad_image,role) values('$category','$title','$body','$uploade_image','$tags','$uploade_image1','$role')";
				  $inserted_row = $db->insert($query);
				     if($inserted_row){
					   echo "<span class='success'>New Post Inserted!!.</span>";
					 } else {
					   echo "<span class='error'>New Post Not Inserted!!.</span>";
					 }
			  
			} } }
		   ?>
	      <form action="addpost.php" method="post" enctype="multipart/form-data">
		   <table>
		     <tr>
			   <li class="lihead"><u>Update New Post</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Title &nbsp;&nbsp; :</p>
			   <textarea name="title" cols="30" rows="3"  class="sicial"></textarea>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Category &nbsp;&nbsp; :
			   <select name="category" class="sicial">
			     <option value="-1"  selected>select..</option>
				 <?php
				    $query    = "select * from tbl_category";
					$category = $db->select($query);
					if($category){
					    while($result = $category->fetch_assoc()){
				 ?>
			     <option value="<?php echo $result['state'] ?>"><?php echo $result['state'] ?></option>
			     <?php }} ?>
			   </select></p>
			   </li>
			   
			   <li class="litext"> 
			   <span style="font-size:18px; font-weight:bold; color:#000066; display:inline">Image :
			   <input type="file" name="image" class="sicial"/></span>
			   </li>
			   
			    <li class="litext"> 
			   <span style="font-size:18px; font-weight:bold; color:#000066; display:inline">Adv. Image :
			   <input type="file" name="addimage" class="sicial"/></span>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Keywords &nbsp;&nbsp; :</p>
			   <textarea name="tags" cols="30" rows="2"  class="sicial"></textarea>
			   </li>	
			   
			   <li class="litext">
			   <p style="font-size:18px; font-weight:bold; color:#000066">Post &nbsp;&nbsp; :</p>
			   <textarea id="myTextarea" name="body"></textarea></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">
			   <input type="hidden" readonly name="role" class="sicial" value="<?php echo Session::get('userRole'); ?>"></p>
			   </li>
			   
               <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li>    
			 </tr>
			 
		   </table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>
 
 
 
 			 
			  
 
 
