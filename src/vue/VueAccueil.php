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

<?php

namespace vue;

use \control\ControlerAccueil as ControlerAccueil;

class VueAccueil{

	protected $tabObjet;

	public function __construct($tabobj){
		$this->tabObjet=$tabobj;
	}

	public function render($indice){
		//(new VueHeader($root))->ecrireHeader($indice);

		$control=new ControlerAccueil($this->tabObjet);
		$listePart=$control->AfficherPart();
		
		
		
		$scrib=$scrib.'
				<section id=promo>';
		$scrib=$scrib.'<a href="'.$root.'/article?num='.$listePart[0][0].'"><img src="images/'.$listePart[0][2].'" id=artPromoFirst></img></a>';
		for($i=1;$i<6;$i++){
			$scrib=$scrib.'<a href="'.$root.'/article?num='.$listePart[$i][0].'"><img src="images/'.$listePart[$i][2].'" class=artPromo></img></a>';
		}
		
		$scrib=$scrib.'
				</section>
				
				<section class="container">
					<h2>Nos derniers articles</h2>
			
				<div class="row">';
				
		$control=new ControlerAccueil($this->tabObjet);
		$listePart=$control->AfficherArticles();
						
		foreach($listePart as $key=>$value){
			$scrib=$scrib.'
					<a href="'.$root.'/article?num='.$listePart[$key][0].'">
						<div class="col-sm-3 articles">
							<p>'.$listePart[$key][1].'</p>
							<img src="images/'.$listePart[$key][2].'" class="imgart"></img>
						</div></img>
					</a>';
		}

		$scrib=$scrib.'		
				</div>			
							
				</section>
			</body>
		</html>';

		echo $scrib;
	}

}
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
		</form>
	</body>
	
</html>