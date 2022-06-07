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
include 'connect.php';
define('UPLPATH', 'img/');
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
							<a class="nav-link active" href="">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="kategorija.php?id=politik">Politik</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="kategorija.php?id=gesundheit">Gesundheit</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="administracija.php">Administracija</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="unos.php">Unos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="prijava.php">Prijava</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="registracija.php">Registriraj se</a>
						</li>
					</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>	
	
<section class="odlomak1">
<div class="container">
	<div class="row">
		<h2>POLITIK ></h2>
	</div>
	<div class="row">
<?php	//problem responzivno radi al normalno ne
$query = "SELECT * FROM artikl WHERE arhiva=0 AND kategorija='politik' LIMIT 3";
$result = mysqli_query($dbc, $query);
$i=1;
 while($row = mysqli_fetch_array($result)) {
 echo '<div class="col-12 col-lg-4 col-sm-12 article float-left">';
	echo'<div class="row test">';
		echo '<img src="' . UPLPATH . $row['slika'] . '" class="img-responsive fit-image politik"';
	echo '</div>';
	echo '<div class="row test2">';
			echo '<a href="clanak.php?id='.$row['id'].'">';
				echo $row['naslov'];
			echo '</a>';
	echo '</div>';
	echo '<div class="row">';
		echo '<p class="opis">';
			echo $row['sazetak'];
		echo '</p>';
	echo '</div>';
 echo '</div>';
echo '</div>';

 }
?> 			
</div>
</section>
	
<section class="odlomak1">
<div class="container">
	<div class="row">
		<h2>GESUNDHEIT ></h2>
	</div>
	<div class="row">
<?php	//problem responzivno radi al normalno ne
$query = "SELECT * FROM artikl WHERE arhiva=0 AND kategorija='gesundheit' LIMIT 3";
$result = mysqli_query($dbc, $query);
$i=1;
 while($row = mysqli_fetch_array($result)) {
 echo '<div class="col-12 col-lg-4 col-sm-12 article float-left">';
	echo'<div class="row testb">';
		echo '<img src="' . UPLPATH . $row['slika'] . '" class="img-responsive fit-image health"';
	echo '</div>';
	echo '<div class="row test2">';
			echo '<a href="clanak.php?id='.$row['id'].'">';
				echo $row['naslov'];
			echo '</a>';
	echo '</div>';
	echo '<div class="row">';
		echo '<p class="opis">';
			echo $row['sazetak'];
		echo '</p>';
	echo '</div>';
 echo '</div>';
echo '</div>';

 }
?> 			
</div>
</section>
	<footer class="page-footer font-small blue pt-4">
		<div class="footer-copyright text-center py-3">Nachrichten vom 17.05.2019 | © stern.de GmbH</div>
	</footer>
</body>