<?php include 'inc/header.php'?>
<?php
    
     if(!isset($_GET['viewpostid']) || $_GET['viewpostid'] == NULL){
        echo "<script>window.location = 'viewpost.php';</script>";
		// header("Location: viewcat.php");
	 } else {
	    $postid = $_GET['viewpostid'];
	 }
?>

 
  <section class="menuhead">
	
	    <h3 class="dash">View Post</h3>
		   <?php
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			echo "<script>window.location = 'viewpost.php';</script>";
			}
		   ?>
		   <?php
		        $query = "select * from tbl_post where id='$postid'";
				$getpost = $db->select($query);
				//if($getpost){
				while($postresult = $getpost->fetch_assoc()){
		   ?>
	      <form action="" method="post" enctype="multipart/form-data">
		   <table>
		     <tr>
			   <li class="lihead"><u>View here</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Title &nbsp;&nbsp; :</p>
			   <textarea readonly cols="30" rows="3" class="sicial"><?php echo $postresult['title'] ?></textarea>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Category &nbsp;&nbsp; :
			   <select class="sicial" readonly>
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
			   </span>
			   </li>
			   
			    <li class="litext"> 
			   <span style="font-size:18px; font-weight:bold; color:#000066; display:inline">Adv. Image :
			   <img src="<?php echo $postresult['ad_image'] ?>" height="80px" width="150px" />
			   </span>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Keywords &nbsp;&nbsp; :</p>
			   <textarea readonly cols="30" rows="2"  class="sicial"><?php echo $postresult['tags'] ?></textarea>
			   </li>
			   
			   <li class="litext">
			   <p style="font-size:18px; font-weight:bold; color:#000066">Post &nbsp;&nbsp; :</p>
			   <textarea id="myTextarea" ><?php echo $postresult['body'] ?></textarea></li>
			   
               <li class="litext"><input type="submit" class="upd" name="submit" value="OK"/></li>    
			 </tr>
			 
		   </table>
		 </form>
		 <?php } ?>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>