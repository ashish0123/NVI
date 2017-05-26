
<div class="container gal">
  <div class="row">
    <div class="col-md-offset-1 col-md-3">
      <img src="images/sidegal.jpg" class="gal2" style="width:100%; height:20px; float:left; " />
    </div>	
    <div class="col-md-4 galleryheading"><p>NEWS HIGHLIGHT</p></div>
      <div class="col-md-3 ">  
	   <img src="images/sidegal.jpg" class="gal2" style="width:100%; height:20px; float:right; " />
      </div>	   
  </div>
</div>

  
   <div class="container">
 <div class="c1_content">
  <div class="row">
  
     
	     <?php
		   $query = "select * from tbl_post order by rand() limit 3"; 
		      $post  = $db->select($query);
			  if($post){
			     while($result = $post->fetch_assoc()){
				
		 ?>
    <div class="col-md-4">
	  <div class="responsive2">
        <div class="img3">
		  <a href="artical.php?id=<?php echo $result['id'];?>" style="text-decoration:none"><h3 style="color:#FFFFFF"><center><?php echo $result['title']; ?> </center></h3>
           <center><img src="admin/<?php echo $result['image']; ?>" alt="" width="90%" height="170"></center>
          <p class="desc"><?php echo $fm->textShorten($result['body'], 120); ?></p></a>
        </div>
      </div> 
    </div>	
  
      <?php } ?>
	  
  </div>
 </div>
</div>
<?php } ?>