<?php include 'inc/header.php'; ?>

<?php 
  if(!isset($_GET['vmid']) || $_GET['vmid']==NULL){
    echo "no page found";
  } else {
    $id = $_GET['vmid'];
  }
?>







<div class="container">
    <div class="col-md-9">
      <div class="c2_content">
	  
	     <?php
		   $query = "select * from tbl_about where id=$id"; 
		      $post  = $db->select($query);
			  if($post){
			     while($result = $post->fetch_assoc()){
				
		 ?>
        <h3 style="font-size:38px; margin:0; line-height:35px; padding-top:15px;"> <?php echo $result['title']; ?> </h3>
        <p style="font-size:19px; line-height:30px; text-align:justify; color:#333333;  padding-top:7px;">
		<img src="admin/<?php echo $result['image']; ?>"  width="450px" class="img-responsive" alt="alcohol banned" style="float:left; padding: 7px 13px 0 0; height:50%" />&nbsp; <?php echo $result['body']; ?> </br></br></br>
<span style="font-size:25px; color:#999999">Share with : &nbsp; &nbsp; </span><p style="cursor:pointer">
<a><i class="fa fa-facebook" aria-hidden="true" style="font-size:40px;" ></i><span style="font-size:15px; text-decoration:none; cursor:pointer;"></span></i></a>&nbsp; &nbsp; &nbsp; 
<a><i class="fa fa-twitter" aria-hidden="true" style="font-size:40px;"></i><span style="font-size:15px; text-decoration:none; cursor:pointer;"></span></i></a>&nbsp; &nbsp; &nbsp; 
<a><i class="fa fa-google-plus" aria-hidden="true" style="font-size:40px;"></i><span style="font-size:15px; text-decoration:none; cursor:pointer;"></span></i></a>&nbsp; &nbsp; &nbsp
<a><i class="fa fa-pinterest" aria-hidden="true" style="font-size:40px;"></i><span style="font-size:15px; text-decoration:none; cursor:pointer;"></span></i></a>&nbsp; &nbsp; &nbsp; 
<a><i class="fa fa-linkedin" aria-hidden="true" style="font-size:40px;"></i><span style="font-size:15px; text-decoration:none; cursor:pointer;"></span></i></a>&nbsp; &nbsp; &nbsp;
<a><i class="fa fa-envelope" aria-hidden="true" style="font-size:40px;"></i><span style="font-size:15px; text-decoration:none; cursor:pointer;"></span></i></a>&nbsp; &nbsp; &nbsp;
<a><i class="fa fa-whatsapp" aria-hidden="true" style="font-size:40px;"></i><span style="font-size:15px; text-decoration:none; cursor:pointer;"></span></i></a></p>

                        	<?php ?>     

        </div>	
      </div>
	  
<div class="col-md-3">
<div class="c2_content">
<center><h2 style="color:#FF0000; "><u>Latest news</u></h2></center>
<?php


$query1 = "select * from tbl_post order by id desc limit 5"; 
		      $post1  = $db->select($query1);
			  if($post1){
			     while($result1 = $post1->fetch_assoc()){

?>
<a href="artical.php?id=<?php echo $result1['id'];?>" style="cursor:pointer; text-decoration:none;">
<img src="admin/<?php echo $result1['image']; ?>" width="100%" height="auto" style="padding:5px 0 15px 0">
<h3 style="font-size:14px; line-height:17px"><?php echo $result1['title']; ?></h3></a>

<?php }?> 
</div>
</div>
	<?php }}}?>   
    </div>




<?php include 'inc/footer.php'; ?>