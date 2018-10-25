<!DOCTYPE html>

<?php

session_start();
if(($_SESSION['login']!="loic") || ($_SESSION['mdp']!="admin")){
	$_SESSION['login']= "";
	$_SESSION['mdp']= "";
	header("Location:session.php");
}
else{}
?>


<html>
	<head>
		<meta charset="UTF-8" />
		<title>Admin</title>
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
		<h1>Bienvenue, Admin</h1>
		<h2>Espace gestion</h2>
		<form id="form2" method="get">
		<select id="list" name="promo">
			<option>Sélectionner la promotion</option>
			<option>1</option>
			<option>2</option>
		</select>
		<select id="list2" name="grp">
			<option>Sélectionner le groupe</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<br />
		</select>
		<input type='submit' name='Valider' value="Valider" /><br />
		<?php
		if(isset($_GET['Valider'])){
			mysql_connect('localhost','root','') or die(mysql_error());
			mysql_select_db('projet_php') or die(mysql_error());
			$query=sprintf
			("SELECT * FROM eleve WHERE promotion='%s' AND groupe='%s'",
			mysql_real_escape_string($_GET['promo']),
			mysql_real_escape_string($_GET['grp']));
			$result=mysql_query($query);
			if(!$result){
				$message = 'Requête invalide : '. mysql_error(). "\n";
				die($message);
			}
			echo"<table class=\"table1\"><tr>";
			while($row = mysql_fetch_assoc($result)){
				echo"<td style='border:1px solid black;'>".
				"nom: ".utf8_encode($row['nom'])."</br> ".
				"prenom: ".utf8_encode($row['prenom'])." </br>".
				"promotion: ".$row['promotion']." </br>".
				"groupe: ".$row['groupe']." </br>"."<img class=\"img\" src=\"image/".$row['username'].".jpg". "\" width=\"120\" height=\"140\"/> <br/> <br/>";
				"</td>";
			}
			echo"</tr></table>";
		}
		?>
		</form>
		
		
		
		<h2>Trombinoscope groupe</h2>
		<fieldset class="f_admin">
		<div>
		<form id="form1">
		<input class="btn_eff" type="button" value="Effacer" />
		<input class="btn_mod" type="button" value="Modifier" />
		<input class="btn_raf" type="submit" value="Ajouter" name="ajout" />
		</form>
		</div>
		</fieldset>
		<form id="form3" method="post">
			<br/> <input class="btn_decad" type="submit" value="Déconnexion" name="deco" />
			<?php
				if(isset($_POST['deco'])){
					$_SESSION['login']= "";
					$_SESSION['mdp']= "";
					header("Location:session.php");
				}
			?>
	</body>
</html>