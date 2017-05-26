<?php include 'inc/header.php'?>


 
   <section class="menuhead">
	
	    <h3 class="dash">View Category</h3>
		
		<?php
		   if(isset($_GET['delcat'])){
		   $delid    = $_GET['delcat'];
		   $delquery = "delete from tbl_category where id = '$delid'";
		   $deldata  = $db->delete($delquery);
		       if($deldata){
				   echo "<span class='success'>Category Deleted Successfully !!.</span>";
			   } else {
				   echo "<span class='error'>Category Not Deleted!!.</span>";
			   }
		   }
		?>
		 <li class="lihead"><u>Category List</u></li>
		 
		 <li class="litext" style="float:left">
		    <p style="font-size:15px; font-weight:bold; color:#000066">Show :
			<select Name="sort">
			<option value="-1" selected>select..</option>
			<option value="ten">10</option>
			<option value="twenty">20</option>
			<option value="thirty">30</option>
			<option value="fourty">40</option>
			</select> Entries</p>
		 </li>
		 
		 <li class="litext" style="float:right"> 
			   <p style="font-size:17px; font-weight:bold; padding-right:15px; height:22px; color:#000066">Search &nbsp;: &nbsp; 
			   <input type="text" name="fb" size="18" placeholder=" search category here..." class="sicial"/></p>
		 </li>
		 
		 
	     <form class="myform">
		   <table class="tbl">

                <tr>
                   <th width="10%">Serial No.</th>
                   <th width="50%">Category Name</th>
                   <th width="40%">Action</th>
                </tr>
				
				<?php 
				   $query    = "select * from tbl_category order by id desc";
				   $category = $db->select($query);
				     if($category){
					   $i=0;
					   while($result = $category->fetch_assoc()){
					     $i++;
					 
				?>
				
				<tr>
                   <td><?php echo $i; ?></td>
                   <td><?php echo $result['state']; ?></td>
                   <td><a href="editcat.php?catid=<?php echo $result['id']; ?>">Edit</a> || <a onclick="return confirm('Are you sure want to Delete !!');" href="?delcat=<?php echo $result['id']; ?>">Delete</a></td>
				</tr>
				<?php } } ?>
				
			</table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>