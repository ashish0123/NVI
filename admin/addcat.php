<?php include 'inc/header.php'?>


 
  <section class="menuhead">
	
	    <h3 class="dash">Add Category</h3>
		<?php
		    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			  $state = $fm->validation($_POST['state']);
			  $state = mysqli_real_escape_string($db->link, $state);
			    if(empty($state)){
				   echo "<span class='error'>Field must not be empty !!.</span>";
				} else {
				   $query     = "insert into tbl_category(state) values('$state')";
				   $insertcat = $db->insert($query);
				      if($insertcat){
					     echo "<span class='success'>Category Inserted Successfully !!.</span>";
					  } else {
					     echo "<span class='error'>Category Not Inserted!!.</span>";
					  }
				}
			}  
		?>
		
	     <form action="" method="post">
		   <table>
		     <tr>
			   <li class="lihead"><u>Category</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Add New Category &nbsp; :
			   <input type="text" name="state" size="30" placeholder=" enter new category here" class="sicial"/></p>
			   </li>				 
			  
			   
			  </tr>
			    <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li> 
			 
			 
		   </table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>