<?php

  namespace App\Models;
  use CodeIgniter\Model;
  use App\Entities\Recette;

class ECUE extends Model
{
	protected $table = 'ECUE';
	protected $allowedFields =[
		'nomECUE'
	];

}

?>
