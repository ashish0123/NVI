
<?php include 'inc/news_highlight.php'; ?>
<?php include 'inc/subscribe.php'; ?>



 <div class="container">
   <div class="navbottom menubottom" style="background-color:#535933">
	  <div class="row">
         <div class="col-md-12">
		   <ul>
		     <li style="padding-left:28px;"><a href="index.php">Home</a></li>
		     <li><a href="#">City</a></li>
		     <li><a href="#">India</a></li>
		     <li><a href="#">World</a></li>
		     <li><a href="#">Bussiness</a></li>
		     <li><a href="#">Tech</a></li>
		     <li><a href="#">Sports</a></li>
		     <li><a href="#">Cricket</a></li>
			 <li><a href="#">Entertainment</a></li>
			 <li><a href="#">Life & Style</a></li>
			 <li><a href="#">Travel</a></li>
			 <li><a href="#">Woman</a></li>
			 <li><a href="#">Photo</a></li>
			 <li><a href="#">Video</a></li>
		  </ul>
		</div>
	  </div>
   </div>
</div>
  
</div>

<script type='text/javascript'>
/*nav button*/
/*function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
*/
/*bottom to top*/
$(document).ready(function(){ 
	$(window).scroll(function(){ 
		if ($(this).scrollTop() > 100) { 
			$('#scroll').fadeIn(); 
		} else { 
			$('#scroll').fadeOut(); 
		} 
	}); 
	$('#scroll').click(function(){ 
		$("html, body").animate({ scrollTop: 0 }, 600); 
		return false; 
	}); 
});

/*fixed breaking news*/
 $(document).ready(function() {
  $(window).scroll(function () {
       
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 106) {
      $('#nav_bar').addClass('navbar-fixed');
    }
    if ($(window).scrollTop() < 107) {
      $('#nav_bar').removeClass('navbar-fixed');
    }
  });
});
//whatsup
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
// window load popup image
$(document).ready(function(){
		$("#myModal1").modal('show');
	});
	
// disable right click//	
	
	$(document).ready(function () {
    //Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
});

//for nav

 $('.nav').nav();
</script>

</body>
</html>