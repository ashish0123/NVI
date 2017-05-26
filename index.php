<?php include 'inc/header.php'; ?>




   <div class="contentsection">
     <div class="container">
	 
       <div class="row">
	   
           <div class="col-md-4" style="height:600px;">   
		         <img src="images/nexus_frame.png" width="" height="auto" id="frame" style="position:absolute;"/>
		       <div id="bn1" >
			   <a href="#"><p class="viral">NEWS VIRAL iNDiA</p></a>
			   <a href="http://snappy.appypie.com/html5/nvi-news" style="cursor:pointer;"><img src="images/Mobile Windows (1).jpg" id="mobig" width="100%"/></a>
			   </div>
	       </div>
	  
	 
	 <div class="col-md-8 ">
	   <div class="row">
	   <?php
		   $query = "select * from tbl_about limit 2"; 
		      $post  = $db->select($query);
			  if($post){
			     while($result = $post->fetch_assoc()){
				
		 ?>
		 <div class="col-md-6">
			<div class="c1_content" id="down">
			<a href="about.php?vmid=<?php echo $result['id']; ?>" style="text-decoration:none;color:#202020; display:block">
			<h3 style="font-size:30px"><?php echo $result['title']; ?></h3>
			<p><img src="admin/<?php echo $result['image']; ?>" class="img-responsive"  alt="trump" style="height:150px; width:350px; float:left; padding:0 10px 0 0; clear:right"/><?php echo $fm->textShorten($result['body'], 750); ?><span class="myBut">&#8250;&#8250;&#187;</span></p></a>
			</div>
		</div>
			<?php }} ?>  
	   
		</div>
	 </div>  
	
   </div>
		
		 <?php
		   $query1 = "select * from tbl_post limit 3"; 
		      $post1  = $db->select($query1);
			  if($post1){
			     while($result1 = $post1->fetch_assoc()){
				
		 ?>
		 <div class="col-md-4">
			<div class="c1_content">
			<h3><?php echo $result1['title']; ?></h3>
			<p><img src="admin/<?php echo $result1['image']; ?>" class="img-responsive"  alt="trump" width="350px" style="height:200px; float:left; padding:0 10px 0 0;"/><?php echo $fm->textShorten($result1['body'], 250); ?></p>
			 
			</div>
		</div> 
		<?php }} ?> 
		 
		
	 </div>
	
  </div>
</div>
<?php include 'inc/footer.php'; ?>