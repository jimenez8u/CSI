<?php

namespace model;

class ModelEtudiant{
	
	protected $idEtu = 'id_etu';
	protected $nomEtu = 'nom';
	protected $prenomEtu = 'prenom';
	protected $mailEtu = 'mail';
	protected $mdpEtu = 'mdp';
	
	public $donnees
	
	public function __construct(array $attributs){
		$this->donnees = $attributs;
	}
	
}
