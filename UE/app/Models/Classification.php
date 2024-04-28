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
		'que',
		'heure',
		'credit',
		'prof'
	];

	public function divide($condition){
		$data=array();
		$tmp			=  $this		->select('UE.nomUe, UE.id as id_ue')
										->join('Niveau','Classification.niveau = Niveau.id','inner')
										->join('Semestre','Classification.semestre = Semestre.id','inner')
										->join('Professeur','Classification.prof = Professeur.id','inner')
										->join('UE','Classification.ue = UE.id','inner')
										->join('QUE','Classification.que = QUE.id','inner')
										->distinct()
										->where($condition)
										->findAll();
		$i=0;
		foreach($tmp as $ue){
			$condition["UE.nomUe"]=$ue["nomUe"];
			$data[$i][]=$ue["id_ue"];
			$data[$i][]=$ue["nomUe"];
			$data[$i][] = $this	->select('Classification.id,QUE.nomQUE,Classification.heure,Classification.credit,Professeur.nomProf')
										->join('Niveau','Classification.niveau = Niveau.id','inner')
										->join('Semestre','Classification.semestre = Semestre.id','inner')
										->join('Professeur','Classification.prof = Professeur.id','inner')
										->join('UE','Classification.ue = UE.id','inner')
										->join('QUE','Classification.que = QUE.id','inner')
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
										->join('QUE','Classification.que = QUE.id','inner')
										->distinct()
										->where($condition)
										->findAll();
		$i=0;
		foreach($tmp as $ue){
			$condition["UE.nomUe"]=$ue["nomUe"];
			$data[$i][]=$ue["id_ue"];
			$data[$i][]=$ue["nomUe"];
			$data[$i][] = $this	->select('Classification.id,QUE.nomQUE,Classification.heure,Classification.credit,Professeur.prof')
										->join('Niveau','Classification.niveau = Niveau.id','inner')
										->join('Semestre','Classification.semestre = Semestre.id','inner')
										->join('Professeur','Classification.prof = Professeur.id','inner')
										->join('UE','Classification.ue = UE.id','inner')
										->join('QUE','Classification.que = QUE.id','inner')
										->distinct()
										->where($condition)
										->like($like[0]);		
			$i++;	
		}
			foreach($like as $lk){
				$this->orLike($lk);
			}
			$data[$ue]=$this->findAll();			

			foreach($like as $lk){
				$this->orLike($lk);
			}
			$data[$ue]=$this->findAll();			
		return $data;
	}
}

?>
