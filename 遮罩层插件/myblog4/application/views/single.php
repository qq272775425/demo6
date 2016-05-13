<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Portfolio a Personal Category Flat Bootstarp responsive Website Template| Single :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Portfolio  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<base href="<?php echo site_url(); ?>">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
</script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Raleway:200,400,300,600,500,900,700,100,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
<!---//webfonts--->
</head>
<body>	
	<!-- container -->
		<!-- header -->
		<div id="home" class="single_header">
			<div class="container">
				<!-- -->
				<div class="nav-icon">
					 <a href="#" class="right_bt" id="activator"><span> </span> </a>
				</div>
				 <div class="box" id="box">
					 <div class="box_content">        					                         
						<div class="box_content_center">
						 	<div class="form_content">
								<div class="menu_box_list">
									<ul>
										<li><a href="index.html">home</a></li>
										<li><a class="scroll" href="#about">About</a></li>
										<li><a class="scroll" href="#services">Services</a></li>
										<li><a class="scroll" href="#port">portfolio</a></li>
										<li><a class="scroll" href="#blog">Blog</a></li>
										<li><a href="contact.html">Contact</a></li>
										<div class="clear"> </div>
									</ul>
								</div>
								<a class="boxclose" id="boxclose"> <span> </span></a>
							</div>                                  
						</div> 	
					</div> 
				</div>    
				<!-- script-for-box -->
				 <script type="text/javascript">
					var $ = jQuery.noConflict();
						$(function() {
							$('#activator').click(function(){
								$('#box').animate({'top':'0px'},500);
							});
							$('#boxclose').click(function(){
							$('#box').animate({'top':'-700px'},500);
							});
						});
						$(document).ready(function(){
						//Hide (Collapse) the toggle containers on load
						$(".toggle_container").hide(); 
						//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
						$(".trigger").click(function(){
							$(this).toggleClass("active").next().slideToggle("slow");
								return false; //Prevent the browser jump to the link anchor
						});
											
					});
				</script>
				<!-- script-for-box -->
				<!----->
				
			</div>
		</div>
		<!-- /header -->
		<div class="single">
		   <div class="container">
	 	   	<img src="<?php echo $blog -> photo;?>" class="img-responsive" alt=""/>
		    <h3><?php echo $blog -> title;?>&nbsp;&nbsp;by&nbsp;<?php echo $blog -> admin_name;?></h3>
	 	   	<p><?php echo $blog -> content;?></p>
	 	    <ul class="comment-list">

				<?php
					foreach($blog -> comments as $comment){

				?>

						<li><img src="images/avatar.png" class="img-responsive" alt="">
		  		           <div class="desc">
		  		        	<p> <a href="#" title="Posts by admin" rel="author"><?php echo $comment -> comm_name;?></a></p>
		  		           	<p><?php echo $comment -> add_time;?></p>
						   </div>
		  		           <div class="clearfix"></div>
		  		         </li>
				<?php
					}
				?>

		  	</ul>
		  	<div class="comments-area">
		  		        	<h3>Add New Comment</h3>
							<form action="welcome/post_comment" method="post">
								<input type="hidden" name="blog_id" value="<?php echo $this -> uri -> segment(3);?>">
								<p>
									<label>Name</label>
									<span>*</span>
									<input type="text" name="comm_name" value="">
								</p>
								<p>
									<label>Email</label>
									<span>*</span>
									<input type="text" name="email" value="">
								</p>
								<p>
									<label>Website</label>
									<input type="text" name="website" value="">
								</p>
								<p>
									<label>Subject</label>
									<span>*</span>
									<textarea name="subject"></textarea>
								</p>
								<p>
									<input type="submit" value="Submit Comment">
								</p>
							</form>
					  </div>
		   </div>
		  </div>
		<!-- footer -->
		<div class="container">
		<div class="footer">
				<div class="footer-left">
					<p>Template by <a href="http://w3layouts.com" target="_blank">W3layouts</a></p>
				</div>
				<div class="footer-right">
					<ul>
						<li><a href="#"><span class="face"> </span></a></li>
						<li><a href="#"><span class="twit"> </span></a></li>
						<li><a href="#"><span class="dri"> </span></a></li>
						<li><a href="#"><span class="tech"> </span></a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
									<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		</div>
		<!-- /footer -->
	<!-- /container -->
</body>
</html>

