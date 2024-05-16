<?php

  namespace App\Models;
  use CodeIgniter\Model;
  use App\Entities\Recette;

class Niveau extends Model
{
	protected $table = 'Niveau';
	protected $allowedFields =[
		'nomNiveau'
	];

}

?>
