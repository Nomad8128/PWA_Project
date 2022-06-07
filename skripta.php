<!DOCTYPE html>
<html lang="de">
<head>
	<title>Stern</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<?php
	if (isset($_POST['category'])){
		$kategorija = $_POST["category"];
	}
	if (isset($_POST['naslov'])){
		$naslov = $_POST["naslov"];		
	}
	if (isset($_POST['sazetak'])){
		$sazetak = $_POST["sazetak"];
	}
	if (isset($_POST['sadrzaj'])){
		$sadrzaj = $_POST["sadrzaj"];	
	}
	if (isset($_POST['slika'])){
		$slika = $_POST["slika"];
	}
?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-1 col-lg-1 d-md-none d-lg-block d-sm-none d-md-block d-none d-sm-block">
				<img id="logo" src="img/Stern_Logo.png" alt="Logo" class="img-responsive fit-image">
			</div>
			<div class="col-11 col-lg-11 col-sm-12">
				<div class="row">
					<h1>stern</h1>
				</div>
				<div class="row">
				<nav class="navbar navbar-expand-lg navbar-light">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<?php
						if ($kategorija=="politik"){
							echo "<li class='nav-item'>
									<a class='nav-link active' href=''>Politik</a>
								  </li>
								  <li class='nav-item'>
									<a class='nav-link' href=''>Gesundheit</a>
								  </li>";
						}
						else if ($kategorija=="gesundheit"){
							echo "<li class='nav-item'>
									<a class='nav-link' href=''>Politik</a>
								  </li>
								  <li class='nav-item'>
									<a class='nav-link active' href=''>Gesundheit</a>
								  </li>";
						}
						?>
						<li class="nav-item">
							<a class="nav-link" href="">Administracija</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="unos.html">Unos</a>
						</li>
					</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>	
<div class="container">
	<div class="row">
		<div class="col-12 col-lg-10 col-sm-10">
			<h2><?php echo "$naslov"?></h2>
		</div>
		<div class="col-12 col-lg-2 col-sm-2" align="right">
			<p><?php echo date("j. M Y")?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-12 col-sm-12">
			<p><?php echo "$sazetak"?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-12 col-sm-12">
			<?php echo "<img src='img/$slika' class='img-responsive fit-image politik' width='100%' ";?>
			<hr/>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-12 col-lg-12 col-sm-12">
			<hr/>
			<?php echo "$sadrzaj";?>
		</div>
	</div>
</div>

<footer class="page-footer font-small blue pt-4">
	<div class="footer-copyright text-center py-3">Nachrichten vom 17.05.2019 | © stern.de GmbH |Home</div>
</footer>
</body>
</html>