<?php

  namespace App\Models;
  use CodeIgniter\Model;
  use App\Entities\Recette;

class UE extends Model
{
	protected $table = 'UE';
	protected $allowedFields =[
		'nomUe'
	];

}

?>
