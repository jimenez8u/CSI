<!DOCTYPE html>
<?php
	error_reporting(0);
	session_start();
	
	if(($_SESSION['login']) == null || ($_SESSION['mdp']) == null)
	{
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
		<meta name="viewport" content="width=max-device-width, initial-scale=1" />
		
	</head>
	
	<body>
		
		<form method="post" id="connexion">
			<label class="form_col" for="login">Pseudo :</label>
			<input name="login" id="login" type="text" />
			<label class="form_col" for="pwd">Mot de passe :</label>
			<input name="pwd1" id="pwd1" type="password" />
			<input class="btn_v" type='submit' name='Ajouter' value="Valider" /> 
			<?php
				if(isset($_POST['Ajouter']))
				{
					$db = new PDO("pgsql:host=localhost; port=5432; dbname=CSI_2018_Projet","postgres","admin");
					
					
					$requete = 'SELECT mail,mdp FROM etudiant';
					
					foreach($db->query($requete)as $row)
					{
						$pseudo = $row[0];
						$mdp = $row[1];
						if($pseudo == $val_1 && $mdp = $val_2)
						{
							$_SESSION['login'] = $val_1;
							$_SESSION['mdp'] = $val_2;
							header("Location:CSI.php");
						}
						
					}
					echo "</br> compte inexiant !!";
				}
			?>
		</form>
	</body>
	
</html>