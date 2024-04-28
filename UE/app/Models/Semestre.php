<?php

  namespace App\Models;
  use CodeIgniter\Model;
  use App\Entities\Recette;

class Semestre extends Model
{
	protected $table = 'Semestre';
	protected $allowedFields =[
		'nomSemestre'
	];

}

?>
