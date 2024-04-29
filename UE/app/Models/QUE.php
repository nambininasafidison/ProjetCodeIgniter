<?php

  namespace App\Models;
  use CodeIgniter\Model;
  use App\Entities\Recette;

class QUE extends Model
{
	protected $table = 'QUE';
	protected $allowedFields =[
		'nomQUE'
	];

}

?>
