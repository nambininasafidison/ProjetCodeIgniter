<?php

  namespace App\Models;
  use CodeIgniter\Model;

class Etudiant extends Model
{
    protected $db="mit";
	protected $table = 'Inscription';
	protected $allowedFields =[
	];

    public function getTotal($condition){
        return $this->where($condition)->countAllResults();
    }
}

?>
