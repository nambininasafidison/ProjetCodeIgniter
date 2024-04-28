<?php
	namespace App\Models;
	use CodeIgniter\Model;

class Db extends Model{
	protected $table = "etudiant";
	protected $allowedFields = ["nom","prenom","dNaissance","lNaissance","genre","gmail","tel"];
}

?>
