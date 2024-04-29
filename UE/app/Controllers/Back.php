<?php

namespace App\Controllers;
use App\Models\Classification;
use App\Models\Niveau;
use App\Models\QUE;
use App\Models\Semestre;
use App\Models\UE;
use App\Models\Professeur;

class Back extends BaseController
{
	public $npage = 10;
    public function index(): string
    {
		//listAll
		$classify = new Classification();
		$data["liste"] = $classify	->select('Classification.id , Classification.ue as id_ue')
									->join('Niveau','Classification.niveau = Niveau.id','inner')
									->join('Semestre','Classification.semestre = Semestre.id','inner')
									->join('Professeur','Classification.prof = Professeur.id','inner')
									->join('UE','Classification.ue = UE.id','inner')
									->join('QUE','Classification.que = QUE.id','inner')
									->findAll();
		return view('list',$data);
	}

    public function filter(): string
    {//filter par niveau sns
		//Les variables
		$this->response->setContentType('application/json');
		
		$classify = new Classification();
		$condition["Classification.niveau"] = 1;
		$condition["Classification.semestre"] = 1;

		///CLassifier les datas
		$data["L1"]["S1"]=$classify->divide($condition);

		$condition["Classification.semestre"]=2;
		$data["L1"]["S2"]=$classify->divide($condition);

		$condition["Classification.niveau"]=2;
		$condition["Classification.semestre"]=3;
		$data["L2"]["S3"]=$classify->divide($condition);

		$condition["Classification.semestre"]=4;
		$data["L2"]["S4"]=$classify->divide($condition);

		$condition["Classification.niveau"]=3;
		$condition["Classification.semestre"]=5;
		$data["L3"]["S5"]=$classify->divide($condition);

		$condition["Classification.semestre"]=6;
		$data["L3"]["S6"]=$classify->divide($condition);

		$condition["Classification.niveau"]=4;
		$condition["Classification.semestre"]=7;
		$data["M1"]["S7"]=$classify->divide($condition);

		$condition["Classification.semestre"]=8;
		$data["M1"]["S8"]=$classify->divide($condition);

		$condition["Classification.niveau"]=5;
		$condition["Classification.semestre"]=9;
		$data["M2"]["S9"]=$classify->divide($condition);

		$condition["Classification.semestre"]=10;
		$data["M2"]["S10"]=$classify->divide($condition);

		return json_encode($data);
	}

    public function form_search(): string
    {
		//filtrer
		$to_search = $this->request->getVar("searched");
		$champ=["Classification.id","Classification.heure","Classification.credit","Professeur.nomProf","Niveau.nomNiveau","Semestre.nomSemestre","UE.nomUe","QUE.nomQUE"];

		foreach($champ as $c){
			$like[][$c]=$to_search;
		}

		$classify = new Classification();
		$classify	->select('Classification.id , Classification.ue as id_ue')
					->join('Niveau','Classification.niveau = Niveau.id','inner')
					->join('Semestre','Classification.semestre = Semestre.id','inner')
					->join('Professeur','Classification.prof = Professeur.id','inner')
					->join('UE','Classification.ue = UE.id','inner')
					->join('QUE','Classification.que = QUE.id','inner')
					->like($like[0]);
		foreach($like as $l){
			$classify->orLike($l);
		}
		$data["liste"] = $classify->findAll();
		$data["to_search"]=$to_search;


		return view('filter',$data);
	}

    public function search($to_search): string
    {
		//recherche
		$this->response->setContentType('application/json');
		$champ=["Classification.id","Classification.heure","Classification.credit","Professeur.nomProf","Niveau.nomNiveau","Semestre.nomSemestre","UE.nomUe","QUE.nomQUE"];

		foreach($champ as $c){
			$like[][$c]=$to_search;
		}

		$classify = new Classification();

		$condition["Classification.niveau"] = 1;
		$condition["Classification.semestre"] = 1;

		///CLassifier les datas
		$data["L1"]["S1"]=$classify->divideWhere($condition,$like);

		$condition["Classification.semestre"]=2;
		$data["L1"]["S2"]=$classify->divideWhere($condition,$like);

		$condition["Classification.niveau"]=2;
		$condition["Classification.semestre"]=3;
		$data["L2"]["S3"]=$classify->divideWhere($condition,$like);

		$condition["Classification.semestre"]=4;
		$data["L2"]["S4"]=$classify->divideWhere($condition,$like);

		$condition["Classification.niveau"]=3;
		$condition["Classification.semestre"]=5;
		$data["L3"]["S5"]=$classify->divideWhere($condition,$like);

		$condition["Classification.semestre"]=6;
		$data["L3"]["S6"]=$classify->divideWhere($condition,$like);

		$condition["Classification.niveau"]=4;
		$condition["Classification.semestre"]=7;
		$data["M1"]["S7"]=$classify->divideWhere($condition,$like);

		$condition["Classification.semestre"]=8;
		$data["M1"]["S8"]=$classify->divideWhere($condition,$like);

		$condition["Classification.niveau"]=5;
		$condition["Classification.semestre"]=9;
		$data["M2"]["S9"]=$classify->divideWhere($condition,$like);

		$condition["Classification.semestre"]=10;
		$data["M2"]["S10"]=$classify->divideWhere($condition,$like);

		return json_encode($data);
    }

