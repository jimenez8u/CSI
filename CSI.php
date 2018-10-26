<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>CSI acceuil</title>



  </head>

  <body>
	<h1> CSI</h1>
	
	<?php	
	
		try
		{
			//décommentez la ligne de code "extension=pdo_pgsql" dans le fichier de configuration php.ini de XAMPP
			$db = new PDO("pgsql:host=localhost; port=5433; dbname=CSI_2018_Projet","postgres","admin");
			echo "Connexion OK <br/>";
			
			$requete ='select * from annonce';
			
			foreach($db->query('select * from annonce') as $row)
			{
				$id = $row[0];
				$descritpion = $row[1];
				$categorie = $row[2];
				$idproprietaire= $row[3];
				$datedebut = $row[4];
				$datefin = $row[5];
				$datecloture  = $row[6];
				$nbmaxetu = $row[7];
				$repeat = $row[8];
				$nbrepeat = $row[9];
				$frecrepeat = $row[10];
				$adresse = $row[11];
				$cloture = $row[12];
				
			}
			echo "id :".$id."<br/>";
			echo "descritpion :".$descritpion."<br/>";
			echo "categorie :".$categorie."<br/>";
			echo "id proprietaire :".$idproprietaire."<br/>";
			echo "datedebut :".$datedebut."<br/>";
			echo "datefin :".$datefin."<br/>";
			echo "datecloture :".$datecloture."<br/>";
			echo "nbmaxetu :".$nbmaxetu."<br/>";
			echo "repeat :".$repeat."<br/>";
			echo "nbrepeat :".$nbrepeat."<br/>";
			echo "frecrepeat :".$frecrepeat."<br/>";
			echo "adresse :".$adresse."<br/>";
			echo "cloture :".$cloture."<br/>";
			
		}catch(PDOException $e)
		{
			print "Erreur !: ".$e->getMessage()."<br/>";
		}

	?> 

  </body>
</html>
