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
			     $to       = $fm->validation($_POST['toEmail']);
		   		 $from     = $fm->validation($_POST['fromEmail']);
				 $subject  = $fm->validation($_POST['subject']);
				 $message  = $fm->validation($_POST['message']);
				 
				 $sendmail = mail($to, $subject, $message, $from);
				 if($sendmail){
				      echo "<span class='success'>Message send successfully !!</span>";
				 } else {
				      echo "<span class='error'>Something went wrong !!</span>";
				 }
             }  
		?>
		<?php
		      $query    = "select * from tbl_contact where id='$id'";
		      $contact = $db->select($query);
			  while($result = $contact->fetch_assoc()){
		?>
	     <form action="" method="post">
		   <table>
		    
			   <li class="lihead">Send Mail To : <u style="color:#006600"><?php echo $result['name']; ?></u></li>  
			   
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">To &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :
			   <input type="text" name="toEmail" size="30" readonly="" value=" <?php echo $result['email']; ?>" class="sicial"/></p>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">From &nbsp; &nbsp; &nbsp; &nbsp;:
			   <input type="text" name="fromEmail" size="30" placeholder="Please enter your Mail Address" class="sicial"/></p>
			   </li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Subject &nbsp; &nbsp;:
			   <input type="text" name="subject" size="30" placeholder="Please enter your Subject" class="sicial"/></p>
			   </li>
				
		       <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Message &nbsp;:</p>
			   <textarea id="myTextarea" name="message" ></textarea>
			   </li>
			 
			  
			    <li class="litext"><input type="submit" class="upd" name="submit" value="Send"/></li> 
			 
			 
		   </table>
		 </form>
		 <?php } ?>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>