<?php 
	include '../funzioni.php';
	include '../component/header.php';
	include '../component/footer.php';
	$stazione1=$_POST['stazione1'];
	$stazione2=$_POST['stazione2'];
	$tipoAbbonamento=$_POST['tipoAbbonamento'];
	$giornoPartenza=$_POST['giornoPartenza'];
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no ">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Abbonamento-LTWtrain</title>
		 <!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../css/style.css" rel="stylesheet">
	</head>
	<body id="body">
	<?php getHeader(); ?>
	
	<div class="container">
		<div class="mt-4">
			<h3>Il tuo abbonamento in breve</h3>
		</div>
		<div class="row">
			<div class="col-md-6">
			
			</div>
		</div>

	</div>

	<?php getFooter(); ?>
	</body>
</html>
