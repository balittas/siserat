<!DOCTYPE html>
<html lang="en">
	<head>	
		<title>Admin - Balai Penelitian Tanaman Pemanis dan Serat</title>
		<meta charset="utf-8">
		<!-- <link href="gambar/logo.png" rel="shortcut icon"> -->
		<meta name="description" content="A Tuts+ course">
		<!-- <link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.css"> -->
		<link rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/balittas.css">
		<link href="<?php echo base_url() ?>item_img/Logo-Kementerian-Pertanian.png" rel="shortcut icon">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="thetop"></div>
		<header>
			<?php			
				if (!empty($judul)) { ?>
					<div class="hidden-md hidden-lg" style="background-color: rgb(28,69,26); height: 70px;"></div>			
			<?php 
				} ?>		
			<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: rgba(28,69,26,1)">
				<div class="container-fluid">
				    <div class="navbar-header" style="margin-top: 4.49px; margin-bottom: 3px;">
				    	<a href="<?php echo site_url('Admin/serat') ?>">
				    		<img src="<?php echo base_url() ?>assets/img/balittaslitbang.png" style="width:350px; height: 60px; margin-left: -35px;">
				    	</a>
				    </div>			
				    <div class="collapse navbar-collapse">			    
					    <ul class="nav navbar-nav navbar-right" style="margin-top: 10px; margin-right: -40.5px;">
					      	<div class="dropdownHeader">
							  	<a href="<?php echo site_url('admin/logout'); ?>"><div class="dropbtnHeader" 
							  	style="font-family: Minion Pro; cursor: pointer;">Logout &nbsp<i class="glyphicon glyphicon-log-out" style="font-size: 0.8em;"></i></div></a>
							</div>																			      		     
					    </ul>				    
				    </div>				    
				</div>
			</nav>										
			<!-- gambar tengah -->		
		</header>
	</body>
	<script>
		//JS for scroll to top
		$(window).scroll(function() {
		    if ($(this).scrollTop() > 50 ) {
		        $('.scrolltop:hidden').stop(true, true).fadeIn();
		    } else {
		        $('.scrolltop').stop(true, true).fadeOut();
		    }
		});
		$(function(){$(".scroll").click(function(){$("html,body").animate({scrollTop:$(".thetop").offset().top},"1000");return false})})
	</script>
</html>
