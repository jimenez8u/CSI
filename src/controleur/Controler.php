<?php

namespace control;

use Illuminate\Database\Capsule\Manager as DB;

class Controler{

	protected $requette;

	public function __construct($re){
		$this->requette=$re;		
		try
		{
			$db = new PDO("pgsql:host=".$initial["host"]."; port=".$initial["port"]."; dbname=".$initial["database"],$initial["driver"],$initial["password"]);
			
		}
		catch(PDOException $e)
		{
			print "Erreur !: ".$e->getMessage()."<br/>";
		}
	}

}