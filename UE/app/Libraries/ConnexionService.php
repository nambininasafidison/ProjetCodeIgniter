<?php

namespace App\Services;

class ConnexionService
{

	///Liste
	public function testConnexion() { 
	$s = \Config\Services::session();
/*
		$data = [
            'id' => 1,
            'nom' => "Filamatra",
            'prenom' => "Tahiry",
            'mot_de_passe' => "12345678",
            'statut' => 1
          ];*/
		$data = $s->get('UserConnecter');
		return $data;
	}

}
?>
