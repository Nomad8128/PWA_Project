<!DOCTYPE html>
<html lang="de">
<html>
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
							<a class="nav-link active" href="registracija.php">Registriraj se</a>
						</li>
					</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="container">
    <form method="POST" action="registracija.php">
		<br />
		<br />
        <label for="ime">Ime</label>
        <br />
        <input name="ime" id="ime" type="text" required />
		<span id="porukaIme"></span>
        <br />
        <label for="prezime">Prezime</label>
        <br />
        <input name="prezime" id="prezime" type="text" required />
		<span id="porukaPrezime"></span>
        <br />
        <label for="username">Korisničko ime</label>
        <br />
        <input name="username" id="username" type="text" required />
		<span id="porukaUsername"></span>
        <br />
        <label for="pass" >Lozinka</label>
        <br />
        <input name="pass" id="lozinka" type="password" required />
		<span id="porukaLozinka"></span>
        <br />
        <label for="passwordCheck">Ponovi lozinku</label>
        <br />
        <input name="passwordCheck" id="provjera" type="password" required />
		<span id="porukaProvjera"></span>
        <br />	
		<br />
        <input name="submit" id="submit" type="submit" value="Register" />
    </form>
	<script>
	document.getElementById("submit").onclick = function(event) {
		var slanjeForme = true;
		
		var poljeIme = document.getElementById("ime");
		var ime = document.getElementById("ime").value;
		
		if (ime.length == 0) {
			slanjeForme = false;
			document.getElementById("porukaIme").innerHTML="Ime mora biti uneseno!<br>";
			poljeIme.style.border="1px dashed red";
			
		} else {
			document.getElementById("porukaIme").innerHTML="";
			poljeIme.style.border="1px solid green";
		}
		
		var poljePrezime = document.getElementById("prezime");
		var prezime = document.getElementById("prezime").value;
		
		if (prezime.length == 0) {
			slanjeForme = false;
			document.getElementById("porukaPrezime").innerHTML="Prezime mora biti uneseno!<br>";
			poljePrezime.style.border="1px dashed red";
			
		} else {
			document.getElementById("porukaPrezime").innerHTML="";
			poljePrezime.style.border="1px solid green";
		}
		
		var poljeUsername = document.getElementById("username");
		var username = document.getElementById("username").value;
		
		if (username.length == 0) {
			slanjeForme = false;
			document.getElementById("porukaUsername").innerHTML="Username mora biti uneseno!<br>";
			poljeUsername.style.border="1px dashed red";
			
		} else {
			document.getElementById("porukaUsername").innerHTML="";
			poljeUsername.style.border="1px solid green";
		}
		
		var poljeLozinka = document.getElementById("lozinka");
		var lozinka = document.getElementById("lozinka").value;
		
		if (lozinka.length == 0) {
			slanjeForme = false;
			document.getElementById("porukaLozinka").innerHTML="Lozinka mora biti unesena!<br>";
			poljeLozinka.style.border="1px dashed red";
			
		} else {
			document.getElementById("porukaLozinka").innerHTML="";
			poljeLozinka.style.border="1px solid green";
		}
		
		var poljeProvjera = document.getElementById("provjera");
		var provjera = document.getElementById("provjera").value;
		
		if (provjera.length == 0) {
			slanjeForme = false;
			document.getElementById("porukaProvjera").innerHTML="Lozinka mora biti unesena!<br>";
			poljeProvjera.style.border="1px dashed red";
			
		} else {
			document.getElementById("porukaProvjera").innerHTML="";
			poljeProvjera.style.border="1px solid green";
		}
		if((lozinka.length != 0 && provjera.length != 0) && (lozinka.length!=provjera.length)){
			slanjeForme = false;
			document.getElementById("porukaLozinka").innerHTML="Lozinke moraju biti iste!<br>";
			poljeLozinka.style.border="1px dashed red";
			document.getElementById("porukaProvjera").innerHTML="Lozinke moraju biti iste!<br>";
			poljeProvjera.style.border="1px dashed red";
		}
		
		if (slanjeForme != true) {
		event.preventDefault();
		} 
	};
	</script>
</div>
	<?php
	include 'connect.php';
	if (isset($_POST["submit"])) {
	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
	$username = $_POST['username'];
	$lozinka = $_POST['pass'];
	$passwordCheck = $_POST["passwordCheck"];
	$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
	$razina = 0;
	
	$registriranKorisnik = '';
	
	//Provjera postoji li u bazi već korisnik s tim korisničkim imenom
	$sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
	$stmt = mysqli_stmt_init($dbc);
	if (mysqli_stmt_prepare($stmt, $sql)) {
	mysqli_stmt_bind_param($stmt, 's', $username);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	}
	if(mysqli_stmt_num_rows($stmt) > 0){
	echo '<br>';
	echo '<div class="container">';
	$msg='Korisničko ime već postoji!';
	echo $msg;
	echo '</div>';
	}else if ($passwordCheck != $lozinka){
		echo "Lozinke moraju biti iste!";
	}else{
	// Ako ne postoji korisnik s tim korisničkim imenom - Registracija korisnika u bazi pazeći na SQL injection
	$sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
	$stmt = mysqli_stmt_init($dbc);
	if (mysqli_stmt_prepare($stmt, $sql)) {
	mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
	mysqli_stmt_execute($stmt);
	$registriranKorisnik = true;
	echo '<br>';
	echo '<div class="container">';
	echo '<p>Korisnik je uspješno registriran!</p>';
	echo '</div>';
	}
	}
	mysqli_close($dbc);
	}
	?>
<footer class="page-footer font-small blue pt-4">
	<div class="footer-copyright text-center py-3">Nachrichten vom 17.05.2019 | © stern.de GmbH</div>
</footer>
</body>

</html>