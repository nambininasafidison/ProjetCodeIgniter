<?php

  namespace App\Models;
  use CodeIgniter\Model;

class Professeur extends Model
{
	protected $table = 'Professeur';
	protected $allowedFields =[
		'nomProf',
		'prenomProf',
		'idGrade',
		'adresse',
		'tel',
		'mail',
		'vacataire',
		'matricule',
		'CIN',
	];

}

?>
