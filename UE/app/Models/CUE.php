<?php

  namespace App\Models;
  use CodeIgniter\Model;
  use App\Entities\Recette;

class CUE extends Model
{
	protected $table = 'CUE';
	protected $allowedFields =[
		'nomCUE'
	];

}

?>
