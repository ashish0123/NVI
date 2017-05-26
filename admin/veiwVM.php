<?php include 'inc/header.php'?>


 
   <section class="menuhead">
	
	    <h3 class="dash">View Vission / Mission</h3>
		
		
		 <li class="lihead"><u>Vission / Mission</u></li>
		 
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
                   <th width="10%">Title</th>
				   <th width="40%">Description</th>
				   <th width="30%">Image</th>
                   <th width="10%">Action</th>
                </tr>
				
				<?php 
				   $query    = "select * from tbl_about";
				   $vm = $db->select($query);
				     if($vm){
					   $i=0;
					   while($result = $vm->fetch_assoc()){
					     $i++;
					 
				?>
				
				<tr>
                   <td><?php echo $i; ?></td>
				   <td><?php echo $result['title']; ?></td>
				   <td><?php echo $fm->textShorten($result['body'],200); ?></td>
				   <td><img src="<?php echo $result['image']; ?>" height="150px" width="200px" /></td>
                   <td><a href="editvm.php?vmid=<?php echo $result['title']; ?>">Edit</a></td>
				</tr>
				<?php } } ?>
				
			</table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>