    public function form(): string
    {
		//passer à l'ajout
        return view('ajout');
    }

    public function insert()
    {
		//Databases
		$classify = new Classification();
		$ue = new UE();
		$que = new QUE();
		$prof = new Professeur();

		//get UE and QUE inputs
		$data_UE=[
			'nomUe' => $this->request->getVar("name0"),
		];

		$data_QUE= array();
		$data_Prof= array();
		$data_hour=array();
		$data_credit=array();

		if(!empty($this->request->getVar("number"))){
			$num = $this->request->getVar("number");
			for($i=1;$i<=$num;$i++){
				$data_QUE[]=[
					"nomQUE" => $this->request->getVar("name".$i)
				];
				$data_Prof[]=[
					"nomProf" => $this->request->getVar("prof".$i)
				];
				$data_hour[]=[
					"heure" => $this->request->getVar("hour".$i)
				];
				$data_credit[]=[
					"credit" => $this->request->getVar("credit".$i)
				];
			}
		}
		else{
			$num = 1;
			$data_QUE[]=[
				'nomQUE' => $this->request->getVar("name0")
				];
			$data_Prof[]=[
				"nomProf" => $this->request->getVar("prof0")
			];
			$data_hour[]=[
				"heure" => $this->request->getVar("hour0")
			];
			$data_credit[]=[
				"credit" => $this->request->getVar("credit0")
			];
		}

		//insert all
		$ue->ignore(true)->insert($data_UE);

		foreach($data_QUE as $dt){
			$que->ignore(true)->insert($dt);
		}
		foreach($data_Prof as $pr){
			$prof->ignore(true)->insert($pr);
		}
		//Get all ids
		$id_ue=$ue ->where($data_UE)
			->findAll();

		for($i=0;$i<$num;$i++){
			$id_que[]=$que ->where($data_QUE[$i])
				->findAll();
			$id_prof[]=$prof ->where($data_Prof[$i])
				->findAll();
		}

		//insert to Classification table

		for($i=0;$i<$num;$i++){
			$toInsert=[
				'niveau' => $this->request->getVar("level"),
				'semestre' => $this->request->getVar("semester"),
				'heure' => $data_hour[$i],
				'credit' => $data_credit[$i],
				'que' => $id_que[$i][0]["id"],
				'prof' => $id_prof[$i][0]["id"],
				'ue' => $id_ue[0]["id"]
			];
			$classify->ignore(true)->insert($toInsert);
		}

		return redirect()->to('Back/index');
	}
	
/*  public function modify_ue($id)
    {
		//passer à la modification
		$classify = new Classification();
		$ue = new UE();
		$que = new QUE();
		$prof = new Professeur();
		$niveau = new Niveau();
		$semestre = new Semestre();

		$inp["id"]=$id;
		$data["liste"] = $classify->where($inp)->findAll(); //return $data["liste"][0]

		$tmp=$niveau->where('id',$data["liste"][0]["niveau"])->findAll(); //get Level's name
		$data["liste"][0]["nonNiveau"]=$tmp[0]["nomNiveau"];//add it in the table we'll pass to view

		$tmp=$semestre->where('id',$data["liste"][0]["semestre"])->findAll();
		$data["liste"][0]["nonSemestre"]=$tmp[0]["nomSemestre"];

		$tmp=$prof->where('id',$data["liste"][0]["prof"])->findAll();
		$data["liste"][0]["nonProf"]=$tmp[0]["nomProf"];

		$tmp=$ue->where('id',$data["liste"][0]["ue"])->findAll();
		$data["liste"][0]["nonUe"]=$tmp[0]["nomUe"];

		$tmp=$que->where('id',$data["liste"][0]["que"])->findAll();
		$data["liste"][0]["nonUe"]=$tmp[0]["nomQUE"];

		return view('form_modify',$data);

	}
*/

/*  public function update_ue($id)
    {
		//inserer apres post
		//Databases
		$classify = new Classification();
		$ue = new UE();
		$que = new QUE();
		$prof = new Professeur();

		//get UE and QUE inputs
		$data_UE=[
			'nomUe' => $this->request->getVar("name0"),
		];

		$data_QUE= array();
		$data_Prof= array();
		$data_hour=array();
		$data_credit=array();

		if(!empty($this->request->getVar("number"))){
			$num = $this->request->getVar("number");
			for($i=1;$i<=$num;$i++){
				$data_QUE[]=[
					"nomQUE" => $this->request->getVar("name".$i)
				];
				$data_Prof[]=[
					"nomProf" => $this->request->getVar("prof".$i)
				];
				$data_hour[]=[
					"heure" => $this->request->getVar("hour".$i)
				];
				$data_credit[]=[
					"credit" => $this->request->getVar("credit".$i)
				];
			}
		}
		else{
			$num = 1;
			$data_QUE[]=[
				'nomQUE' => $this->request->getVar("name0")
				];
			$data_Prof[]=[
				"nomProf" => $this->request->getVar("prof0")
			];
			$data_hour[]=[
				"heure" => $this->request->getVar("hour0")
			];
			$data_credit[]=[
				"credit" => $this->request->getVar("credit0")
			];
		}

		//insert all
		$ue->ignore(true)->insert($data_UE);

		foreach($data_QUE as $dt){
			$que->ignore(true)->insert($dt);
		}
		foreach($data_Prof as $pr){
			$prof->ignore(true)->insert($pr);
		}
		//Get all ids
		$id_ue=$ue ->where($data_UE)
			->findAll();

		for($i=0;$i<$num;$i++){
			$id_que[]=$que ->where($data_QUE[$i])
				->findAll();
			$id_prof[]=$prof ->where($data_Prof[$i])
				->findAll();
		}

		//insert to Classification table

		for($i=0;$i<$num;$i++){
			$toInsert=[
				'niveau' => $this->request->getVar("level"),
				'semestre' => $this->request->getVar("semester"),
				'heure' => $data_hour[$i],
				'credit' => $data_credit[$i],
				'que' => $id_que[$i][0]["id"],
				'prof' => $id_prof[$i][0]["id"],
				'ue' => $id_ue[0]["id"]
			];
			$classify->update($id,$toInsert);
		}
		return redirect()->to('Back/index');
    }
*/

