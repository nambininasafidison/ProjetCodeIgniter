<?php

  namespace App\Models;
  use CodeIgniter\Model;
  use App\Entities\Recette;

class RecetteModel extends Model
{
	protected $table = 'Test';
	protected $returnType = Test::Class;
	protected $allowedFields =[
		'nom',
		'prenom',
	];

}

?>
