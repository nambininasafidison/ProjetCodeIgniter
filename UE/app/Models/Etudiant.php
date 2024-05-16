<?php

  namespace App\Models;
  use CodeIgniter\Model;

class Etudiant extends Model
{
	protected $table = 'inscription';
	protected $allowedFields =[
		"grade","niveau"
	];

    public function getTotal($condition){
        return (int) ($this->where($condition)->countAllResults() / 20);
    }
}

?>
