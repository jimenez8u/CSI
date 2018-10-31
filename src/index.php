<?php

session_start();

//Faire un controler connexion
/*
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
*/

/*
 * Utilisation des différente vue
 * */
//use \vue\VueAccueil as VueAccueil;

/*
 * Utilisation des controlers
 */
//use \control\ControlerInscription as ControlerInscription;


//-----------------------------------------------------
//On vérifie que le client est connecté
$ControlerConnexion=new ControlerConnexion($info);
$indiceDeConnexion=$ControlerConnexion->etreConnecter();

//-----------------------------------------------------
//Si la recherche de l'url n'est pas correcte
$app->notFound(function() use($app, $info, $indiceDeConnexion) {
	$vue=new VueErreur404($info);
	$vue->render($indiceDeConnexion);
});

//---------------------/--------------------------------
$app->get('/', function() use ($info, $indiceDeConnexion){
	$vue=new VueAccueil($info);
	$vue->render($indiceDeConnexion);
});

//---------------------/boutique--------------------------------
$app->get('/boutique', function() use ($info, $indiceDeConnexion){
	$vue=new VueBoutique($info);
	$vue->render($indiceDeConnexion);
});

//---------------------/part--------------------------------
$app->get('/part', function() use ($info, $indiceDeConnexion){
	$vue=new VuePartenaire($info);
	$vue->render($indiceDeConnexion);
});

//---------------------/bar--------------------------------
$app->get('/bar', function() use ($info, $indiceDeConnexion){
	$vue=new VueBarachat($info);
	$vue->render($indiceDeConnexion);
});

//---------------------/contact--------------------------------
$app->get('/contact', function() use ($info, $indiceDeConnexion){
	$vue=new VueContact($info);
	$vue->render($indiceDeConnexion);
});


//----------------------/connexion----------------------------
$app->get('/connexion', function() use ($info, $indiceDeConnexion){
	$vue=new VueConnexion($info);
	$vue->render($indiceDeConnexion);
});

$app->post('/demandeConnexion', function() use ($info){
	$control=new ControlerConnexion($info);
	$control->connecter();
});

//---------------------/inscription--------------------------
$app->get('/inscriptionValider',function () use($info, $indiceDeConnexion){
	$vue=new VueInscriptionValider($info);
	$vue->render($indiceDeConnexion);
});

$app->post('/inscription',function () use($info){
	$control=new ControlerInscription($info);
	$control->inscrire();
});

//----------------------/deconnexion--------------------------
$app->get('/deconnexion', function() use ($info){
	$control=new ControlerConnexion($info);
	$control->deconnecter();
});

//----------------------/test--------------------------
$app->get('/article', function() use ($info, $indiceDeConnexion){
	$vue=new VueArticle($info);
	$vue->render($indiceDeConnexion);
});

//----------------------/test--------------------------
$app->get('/test', function() use ($info, $indiceDeConnexion){
	$vue=new VueTest($info);
	$vue->render($indiceDeConnexion);
});

$app->run();