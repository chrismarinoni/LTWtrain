<?php
	include 'funzioni.php';
	include 'component/header.php';
	include 'component/footer.php';
?>




<!DOCTYPE html>
<html lang="it" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Chi siamo</title>
	

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/style.css" rel="stylesheet">
		<script type="text/javascript" lang="javascript" src="js/autocomplete.js"></script>
	</head>
	<body id ="body" onload="setParameters();" onscroll="fixBox();">
		<?php getHeader(); ?>
		
		<div class="p-3 p-md-5 text-black bg-splash">
			<div class="container">
				<div class="row">
					<h1 class="display-1">Chi siamo:</h1>
					<p class="lead my-3"> fcvfubyiuoupnmp nioubyivtucrycytvuybn bfvcrdyvubinuhughvbwonngve  qhfojèqmmi4jpqnh4pnfg8q 8quufmjqv0jqij0jqnpgqv8 08qiv0u4mtiqjmmpj3 i0qjfmoqj348fmqo</p>
				</div>
				<div class="row">
					<div class="col-4 col-md-4">
						<img class="img-thumbnail img-fluid  mx-auto d-block" src="images/trainguy.jpg" alt="">
						<p>sdfgfhgjkhjlòkjhgfdhgjlkòjhgfdjkhjlòlkhgjfdgjhk</p>
					</div>
					<div class="col-4 col-md-4">
						<img class="img-thumbnail img-fluid mx-auto d-block" src="images/sonic.jpg" alt="">
						<p>rtdcyguihjokplopjnhibguvfycdtxsrrdctfyguhig tfcrdsxzexcdfxgchjkldetfryguhiklopuhytfrdefhyioklopkihyut</p>
					</div>
					<div class="col-4">
						<h4> Contatti: </h4>
						<ul class="list-unstyled">
							<li>email1:</li>
							<li>utgtuyviybn@utib8n.com</li>
							
							<li>email2:</li>
							<li>rdytvubynu@rtvybu.com</li>
							
						
						</ul>
					</div>
				
				</div>
			</div>
		</div>
		
		<?php getFooter(); ?>
		
		<script>

		var fixId, fixTop, navH, bodyId, fixH, topReached = 0;

		function setParameters() {
		  fixId = document.getElementById("search-to-fix");
		  fixTop = fixId.offsetTop;
		  navId = document.getElementById("nav");
		  navH = navId.clientHeight + navId.getBoundingClientRect().top;
		  bodyId = document.getElementById("body");
		  fixH = fixId.offsetHeight;
		}

		function fixBox() {
		  if(window.pageYOffset >= (fixTop-navH)) {
			fixId.classList.add("fixed-search");
			fixId.style.top = navH + "px";
			bodyId.style.marginTop = fixH + "px";
			topReached=1;
		  } else {
			fixId.classList.remove("fixed-search");
			if(topReached==1){
			  fixId.style.top = 0 + "px";
			  bodyId.style.marginTop = 0 + "px";
			  topReached=0;
			}
		  }
		}
		window.onload = function() {setParameters();}

		window.onscroll = function() {fixBox();}

		</script>
		
	
	</body>	

</html>
