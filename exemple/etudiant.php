<!DOCTYPE html>

<?php

session_start();
$test=0;
mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('projet_php') or die(mysql_error());
//mysql_connect('infodb.iutmetz.univ-lorraine.fr','charles33u','anne1011') or die(mysql_error());
//mysql_select_db('charles33u_projet_php') or die(mysql_error());
//https://infodb.iutmetz.univ-lorraine.fr/~charles33u/connexion.php
if($result = mysql_query('SELECT username,password,nom,prenom,groupe,promotion FROM eleve')){
	while($ligne = mysql_fetch_row($result)){
		$login=$ligne[0];
		$mdp=$ligne[1];
		$nom=$ligne[2];
		$prenom=$ligne[3];
		$groupe=$ligne[4];
		$promotion=$ligne[5];
		if($_SESSION['login']==$login && $_SESSION['mdp']==$mdp){
			$_SESSION['nom']=$nom;
			$_SESSION['prenom']=$prenom;
			$_SESSION['groupe']=$groupe;
			$_SESSION['promotion']=$promotion;
			$test=1;
		}
	}
}
if($test!=1){
	$_SESSION['login']= "";
	$_SESSION['mdp']= "";
	header("Location:session.php");
}
?>


<html>
	<head>
		<meta charset="UTF-8" />
		<title>étudiant</title>
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
		<h1><?php echo("Bienvenue, étudiant ".$_SESSION['login'])?> </h1>
		<fieldset>
		<legend class="cadre"><b>Espace envoie d'image</b></legend>
		<?php
		if(file_exists("image/".$_SESSION['login'].".jpg") 
		|| file_exists("image/".$_SESSION['login'].".jpeg")
		|| file_exists("image/".$_SESSION['login'].".png")){
			echo("<p class=\"left\">Vous avez déja envoyé votre photo : </p>");
			if(file_exists("image/".$_SESSION['login'].".jpg")){
				$format=".jpg";
			}
			else if(file_exists("image/".$_SESSION['login'].".jpeg")){
				$format=".jpeg";
			}
			else{
				$format=".png";
			}
			echo("<p class=\"left\"> ".$_SESSION['login'].$format." </p>");
			echo("<img class=\"right\" src=\"image/".$_SESSION['login'].$format. "\" width=\"210\" height=\"240\" /> <br/> <br/>");
			//echo("<img src=\"image/".$_SESSION['login'].$format."\" width=\"150\" height=\"200\" >");
		}
		else{
			echo("<p class=\"left\">Vous n'avez pas encore envoyé votre photo </p><br /><br />");
		}
		?>
		<p class="etu">
			<?php echo("Nom: ".$_SESSION['nom']." ")?><br />
			<?php echo(utf8_encode("Prenom: ".$_SESSION['prenom']." "))?><br />
			<?php echo(utf8_encode("Promotion: ".$_SESSION['promotion']." "))?><br />
			<?php echo("Numéro de groupe: ".$_SESSION['groupe']." ")?>
		</p>
		<br/><br/><br/><br/><br/><br/>
		<form class="form_etu" enctype="multipart/form-data" action="etudiant.php" method="post">
			<input type="hidden" name="MAX_FILE_SIZE" value="40000000" />
			Envoyez votre fichier (en format jpg, jpeg ou png): <br/><br/>
			<input name="picture" type="file" />
			<input type="submit" value="Envoyer le fichier" name="Ajouter" />
			<?php
			if(isset($_POST['Ajouter'])){
				$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
				$uploaddir='image/';
				$extension_upload = strtolower(  substr(  strrchr($_FILES['picture']['name'], '.')  ,1)  );
				$uploadfile = $uploaddir.basename($_SESSION['login'].'.'.$extension_upload);
				echo'<pre>';
				if(move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)){
					echo"Le fichier est valide, et a été téléchargé avec succès. \n";
				}
				else{echo"echec !!!";}
				echo 'Voici quelques informations de débogage :';
				print_r($_FILES);
				echo'</pre>';
			}
			?>
		</form>
		<br/><br/><br/>
		<form class="form_etu2" enctype="multipart/form-data" action="etudiant.php" method="post">
			<input type="hidden" name="MAX_FILE_SIZE" value="40000000" />
			Télécharger votre fichier (en format jpg, jpeg ou png): <br/><br/>
			<input name="picture" type="file" />
			<input type="submit" value="Récuper le fichier" name="Ajouter" />
			<?php
			if(isset($_POST['Ajouter'])){
				$extensions_valides = array( 'jpg' , 'jpeg' , 'png' );
				$uploaddir='image/';
				$extension_upload = strtolower(  substr(  strrchr($_FILES['picture']['name'], '.')  ,1)  );
				$uploadfile = $uploaddir.basename($_SESSION['login'].'.'.$extension_upload);
				echo'<pre>';
				if(move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)){
					echo"Le fichier est valide, et a été téléchargé avec succès. \n";
				}
				else{echo"echec !!!";}
				echo 'Voici quelques informations de débogage :';
				print_r($_FILES);
				echo'</pre>';
			}
			?>
		</form>
		</fieldset>
		<form id="form" method="post">
			<br/> <input class="btn_de" type="submit" value="Déconnexion" name="deco" />
			<?php
				if(isset($_POST['deco'])){
					$_SESSION['login']= "";
					$_SESSION['mdp']= "";
					header("Location:session.php");
				}
			?>
		</form>
	</body>
</html>














