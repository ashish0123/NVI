<?php include 'inc/header.php'?>


 
   <section class="menuhead">
	
	    <h3 class="dash">User List</h3>
		
		<?php
		   if(isset($_GET['deluser'])){
		   $delid    = $_GET['deluser'];
		   $delquery = "delete from tbl_user where id = '$delid'";
		   $deldata  = $db->delete($delquery);
		       if($deldata){
				   echo "<span class='success'>User Deleted Successfully !!.</span>";
			   } else {
				   echo "<span class='error'>User Not Deleted!!.</span>";
			   }
		   }
		?>
		 <li class="lihead"><u>User</u></li>
		 
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
                   <th width="5%">Serial No.</th>
				   <th width="15%">Name</th>
				   <th width="20%">UserName</th>
				   <th width="20%">Email</th>
				   <th width="20%">Details</th>
				   <th width="5%">Role</th>
                   <th width="15%">Action</th>
                </tr>
				
				<?php 
				   $query    = "select * from tbl_user";
				   $userlist = $db->select($query);
				     if($userlist){
					   $i=0;
					   while($result = $userlist->fetch_assoc()){
					     $i++;
					 
				?>
				
				<tr>
                   <td><?php echo $i; ?></td>
                   <td><?php echo $result['name']; ?></td>
				   <td><?php echo $result['username']; ?></td>
				   <td><?php echo $result['email']; ?></td>
				   <td><?php echo $fm->textShorten($result['detail'],100); ?></td>
				   <td><?php 
				       if($result['role'] == '1'){
				       echo 'admin'; 
				     } else {
				       echo 'author';
					   }
				   ?></td>
                   <td><a href="viewuser.php?userid=<?php echo $result['id']; ?>">View</a>
				   <?php if(Session::get('userRole')=='1'){?>
				  || <a onclick="return confirm('Are you sure want to Delete !!');" href="?deluser=<?php echo $result['id']; ?>">Delete</a>
				   <?php }?>
				   </td>
				</tr>
				<?php } } ?>
				
			</table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>