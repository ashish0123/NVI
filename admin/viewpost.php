<?php include 'inc/header.php'?>


  <section class="menuhead">
	
	    <h3 class="dash">View Post</h3>
		 <li class="lihead"><u>Post List</u></li>
		 
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
                   <th width="2%">No.</th>
				   <th width="18%">Title</th>
                   <th width="25%">Description</th>
                   <th width="6%">Category</th>
				   <th width="6%">Image</th>
				   <th width="6%">Add_Image</th>
				   <th width="10%">Keywords</th>
				   <th width="10%">Date</th>
				   <th width="17%">Action</th>
                </tr>
				<?php 
				
				    $query = "select * from tbl_post order by date desc";
					$post  = $db->select($query);
					if($post){
					$i=0;
					while($result = $post->fetch_assoc()){
					$i++;
				?>
				<tr>
                   <td><?php echo $i; ?></td>
				   <td><?php echo $fm->textShorten($result['title'],50); ?></td>
				   <td><?php echo $fm->textShorten($result['body'],150); ?></td>
				   <td><?php echo $result['state_cat']; ?></td>
				   <td><img src="<?php echo $result['image']; ?>" height="40px" width="60px" /></td>
				   <td><img src="<?php echo $result['ad_image']; ?>" height="40px" width="60px" /></td>
				   <td><?php echo $result['tags']; ?></td>
				   <td><?php echo $fm->formatDate($result['date']); ?></td>
                   <td>
				   <a href="viewpst.php?viewpostid=<?php echo $result['id']; ?>">View</a> 
				   <?php if(Session::get('userRole') == $result['role'] || Session::get('userRole') == '1'){?>
				  || <a href="editpost.php?editpostid=<?php echo $result['id'];?>&sid=<?php echo Session::get('userRole');?>">Edit</a> || 
				   <a onclick="return confirm('Are you sure want to Delete !!');" href="deletepost.php?delpostid=<?php echo $result['id']; ?>">Delete</a>                  <?php } ?>
				   </td>
				</tr>
			<?php }} ?>
                   
				
			</table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>