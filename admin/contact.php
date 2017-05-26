<?php include 'inc/header.php'?>


 
   <section class="menuhead" style=" width:81%">
	
	    <h3 class="dash">Inbox List</h3>
		
		<?php
		  if(isset($_GET['seenid'])){
		   $seenid    = $_GET['seenid'];
		   $seenquery = "update tbl_contact set status = '1' where id = '$seenid'";
		   $seendata  = $db->update($seenquery);
		       if($seendata){
				   echo "<span class='success'>Message sent into seen Inbox !!.</span>";
			   } else {
				   echo "<span class='error'>Something went wrong !!.</span>";
			   }
		   }
		?>
		 <li class="lihead"><u>Inbox</u></li>
		 
		 <li class="litext" style="float:left">
		    <p style="font-size:15px; font-weight:bold; color:#000066">Show :
			<select Name="sort" class="sicial">
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
                   <th width="2%">Serial No.</th>
                   <th width="10%">Name</th>
				   <th width="10%">Email</th>
				   <th width="4%">Whatsup</th>
				   <th width="4%">Phone</th>
                   <th width="10%">PS</th>
				   <th width="10%">Distict</th>
				   <th width="10%">State</th>
				   <th width="11%">Date</th>
				   <th width="30%">Action</th>
				</tr>
				<?php 
				  $query1    = "select * from tbl_contact where status = '0' order by id desc";
				   $inbox = $db->select($query1);
				     if($inbox){
					   $i=0;
					   while($result = $inbox->fetch_assoc()){
					     $i++;
					 
				?>
				
				<tr>
                   <td width="2%"><?php echo $i; ?></td>
                   <td width="10%"><?php echo $result['name']; ?></td>
                   <td width="10%"><?php echo $result['email']; ?></td>
				   <td width="4%"><?php echo $result['whatsup']; ?></td>
				   <td width="4%"><?php echo $result['phone']; ?></td>
				   <td width="10%"><?php echo $result['ps']; ?></td>
				   <td width="10%"><?php echo $result['distict']; ?></td>
				   <td width="10%"><?php echo $result['state']; ?></td>
				   <td width="11%"><?php echo $fm->formatDate($result['date']); ?></td>
				   <td width="30%"><a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> || 
				   <a href="replytomail.php?msgid=<?php echo $result['id']; ?>">Reply</a> || 
				   <a onclick="return confirm('Are you sure want to move this message into seen inbox !!');" href="?seenid=<?php echo $result['id']; ?>">Seen</a></td>
				</tr>
				<?php } } ?>
				
			</table>
		 </form>
 
	
	    <h3 class="dash">Seen Message</h3>
		
		<?php
		  if(isset($_GET['delid'])){
		   $delid    = $_GET['delid'];
		   $delquery = "delete from tbl_contact where id = '$delid'";
		   $deldata  = $db->delete($delquery);
		       if($deldata){
				   echo "<span class='success'>Message Deleted Successfully !!.</span>";
			   } else {
				   echo "<span class='error'>Message Not Deleted!!.</span>";
			   }
		   }
		?>
		 
		  <li class="lihead"><u>Seen Inbox</u></li>
		 <li class="litext" style="float:left">
		    <p style="font-size:15px; font-weight:bold; color:#000066">Show :
			<select Name="sort" class="sicial">
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
                   <th width="2%">Serial No.</th>
                   <th width="10%">Name</th>
				   <th width="10%">Email</th>
				   <th width="10%">Whatsup</th>
				   <th width="10%">Phone</th>
                   <th width="10%">PS</th>
				   <th width="10%">Distict</th>
				   <th width="10%">State</th>
				   <th width="11%">Date</th>
				   <th width="18%">Action</th>
				</tr>
				<?php 
				  $query2    = "select * from tbl_contact where status = '1' order by id desc";
				   $inbox2 = $db->select($query2);
				     if($inbox2){
					   $i=0;
					   while($result = $inbox2->fetch_assoc()){
					     $i++;
					 
				?>
				
				<tr>
                   <td width="2%"><?php echo $i; ?></td>
                   <td width="10%"><?php echo $result['name']; ?></td>
                   <td width="10%"><?php echo $result['email']; ?></td>
				   <td width="10%"><?php echo $result['whatsup']; ?></td>
				   <td width="10%"><?php echo $result['phone']; ?></td>
				   <td width="10%"><?php echo $result['ps']; ?></td>
				   <td width="10%"><?php echo $result['distict']; ?></td>
				   <td width="10%"><?php echo $result['state']; ?></td>
				   <td width="11%"><?php echo $fm->formatDate($result['date']); ?></td>
				   <td width="18%"><a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> ||
				                   <a onclick="return confirm('Are you sure want to delete this message !!');" href="?delid=<?php echo $result['id']; ?>">Delete</a></td>
				</tr>
				<?php } } ?>
				
			</table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>