	public function update_que($id){
		//inserer apres post
		//Databases
		$classify = new Classification();
		$que = new QUE();
		$prof = new Professeur();

		//get UE and QUE inputs

		$data_QUE=[
			'nomQUE' => $this->request->getVar("nameOfQue")
			];
		$data_Prof=[
			"nomProf" => $this->request->getVar("nameOfProf")
		];
		$data_hour=[
			"heure" => $this->request->getVar("nameOfHours")
		];
		$data_credit=[
			"credit" => $this->request->getVar("valueOfCredit")
		];

		//insert all
		$que->ignore(true)->insert($data_QUE);
		$prof->ignore(true)->insert($data_Prof);
		//Get all ids
			$id_que=$que ->where($data_QUE)
				->findAll();
			$id_prof=$prof ->where($data_Prof)
				->findAll();

		//insert to Classification table
		$toInsert=[
			'heure' => $this->request->getVar("nameOfHours"),
			'credit' => $this->request->getVar("valueOfCredit"),
			'que' => $id_que[0]["id"],
			'prof' => $id_prof[0]["id"],
		];
		$classify->ignore(true)->update($id,$toInsert);
		return redirect()->to('Back/index');	
	}

    public function delete_que($id_que)
    {
		//delete
		$classify = new Classification();
		$classify->delete($id_que);
		return redirect()->to('Back/index');
    }

	public function delete_ue()
    {
		//delete
		$id_ue = $this->request->getVar("ue");
		$classify = new Classification();
		$classify	->	where('ue',$id_ue)
					->	delete();
		return redirect()->to('Back/index');
    }
}

?>
