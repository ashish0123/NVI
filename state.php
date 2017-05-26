
<?php include 'inc/header.php'; ?>




 <div class="contentsection">
    <div class="container">
	<?php
	    $per_page = 3;
	    if(isset($_GET['page'])){
		    $page = $_GET['page'];
		}else{
			$page = 1;
		}
		$start_form = ($page-1) * $per_page;
		if(isset($_GET['prev'])){
		   $prev = $_GET['prev'];
		   $start_form = $prev - 3;
		   if($start_form <= 0){
		   	$start_form = 0;
		   }
		}
		if(isset($_GET['next'])){
		   $next = $_GET['next'];
		   $start_form = $next + 3;
		}
		
		
	?>
	
	<?php 
  if(isset($_GET['category'])){
  
    $cat = $_GET['category'];
  }
?>
       <?php  
			  $query = "select * from tbl_post where state_cat='$cat' limit $start_form, $per_page";
			  $post  = $db->select($query);
			  if($post){
			     while($result = $post->fetch_assoc()){
		?>
       
          <div class="col-md-4">
	        <div class="c2_content" style="padding:10px 0 10px 0;">
		             
		    <a href="artical.php?id=<?php echo $result['id']; ?>" style="text-decoration:none;color:#202020; display:block">
			<h3><?php echo $result['title']; ?></h3>
			<p><img src="admin/<?php echo $result['image']; ?>" class="img-responsive" alt="trump" style="height:160px; width:230px; float:left; padding:0 10px 0 0; clear:right" /><?php echo $fm->textShorten($result['body'], 300); ?><span class="myBut">&#8250;&#8250;&#187;</span></p></a>
			<img src="admin/<?php echo $result['ad_image']; ?>" class="img-responsive shadow1" width="" alt="trump" style="height:257px" />		
			      
			</div>
	      </div>
	   <?php  } ?><!--end while loop-->
	   <!--start pagination-->
	 <?php
	   $query1   = "select * from tbl_post where state_cat='$cat'";
	   $result1 = $db->select($query1);
	   $total_rows = mysqli_num_rows($result1);
	   $total_pages = ceil($total_rows/$per_page); 
	   ?>
	 <nav class='text-center'>
         <ul class='pagination' >
          <li class='prev'>
            <a href='?category=<?php echo $cat;?>&prev=<?php echo $start_form;?>' aria-label='Previous'>
             <span aria-hidden='true'>&laquo;</span>
            </a>
          </li>
		<?php
		  for($i=1; $i <= $total_pages; $i++){
	   echo "<li><a style='color:red; font-weight:bold' href='state.php?category=".$cat."&page=".$i."'>".$i."</a></li>";
          }
         ?>
       <li class='next'>
           <a href='?category=<?php echo $cat;?>&next=<?php echo $start_form;?>' aria-label='Next'>
           <span aria-hidden='true'>&raquo;</span>
           </a>
        </li>
   </ul>
</nav>
	   
	   <!--end pagination-->
    </div>
 </div>
          
			
			<?php 
			 } else { 
			  echo "<span style='color:#ccc; text-align:center; font-size:24px;'>The Page is Underconstruction .!! </span>"; 
			  }
			?>   


			
		
   
 




<?php include 'inc/footer.php'; ?>