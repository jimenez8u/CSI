<!DOCTYPE html>

<?php
error_reporting(0);
session_start();
if(null==($_SESSION['login']) || null==($_SESSION['mdp'])){
	$_SESSION['login']= "";
	$_SESSION['mdp']= "";
}

$val_1 = $_POST['login'];
$val_2 = $_POST['pwd1'];
?>

<html>
	<head>
		<meta charset="UTF-8" />
		<title>Accueil</title>
		 <link rel="stylesheet" media="screen and (min-width:721px)" href="style1.css" />
		  <link rel="stylesheet" media="screen and (max-device-width:720px)" href="mobile4.css" />
		<link rel="stylesheet" media="screen and (max-width:720px)" href="mobile4.css" /> 
		<meta name="viewport" content="width=max-device-width, initial-scale=1" />
		 <link rel="icon" href="iut.ico" />
		 </head>
	<body>
	<header>
			<img src="logo.png" title="Université de lorraine IUT Metz" alt="Université de lorraine IUT Metz"/>
	</header>
		<h1>Bienvenue dans l'accueil</h1>
		<h2>Espace Connexion</h2>
		<table>
			<form method="post" id="myForm">
				<tr>
					<td>
						<label class="form_col" for="login">Pseudo :</label>
						<input name="login" id="login" type="text" />
						<br /><br />
						<label class="form_col" for="pwd">Mot de passe :</label>
						<input name="pwd1" id="pwd1" type="password" />
						<br /><br />
						<input class="btn_v" type='submit' name='Ajouter' value="Valider" /> 
						<?php
						if(isset($_POST['Ajouter'])){
							mysql_connect('localhost','root','') or die(mysql_error());
							mysql_select_db('projet_php') or die(mysql_error());
							$taille=mysql_query('COUNT(SELECT* FROM eleve)');
							$resultat=mysql_query('SELECT username,password FROM eleve');
							if($val_1=="loic"){
								$_SESSION['login']=$val_1;
								if($val_2=="admin"){
									$_SESSION['mdp']=$val_2;
									header("Location:admin.php");
								}
							}
							else{
								if($result = mysql_query('SELECT username,password FROM eleve')){
									while($ligne = mysql_fetch_row($result)){
										$login=$ligne[0];
										$mdp=$ligne[1];
										var_dump($login);
										var_dump($val_1);
										var_dump($mdp);
										var_dump($val_2);
										if($val_1==$login && $val_2==$mdp){
											echo("ok");
											$_SESSION['login']=$val_1;
											$_SESSION['mdp']=$val_2;
											header("Location:etudiant.php");
										}
									}
								}
							}
						}
						?>
					</td>
				</tr>
			</form>
		</table>
	<footer>
		<p>Veuillez saisir votre pseudonyme ainsi que votre mot de passe pour accéder à votre espace.</p>
			<p class="warning">Veuillez ne pas divulguer vos données, pour éviter tout problème d'usurpation.</p>
		<p class="gp">Projet Web année 206/2017 Jimenez Loïc et Charles Anne-Laure groupe 3.1</p>
	</footer>
	</body>
</html>