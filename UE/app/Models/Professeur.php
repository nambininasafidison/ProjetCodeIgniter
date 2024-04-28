<?php

  namespace App\Models;
  use CodeIgniter\Model;
  use App\Entities\Recette;

class Professeur extends Model
{
	protected $table = 'Professeur';
	protected $allowedFields =[
		'nomProf'
	];

}

?>
