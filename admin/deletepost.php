<?php
  include '../lib/Session.php';
  Session::checkSession();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/format.php'; ?>
<?php
$db = new Database();
?>
<?php
     if(!isset($_GET['delpostid']) || $_GET['delpostid'] == NULL){
        echo "<script>window.location = 'viewpost.php';</script>";
		// header("Location: viewcat.php");
	 } else {
	    $postid  = $_GET['delpostid'];
		$query   = "select * from tbl_post where id = '$postid'";
		$getData = $db->select($query);
		if($getData){
		   while($delimg = $getData->fetch_assoc()){
		   $dellink = $delimg['image'];
		   unlink($dellink);
		   $dellink = $delimg['ad_image'];
		   unlink($dellink);
		   }
		}
		$delquery = "delete from tbl_post where id = '$postid'";
		$delData = $db->delete($delquery);
		if($delData){
		   echo "<script>alert('Post Deleted Successfully !!')</script>";
		   echo "<script>window.location = 'viewpost.php';</script>";
		} else {
		   echo "<script>alert('Post Not Deleted !!')</script>";
		   echo "<script>window.location = 'viewpost.php';</script>";
		}
	 }
?>

 
 
 
 			 
			  
 
 
