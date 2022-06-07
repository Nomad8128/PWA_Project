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
							<a class="nav-link active" href="prijava.php">Prijava</a>
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
<div class="container">
    <form method="POST">
		<br />	
		<br />
        <label for="username">Korisničko ime</label>
        <br />
        <input name="username" type="text" required />
        <br />
        <label for="lozinka">Lozinka</label>
        <br />
        <input name="lozinka" type="password" required />    
		<br />	
		<br />
        <input name="prijava" type="submit" value="Log in" />
    </form>
</div>
    <?php
	include 'connect.php';
    define('UPLPATH', 'img/');
	session_start();
	// Provjera da li je korisnik došao s login forme
	if (isset($_POST['prijava'])) {
		 $user = $_POST["username"];
		 $password = $_POST["lozinka"];
		 $query = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?;";
		 $stmt = mysqli_stmt_init($dbc);
		 if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, 's', $user);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt, $username, $hash, $razina);
                mysqli_stmt_fetch($stmt);
				 if (password_verify($password, $hash)) {
					echo '<div class="container">';
                    echo "Dobro došli $user, vaša razina je $razina<br>";
                    $_SESSION["username"] = $user;
					$_SESSION["clearance"]=$razina;
					echo '</div>';
				}	else {
					echo '<br>';
					echo '<div class="container">';
                    echo "Unijeli ste pogrešno korisničko ime ili lozinku.";
					echo "<br>";
					echo "Niste registrirani? Možete to napraviti na ";
					echo '<a href="registracija.php">sljedećoj stranici</a>';
					echo '</div>';
                }
		mysqli_stmt_close($stmt);
	}
	}
    ?>
<footer class="page-footer font-small blue pt-4">
	<div class="footer-copyright text-center py-3">Nachrichten vom 17.05.2019 | © stern.de GmbH</div>
</footer>
</body>

</html>