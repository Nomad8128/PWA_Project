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
	$id = $_GET['id'];

$query = "SELECT * FROM artikl WHERE arhiva=0 AND id=$id LIMIT 1";
$result = mysqli_query($dbc, $query);
$i=1;
 while($row = mysqli_fetch_array($result)) {
 $kategorija = $row['kategorija'];
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
									<a class='nav-link active' href='kategorija.php?id=politik'>Politik</a>
								  </li>
								  <li class='nav-item'>
									<a class='nav-link' href='kategorija.php?id=gesundheit'>Gesundheit</a>
								  </li>";
						}
						else if ($kategorija=="gesundheit"){
							echo "<li class='nav-item'>
									<a class='nav-link' href='kategorija.php?id=politik'>Politik</a>
								  </li>
								  <li class='nav-item'>
									<a class='nav-link active' href='kategorija.php?id=gesundheit'>Gesundheit</a>
								  </li>";
						}
						?>
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
<?php
$query = "SELECT * FROM artikl WHERE arhiva=0 AND id=$id LIMIT 1";
$result = mysqli_query($dbc, $query);
while($row = mysqli_fetch_array($result)) {
 echo '<div class="container">';
	echo '<div class="row">';
		echo '<div class="col-12 col-lg-10 col-sm-10">';
			echo '<h2>';
				echo $row['naslov'];
			echo '</h2>';
		echo '</div>';
		echo '<div class="col-12 col-lg-2 col-sm-2" align="right">';
			echo '<p>';
			echo $row['datum'];
			echo '</p>';
		echo '</div>';
	echo '</div>';
	
	echo '<div class="row">';
		echo '<div class="col-12 col-lg-12 col-sm-12">';
			echo '<p>';
			echo $row['sazetak'];
			echo '</p>';
		echo '</div>';
	echo '</div>';
	
	echo '<div class="row">';
		echo '<div class="col-12 col-lg-12 col-sm-12" height:"80%">';
			echo '<img src="' . UPLPATH . $row['slika'] . '" class="img-responsive fit-image testc" width ="100%"height="100%""';
			echo '<hr/>';
		echo '</div>';
	echo '</div>';
	
	echo '<div class="row">';
		echo '<div class="col-12 col-lg-12 col-sm-12">';
			echo '<hr/>';
			echo nl2br($row['sadrzaj']);
		echo '</div>';
	echo '</div>';
echo '</div>';
 }
?>




<footer class="page-footer font-small blue pt-4">
		<div class="footer-copyright text-center py-3">Nachrichten vom 17.05.2019 | © stern.de GmbH</div>
</footer>
</body>
</html>