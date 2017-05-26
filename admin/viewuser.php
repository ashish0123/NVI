<?php include 'inc/header.php'?>

<?php
     if(!isset($_GET['userid']) || $_GET['userid'] == NULL){
        echo "<script>window.location = 'userlist.php';</script>";
		// header("Location: viewcat.php");
	 } else {
	    $id = $_GET['userid'];
	 }
?>
  <section class="menuhead">
	
	    <h3 class="dash">Profile View</h3>
		   <?php
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
               echo "<script>window.location = 'userlist.php';</script>";
				       
     			} 
			
		   ?>
		   <?php
		        $query = "select * from tbl_user where id='$id'";
				$getuser = $db->select($query);
				if($getuser){
				while($result = $getuser->fetch_assoc()){
		   ?>
	      <form action="" method="post">
		   <table>
		     <tr>
			   <li class="lihead"><u>User Details</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Name &nbsp;&nbsp; :
			   <input type="text" readonly class="sicial" value="<?php echo $result['name'] ?>"></p>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">UserName &nbsp;&nbsp; :
			   <input type="text" readonly class="sicial" value="<?php echo $result['username'] ?>"></p>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Email &nbsp;&nbsp; :
			   <input type="text" readonly size="30" class="sicial" value="<?php echo $result['email'] ?>"></p>
			   </li>
			   
			   <li class="litext">
			   <p style="font-size:18px; font-weight:bold; color:#000066">Details &nbsp;&nbsp; :</p>
			   <textarea id="myTextarea" ><?php echo $result['detail'] ?></textarea></li>
			   
               <li class="litext"><input type="submit" class="upd" name="submit" value="OK"/></li>    
			 </tr>
			 
		   </table>
		 </form>
		 <?php } } ?>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>
 
 
 
 			 
			  
 
 
