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
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="kategorija.php?id=politik">Politik</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="kategorija.php?id=gesundheit">Gesundheit</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="administracija.php">Administracija</a>
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
$query = "SELECT * FROM artikl";
$result = mysqli_query($dbc, $query);
$i=1;
session_start();
$admin=0;
$name="default";
if (isset($_SESSION['username'])){
	$name = $_SESSION["username"];
}
if (isset($_SESSION['clearance'])){
	$admin = $_SESSION["clearance"];
}
if ($admin==1){
while($row = mysqli_fetch_array($result)) {
echo '<div class="container">
	  <div class="row">
		<form name="forma" enctype="multipart/form-data" action="administracija.php" method="post">
		<input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
		<label for="naslov">Naslov:</label><br>
		<input type="text" id="naslov" name="naslov" value="'.$row['naslov'].'"><br>';
echo '		
		<label for="sazetak">Sazetak:</label><br>
		<textarea rows="4" cols="100" name="sazetak">'.$row['sazetak'].'</textarea><br><br>';
		
echo '		<label for="sadrzaj">Sadrzaj:</label><br>
		<textarea rows="4" cols="100" name="sadrzaj">'.$row['sadrzaj'].'</textarea><br><br>';
echo '		<label for="slika">Slika:</label><br>
			<img src="' . UPLPATH . $row['slika'] . '" width=100px><br><br>
		<input type="file" value="'.$row['slika'].'" accept="image/*" name="slika"/><br><br>';
if ($row['kategorija']==="politik"){															//politik i gesundheit kategory
	echo '		<label for="kategorija">Kategorija vijesti:</label>
		<select name="category" value="'.$row['kategorija'].'">
			<option value="politik">Politik</option>
			<option value="gesundheit">Gesundheit</option>
		</select><br><br>';
}
else if ($row['kategorija']==="gesundheit"){
	echo '		<label for="kategorija">Kategorija vijesti:</label>
		<select name="category" value="'.$row['kategorija'].'">
			<option value="politik">Politik</option>
			<option value="gesundheit" selected>Gesundheit</option>
		</select><br><br>';
}

if($row['arhiva'] == 0) {
 echo '<label for="prikazi">Arhiviraj:</label>
		<input type="checkbox" name="prikazi"><br><br>';
 } else {
 echo '<label for="prikazi">Arhiviraj:</label>
		<input type="checkbox" name="prikazi" checked><br><br>';
 } 		
		
		
echo '<input type="submit" value="Update" name="update">&nbsp';
echo '<input type="reset" value="Poništi" name="reset" />&nbsp';
echo'<button type="submit" name="delete" value="Izbriši">Izbriši</button>';

echo'	</form> 
</div>
</div>';
echo '<hr>';
}
}else if (isset($_SESSION['username'])!=1) {
	echo '<br>';
	echo '<div class="container">';
	echo "Nemate dovoljno prava za pristup ovoj stranici";
	echo '</div>';	
}else {
	echo '<br>';
	echo '<div class="container">';
	echo "$name, nemate dovoljno prava za pristup ovoj stranici";
	echo '</div>';
}
	if(isset($_POST['delete'])){
 $id=$_POST['id'];
 $query = "DELETE FROM artikl WHERE id=$id ";
 $result = mysqli_query($dbc, $query);
}
	if(isset($_POST['update'])){
$picture = $_FILES['slika']['name'];
$title=$_POST['naslov'];
$about=$_POST['sazetak'];
$content=$_POST['sadrzaj'];
$category=$_POST['category'];
$datum=date('j. M Y');
if(isset($_POST['arhiva'])){
 $archive=1;
}else{
 $archive=0;
}
$target_dir = 'img/'.$picture;
move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
$id=$_POST['id'];
$query = "UPDATE artikl SET naslov='$title', sazetak='$about', sadrzaj='$content', 
slika='$picture', kategorija='$category', arhiva='$archive', datum='$datum' WHERE id=$id ";
$result = mysqli_query($dbc, $query);
}
?>
	<footer class="page-footer font-small blue pt-4">
		<div class="footer-copyright text-center py-3">Nachrichten vom 17.05.2019 | © stern.de GmbH</div>
	</footer>
</body>	