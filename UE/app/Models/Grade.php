<?php namespace App\Models;
use CodeIgniter\Model;

class Grade extends Model {
    protected $table="grade";
    protected $allowedFields = [
        "id",
       "nomGrade",
    ];
}

?>