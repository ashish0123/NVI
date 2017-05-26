<?php include 'inc/header.php'?>


 
   <section class="menuhead">
	
	    <h3 class="dash">View Headline</h3>
		
		
		 <li class="lihead"><u>Headline</u></li>
		 
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
                   <th width="10%">Serial No.</th>
                   <th width="50%">Headline</th>
                   <th width="40%">Action</th>
                </tr>
				
				<?php 
				   $query    = "select * from tbl_marquee";
				   $headline = $db->select($query);
				     if($headline){
					   $i=0;
					   while($result = $headline->fetch_assoc()){
					     $i++;
					 
				?>
				
				<tr>
                   <td width="10%"><?php echo $i; ?></td>
                   <td width="80%"><?php echo $fm->textShorten($result['body'],300); ?></td>
                   <td width="10%"><a href="edithead.php?headid=<?php echo $result['id']; ?>">Edit</a></td>
				</tr>
				<?php } } ?>
				
			</table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>