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
	<body id ="body" onload="setParameters();" onscroll="fixBox()">
		<header id="nav" >
		  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-red"  >
			<div class="container" >
			  <a class="navbar-brand" href="#">LTWtrain</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
				  <li class="nav-item active">
					<a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="order/biglietteria.php">Biglietteria</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="tabellone.php">Tabellone</a>
				  </li>
				</ul>
				<a href="account/signin.php" class="btn btn-light" role="button" aria-pressed="true">Area Personale</a>
			  </div>
			</div>
		  </nav>
		</header>
		
		<div class="p-3 p-md-5 text-black bg-splash">
			<div class="container">
				<div class="row">
					<h1 class="display-1">Chi siamo:</h1>
				</div>
				<div class="row">
					<div class="col-6 col-md-4">
						<img class="img-thumbnail img-fluid mx-auto d-block" src="images/i_like_trains_guy.png" alt="">
						<p>Un ragazzo a cui piacciono i <strong> TRENI</strong></p>
					</div>
					<div class="col-6 col-md-4">
						<img class="img-thumbnail img-fluid mx-auto d-block" src="images/sega-mega-drive-portable-console-620x372.jpg" alt="">
						<p>Un ragazzo a cui piacciono i <strong> VIDEOGIOCHI</strong></p>
					</div>
				
				</div>
			</div>
		</div>
		
		
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
