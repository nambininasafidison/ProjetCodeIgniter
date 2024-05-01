<?php

  namespace App\Models;
  use CodeIgniter\Model;
  use App\Entities\Recette;

class Classification extends Model
{
	protected $table = 'Classification';
	protected $allowedFields =[
		'niveau',
		'semestre',
		'ue',
		'ecue',
		'heure',
		'credit',
		'prof',
		'enseignement',
		'groupe'
	];

	public function divide($condition){
		$data=array();
		$tmp			=  $this		->select('UE.nomUe, UE.id as id_ue')
										->join('Niveau','Classification.niveau = Niveau.id','inner')
										->join('Semestre','Classification.semestre = Semestre.id','inner')
										->join('Professeur','Classification.prof = Professeur.id','inner')
										->join('UE','Classification.ue = UE.id','inner')
										->join('ECUE','Classification.ecue = ECUE.id','inner')
										->distinct()
										->where($condition)
										->findAll();
		$i=0;
		foreach($tmp as $ue){
			$condition["UE.nomUe"]=$ue["nomUe"];
			$data[$i][]=$ue["id_ue"];
			$data[$i][]=$ue["nomUe"];
			$data[$i][] = $this	->select('Classification.id,ECUE.nomECUE,Classification.heure,Classification.credit,Professeur.nomProf,Professeur.prenomProf')
										->join('Niveau','Classification.niveau = Niveau.id','inner')
										->join('Semestre','Classification.semestre = Semestre.id','inner')
										->join('Professeur','Classification.prof = Professeur.id','inner')
										->join('UE','Classification.ue = UE.id','inner')
										->join('ECUE','Classification.ecue = ECUE.id','inner')
										->distinct()
										->where($condition)
										->findAll();					
			$i++;
		}
		return $data;
	}

	public function divideWhere($condition,$like){

		$data=array();
		$tmp			=  $this		->select('UE.nomUe, UE.id as id_ue')
										->join('Niveau','Classification.niveau = Niveau.id','inner')
										->join('Semestre','Classification.semestre = Semestre.id','inner')
										->join('Professeur','Classification.prof = Professeur.id','inner')
										->join('UE','Classification.ue = UE.id','inner')
										->join('ECUE','Classification.ecue = ECUE.id','inner')
										->distinct()
										->where($condition)
										->findAll();
		$i=0;
		foreach($tmp as $ue){
			$condition["UE.nomUe"]=$ue["nomUe"];
			$data[$i][]=$ue["id_ue"];
			$data[$i][]=$ue["nomUe"];
			$this	->	select('Classification.id,ECUE.nomECUE,Classification.heure,Classification.credit,Professeur.nomProf,Professeur.prenomProf')
					->	join('Niveau','Classification.niveau = Niveau.id','inner')
					->	join('Semestre','Classification.semestre = Semestre.id','inner')
					->	join('Professeur','Classification.prof = Professeur.id','inner')
					->	join('UE','Classification.ue = UE.id','inner')
					->	join('ECUE','Classification.ecue = EECUE.id','inner')
					->	distinct();
			$this	->	groupStart()
					->	like($like[0]);			
			foreach($like as $lk){
				$this->orLike($lk);
			}
			$this->groupEnd();
			$data[$i][]= $this	->	where($condition)
								->	findAll();
			$i++;
		}			
		return $data;
	}
}
?>
