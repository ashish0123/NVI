<?php include 'inc/header.php'?>
<?php
if(!isset($_GET['msgid']) || $_GET['msgid']==NULL){
   echo "<script>window.location = 'contact.php';</script>";
		// header("Location: viewcat.php");
	 } else {
	    $id = $_GET['msgid'];
	 }

?>

 
  <section class="menuhead">
	
	    <h3 class="dash">View Message Detail</h3>
		 <?php
		   if($_SERVER['REQUEST_METHOD'] == 'POST'){
			     echo "<script>window.location = 'contact.php';</script>";
                }  
		?>
		<?php
		      $query    = "select * from tbl_contact where id='$id'";
		      $contact = $db->select($query);
			  while($result = $contact->fetch_assoc()){
		?>
	     <form action="" method="post">
		   <table>
		    
			   <li class="lihead">Message from : <u><?php echo $result['name']; ?></u></li>  
			  <tr>  
			   <td><li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Name &nbsp;:</p>
			   <input type="text" name="fb" size="30" readonly="" value="<?php echo $result['name']; ?>" class="sicial"/>
			   </li></td>
			   
			   <td><li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Emai address &nbsp;:</p>
			   <input type="text" name="tw" size="30" readonly="" value="<?php echo $result['email']; ?>" class="sicial"/>
			   </li></td></tr>
				
			  <tr><td> <li class="litext"> <p style="font-size:18px; font-weight:bold; color:#000066">Whatsapp number &nbsp;:</p> 
			   <input type="text" name="gp" size="30" readonly="" value="<?php echo $result['whatsup']; ?>" class="sicial"/>
			   </li></td>
				 
			   <td><li class="litext"> <p style="font-size:18px; font-weight:bold; color:#000066">Phone number &nbsp;:</p>
			   <input type="text" name="pn" size="30" readonly="" value="<?php echo $result['phone']; ?>" class="sicial"/>
			   </li></td></tr>
				  
			   <tr><td> <li class="litext"> <p style="font-size:18px; font-weight:bold; color:#000066">Police station &nbsp;:</p>
			   <input type="text" name="ln" size="30" readonly="" value="<?php echo $result['ps']; ?>" class="sicial"/>
			   </li></td>
			   
			   <td><li class="litext"> <p style="font-size:18px; font-weight:bold; color:#000066">Distict &nbsp;:</p>
			   <input type="text" name="ln" size="30" readonly="" value="<?php echo $result['distict']; ?>" class="sicial"/>
			   </li></td></tr>
			   
			   <tr><td> <li class="litext"> <p style="font-size:18px; font-weight:bold; color:#000066">Date &nbsp;:</p>
			   <input type="text" name="ln" size="30" readonly="" value="<?php echo $fm->formatDate($result['date']); ?>" class="sicial"/>
			   </li></td></tr>
			  
			   
			 
			  <tr><td>
			    <li class="litext"><input type="submit" class="upd" name="submit" value="OK"/></li> 
			 </td></tr>
			 
		   </table>
		 </form>
		 <?php } ?>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>