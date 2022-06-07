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
							<a class="nav-link active" href="unos.php">Unos</a>
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
<div class="container">
<div class="row">
	<form name="forma" enctype="multipart/form-data" action="unos.php" method="post">
		<label for="naslov">Naslov:</label><br>
		<input type="text" id="naslov" name="naslov" value=""><span> </span><span id="porukaTitle"></span><br>
		<label for="sazetak">Sazetak:</label><br>
		<textarea rows="4" cols="100" id="sazetak" name="sazetak"></textarea><span> </span><span id="porukaSazetak"></span><br><br>
		<label for="sadrzaj">Sadrzaj:</label><br>
		<textarea rows="4" cols="100" id="sadrzaj" name="sadrzaj"></textarea><span> </span><span id="porukaSadrzaj"></span><br><br>
		<label for="slika">Slika:</label><br>
		<input type="file" accept="image/*" name="slika" id="slika"/><span> </span><span id="porukaSlika"></span><br><br>
		<label for="kategorija">Kategorija vijesti:</label>
		<select name="category" id="category">
			<option value="" disabled selected>Odabir kategorije</option>
			<option value="politik">Politik</option>
			<option value="gesundheit">Gesundheit</option>
		</select><span> </span><span id="porukaKategorija"></span><br><br>
		<label for="prikazi">Arhiviraj:</label>
		<input type="checkbox" name="prikazi"><br><br>
		<input type="submit" id ="submit" value="Submit" name="submit">
	</form> 
</div>
</div>
<?php
include 'connect.php';
if (isset($_POST['submit'])){
$naslov = $_POST["naslov"];			
$sazetak = $_POST["sazetak"];	
$sadrzaj = $_POST["sadrzaj"];		
$slika = $_FILES['slika']['name'];
$kategorija = $_POST['category'];	
$datum=date('j. M Y');

if(isset($_POST['prikazi'])){
 $archive=1;
}else{
 $archive=0;
}

$target_dir = 'img/'.$slika;
move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);		//slika se ne sprema iz nekog razloga

$query = "INSERT INTO artikl (naslov, sazetak, sadrzaj, slika, kategorija, datum, 
arhiva) VALUES ('$naslov', '$sazetak', '$sadrzaj', '$slika', '$kategorija', 
'$datum', '$archive')";		//treba stavit da se spremi samo kada se klikne gumb

$result = mysqli_query($dbc, $query) or die('Error querying databese.');
mysqli_close($dbc);
}
?>
<footer class="page-footer font-small blue pt-4">
	<div class="footer-copyright text-center py-3">Nachrichten vom 17.05.2019 | © stern.de GmbH</div>
</footer>
</body>
<script>
	document.getElementById("submit").onclick = function(event) {
		var slanjeForme = true;
		
		var poljeTitle = document.getElementById("naslov");
		var naslov = document.getElementById("naslov").value;
		
		// Naslov vjesti (5-30 znakova)
		if (naslov.length < 5 || naslov.length > 30 || naslov == '') {
			slanjeForme = false;
			document.getElementById("porukaTitle").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>";
			poljeTitle.style.border="1px dashed red";
			/*porukaTitle.style.border="1px dashed red";*/
		} else {
			document.getElementById("porukaTitle").innerHTML="";
			poljeTitle.style.border="1px solid green";
		}
		
		// Kratki sadržaj (10-100 znakova)
		var poljeSazetak = document.getElementById("sazetak");
		var sazetak = document.getElementById("sazetak").value;
		
		if (sazetak.length < 10 || sazetak.length > 100 || sazetak == '') {
		slanjeForme = false;
		poljeSazetak.style.border="1px dashed red";
		document.getElementById("porukaSazetak").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
		} else {
		poljeSazetak.style.border="1px solid green";
		document.getElementById("porukaSazetak").innerHTML="";
		}
		
		var poljeSadrzaj = document.getElementById("sadrzaj");
		var sadrzaj = document.getElementById("sadrzaj").value;
		
		if (sadrzaj.length == 0) {
		slanjeForme = false;
		poljeSadrzaj.style.border="1px dashed red";
		document.getElementById("porukaSadrzaj").innerHTML="Sadržaj mora biti unesen!<br>";
		} else {
		poljeSadrzaj.style.border="1px solid green";
		}
		
		var poljeCategory = document.getElementById("category");
		if(document.getElementById("category").selectedIndex == 0) {
		slanjeForme = false;
		poljeCategory.style.border="1px dashed red";
 
		document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
		} else {
		poljeCategory.style.border="1px solid green";
		document.getElementById("porukaKategorija").innerHTML="";
		}
		
		// Slika mora biti unesena
		var poljeSlika = document.getElementById("slika");
		var pphoto = document.getElementById("slika").value;
		if (pphoto.length == 0) {
		slanjeForme = false;
		poljeSlika.style.border="1px dashed red";
		document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
		} else {
		poljeSlika.style.border="1px solid green";
		document.getElementById("porukaSlika").innerHTML="";
		}
		
		if (slanjeForme != true) {
		event.preventDefault();
		} 
	};
	
</script>