<?php

namespace App\Controllers;
use App\Models\Classification;
use App\Models\Niveau;
use App\Models\EECUE;
use App\Models\Semestre;
use App\Models\UE;
use App\Models\Professeur;
use App\Models\Enseignement;
use App\Models\Etudiant;

class Back extends BaseController
{
	public $npage = 10;

	///Liste
    public function index(): string
    {
		//listAll
		$classify = new Classification();
		$data["liste"] = $classify	->select('Classification.id , Classification.ue as id_ue')
									->join('Niveau','Classification.niveau = Niveau.id','inner')
									->join('Semestre','Classification.semestre = Semestre.id','inner')
									->join('Professeur','Classification.prof = Professeur.id','inner')
									->join('UE','Classification.ue = UE.id','inner')
									->join('ECUE','Classification.ecue = ECUE.id','inner')
									->findAll();
		return view('list',$data);
	}
	///Get form datas of research
    public function form_search(): string
    {
		//filtrer
		$to_search = $this->request->getVar("searched");
		$champ=["Classification.id","Classification.heure","Classification.credit","Professeur.nomProf","Niveau.nomNiveau","Semestre.nomSemestre","UE.nomUe","ECUE.nomECUE"];

		foreach($champ as $c){
			$like[][$c]=$to_search;
		}

		$classify = new Classification();
		$classify	->select('Classification.id , Classification.ue as id_ue')
					->join('Niveau','Classification.niveau = Niveau.id','inner')
					->join('Semestre','Classification.semestre = Semestre.id','inner')
					->join('Professeur','Classification.prof = Professeur.id','inner')
					->join('UE','Classification.ue = UE.id','inner')
					->join('ECUE','Classification.ecue = ECUE.id','inner')
					->like($like[0]);
		foreach($like as $l){
			$classify->orLike($l);
		}
		$data["liste"] = $classify->findAll();
		$data["to_search"]=$to_search;


		return view('filter',$data);
	}
	///Get form datas of recapitulation
	public function form_recap(): string
	{
		$all_fields=["Niveau","Semestre","UE","ECUE","Heure","Credit","Professeur","Type d'enseignement","Groupe"];
		if(!empty($this->request->getVar("field"))){
			$to_search=$this->request->getVar("to_search");
			$field=$this->request->getVar("field");
		}
		else{
			$to_search="";
			$field="Niveau";
		}

		if($field == "Niveau")
			$champ=["Niveau.id","Niveau.nomNiveau"];
		if($field == "Semestre")
			$champ = ["Semestre.id","Semestre.nomSemestre"];
		if($field == "Professeur")
			$champ = ["Professeur.nomProf","Professeur.prenomProf","Professeur.idGrade","Professeur.adresse","Professeur.tel","Professeur.mail","Professeur.vacataire","Professeur.matricule","Professeur.CIN"];
		if($field == "UE")
			$champ = ["UE.id","UE.nomUe"];
		if($field == "ECUE")
			$champ = ["ECUE.id","ECUE.nomECUE"];
		if($field == "Credit")
			$champ = ["Classification.credit"];
		if($field == "Enseignement"){
			$champ = ["Enseignement.id","Enseignement.type"];	
		}
		foreach($champ as $c){
			$like[][$c]=$to_search;
		}

		$classify = new Classification();
		$classify	->select('Niveau.nomNiveau as Niveau,Semestre.nomSemestre as Semestre,UE.nomUe as UE,ECUE.nomECUE as ECUE,Classification.heure as Heure, Classification.credit as Credit,Enseignement.type as Enseignement, Classification.groupe as Groupe, Professeur.nomProf as NomProf, Professeur.prenomProf as PrenomProf, Professeur.id as id_prof')
					->join('Niveau','Classification.niveau = Niveau.id','inner')
					->join('Semestre','Classification.semestre = Semestre.id','inner')
					->join('Professeur','Classification.prof = Professeur.id','inner')
					->join('Enseignement','Classification.enseignement = Enseignement.id','inner')
					->join('UE','Classification.ue = UE.id','inner')
					->join('ECUE','Classification.ecue = ECUE.id','inner')
					->like($champ[0],$to_search);
					foreach($champ as $ch){
						$classify->orLike($ch,$to_search);
					}
		$data["liste"] = $classify	->findAll();		
		$data["to_search"] = $to_search;
		$data["field"]=$field;
		if($field == "Professeur"){
			$data["id_prof"]= $data["liste"][0]["id_prof"];
		}

		return view("recap",$data);
	}

	///Datas envoyEs par Json	
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

	public function dataToFilter($like){
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

		return $data;
	}

	public function search($to_search): string
    {
		//recherche
		$this->response->setContentType('application/json');
		$champ=["Classification.id","Classification.heure","Classification.credit","Professeur.nomProf","Niveau.nomNiveau","Semestre.nomSemestre","UE.nomUe","ECUE.nomECUE"];

		foreach($champ as $c){
			$like[][$c]=$to_search;
		}
		$data = $this->dataToFilter($like);
		return json_encode($data);
    }

	public function DataRecap($field,$to_search): string
	{
		//recherche
		$this->response->setContentType('application/json');
		if($field == "Niveau")
			$champ=["Niveau.id","Niveau.nomNiveau"];
		if($field == "Semestre")
			$champ = ["Semestre.id","Semestre.nomSemestre"];
		if($field == "Professeur")
			$champ = ["Professeur.nomProf","Professeur.prenomProf","Professeur.grade","Professeur.adresse","Professeur.tel","Professeur.mail","Professeur.vacataire","Professeur.matricule","Professeur.CIN"];
		if($field == "UE")
			$champ = ["UE.id","UE.nomUe"];
		if($field == "ECUE")
			$champ = ["ECUE.id","ECUE.nomECUE"];
		if($field == "Credit")
			$champ = ["Classification.credit"];
		if($field == "Type d'enseignement")
			$champ = ["Enseignement.id","Enseignement.type"];	

		foreach($champ as $c){
			$like[][$c]=$to_search;
		}
		$data = $this->dataToFilter($like);
		return json_encode($data);		
	}

	public function lesProf($id_prof){
		$this->response->setContentType('application/json');
		$prof = new Professeur();
		$data=$prof		->select("Professeur.*,grade.nomGrade as grade")
						->join("grade","Professeur.idGrade = grade.id","inner")
						->where("Professeur.id",$id_prof)
						->findAll();
		return json_encode($data);
	}

	public function nEtudiant(){
		$this->response->setContentType('application/json');
		$etudiants = new Etudiant();
		$level = ["1","2","3"];
		foreach($level as $l){
			$condition=[
				"grade" => "L",
				"niveau" => $l
			];
			$data[$l]= $etudiants->getTotal($condition);
		}
		$level = ["1","2"];
		foreach($level as $l){
			$condition=[
				"grade" => "M",
				"niveau" => $l
			];
			$data[$l]= $etudiants->getTotal($condition);
		}
		return json_encode($data);		
	}

	///Ajout UE
    public function form(): string
    {
		//passer à l'ajout
		$profs = new Professeur();
		$data["prof"] = $profs->select('id,nomProf,prenomProf')->findAll();

        return view('ajout',$data);
    }

/*
    public function insert()
    {
		//Databases
		$classify = new Classification();
		$ue = new UE();
		$ecue = new ECUE();
		$prof = new Professeur();

		//get UE and ECUE inputs
		$data_UE=[
			'nomUe' => $this->request->getVar("name0"),
		];

		$data_ECUE= array();
		$data_Prof= array();
		$data_hour=array();
		$data_credit=array();

		if(!empty($this->request->getVar("number"))){
			$num = $this->request->getVar("number");
			for($i=1;$i<=$num;$i++){
				$data_ECUE[]=[
					"nomECUE" => $this->request->getVar("name".$i)
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
			$data_ECUE[]=[
				'nomECUE' => $this->request->getVar("name0")
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

		foreach($data_ECUE as $dt){
			$ecue->ignore(true)->insert($dt);
		}
		foreach($data_Prof as $pr){
			$prof->ignore(true)->insert($pr);
		}
		//Get all ids
		$id_ue=$ue ->where($data_UE)
			->findAll();

		for($i=0;$i<$num;$i++){
			$id_ecue[]=$ecue ->where($data_ECUE[$i])
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
				'ecue' => $id_ecue[$i][0]["id"],
				'prof' => $id_prof[$i][0]["id"],
				'ue' => $id_ue[0]["id"]
			];
			$classify->ignore(true)->insert($toInsert);
		}

		return redirect()->to('Back/index');
	}
*/

	public function insert()
	{
		//Databases
		$classify = new Classification();
		$ue = new UE();
		$ecue = new ECUE();
		$prof = new Professeur();
		$etudiants = new Inscription();
		$niveau = new Niveau();

		//Get number
		$niv = $niveau ->where("id",$this->request->getVar("level"))->findAll();		
		$condition=[
			"grade" => $niv[0]["nomNiveau"][0],
			"niveau" => $niv[0]["nomNiveau"][1]
		];
		$count= $etudiants->getTotal($condition);
		$count = (int)($count / 20);

		//get UE and ECUE inputs
		$data_UE=[
			'nomUe' => $this->request->getVar("name0"),
		];

		$data_ECUE= array();
		$data_Prof= array();
		$data_hour=array();
		$data_credit=array();

		if(!empty($this->request->getVar("number"))){
			$num = $this->request->getVar("number");
			for($i=1;$i<=$num;$i++){
				$data_ECUE[]=[
					"nomECUE" => $this->request->getVar("name".$i)
				];
				$data_Prof[]=[
					"nomProf" => $this->request->getVar("prof".$i)
				];
				$data_credit[]=[
					"credit" => $this->request->getVar("credit".$i)
				];				
				$data_hour[]=[
					"heure" => (int)(10* $this->request->getVar("credit".$i) )
				];
			}
		}
		else{
			$num = 1;
			$data_ECUE[]=[
				'nomECUE' => $this->request->getVar("name0")
				];
			$data_Prof[]=[
				"nomProf" => $this->request->getVar("prof0")
			];
			$data_credit[]=[
				"credit" => $this->request->getVar("credit0")
			];
			$data_hour[]=[
				"heure" => (int)(10*$this->request->getVar("credit0"))
			];
		}

		//insert all
		$ue->ignore(true)->insert($data_UE);

		foreach($data_ECUE as $dt){
			$ecue->ignore(true)->insert($dt);
		}
		//Get all ids
		$id_ue=$ue ->where($data_UE)
			->findAll();

		for($i=0;$i<$num;$i++){
			$id_ecue[]=$ecue ->where($data_ECUE[$i])
				->findAll();
		}

		//insert to Classification table
		for($i=0;$i<$num;$i++){
			$toInsert=[
				'niveau' => $this->request->getVar("level"),
				'semestre' => $this->request->getVar("semester"),
				'heure' => ($data_credit[$i] * 10),
				'credit' => $data_credit[$i],
				'ecue' => $id_ecue[$i][0]["id"],
				'prof' => $data_Prof[$i]["nomProf"],
				'ue' => $id_ue[0]["id"],
				'enseignement' => "ET"
			];
			$classify->ignore(true)->insert($toInsert);
			if(!empty($this->request->getVar("nameED0G1"))||!empty($this->request->getVar("nameED1G1"))){
				for($n=0;$n<$count;$n++){						
					$toInsert["enseignement"]="ED";
					$toInsert["groupe"]=$count;
					if(!empty($this->request->getVar("name0")))$toInsert["prof"]=$this->request->getVar("profED".$i."G".$n);
					else $toInsert["prof"]=$this->request->getVar("profED".($i+1)."G".$n);
					$classify->ignore(true)->insert($toInsert);
				}
			}
			if(!empty($this->request->getVar("nameEP0G1"))||!empty($this->request->getVar("nameEP1G1"))){		
				for($n=0;$n<$count;$n++){						
					$toInsert["enseignement"]="EP";
					$toInsert["groupe"]=$count;
					if(!empty($this->request->getVar("name0")))$toInsert["prof"]=$this->request->getVar("profEP".$i."G".$n);
					else $toInsert["prof"]=$this->request->getVar("profEP".($i+1)."G".$n);
					$classify->ignore(true)->insert($toInsert);
				}
			}
		}
		return redirect()->to('Back/index');
	}


	public function insertByType($type)
	{
		//Databases
		$classify = new Classification();
		$ue = new UE();
		$ecue = new ECUE();
		$prof = new Professeur();

		//Get number of group: faut le verifier en cooperant avec le groupe de "add student"
		$etudiants = new Inscription();
		$condition=[
			"grade" => "L",
			"niveau" => $l
		];
		$count= $etudiants->getTotal($condition);
		$count = (int)($count / 20);

		for($n=0;$n<$count;$n++){		
			//get UE and ECUE inputs
			$data_UE=[
				'nomUe' => $this->request->getVar("name".$type."0G".$n),
			];

			$data_ECUE= array();
			$data_Prof= array();
			$data_hour=array();
			$data_credit=array();

			if(!empty($this->request->getVar("number"))){
				$num = $this->request->getVar("number");
				for($i=1;$i<=$num;$i++){
					$data_ECUE[]=[
						"nomECUE" => $this->request->getVar("name".$type."".$i."G".$n)
					];
					$data_Prof[]=[ //donne l'id
						"prof" => $this->request->getVar("prof".$type."".$i."G".$n)
					];
					$data_credit[]=[
						"credit" => $this->request->getVar("credit".$type."".$i."G".$n)
					];				
					$data_hour[]=[
						"heure" => (10*(int)$this->request->getVar("credit".$type."".$i."G".$n))
					];
				}
			}
			else{
				$num = 1;
				$data_ECUE[]=[
					'nomECUE' => $this->request->getVar("name".$type."0"."G".$n)
				];
				$data_Prof[]=[	//donne l'id
					"prof" => $this->request->getVar("prof".$type."0"."G".$n)
				];
				$data_credit[]=[
					"credit" => $this->request->getVar("credit".$type."0"."G".$n)
				];
				$data_hour[]=[
					"heure" => (10*(int)$this->request->getVar("credit".$type."0"."G".$n))
				];
			}

			//insert all
			$ue->ignore(true)->insert($data_UE);

			foreach($data_ECUE as $dt){
				$ecue->ignore(true)->insert($dt);
			}
			//Get all ids
			$id_ue=$ue ->where($data_UE)
				->findAll();

			for($i=0;$i<$num;$i++){
				$id_ecue[]=$ecue ->where($data_ECUE[$i])
					->findAll();
			}

			//insert to Classification table

			for($i=0;$i<$num;$i++){
				$toInsert=[
					'niveau' => $this->request->getVar("level"),
					'semestre' => $this->request->getVar("semester"),
					'heure' => $data_hour[$i],
					'credit' => $data_credit[$i],
					'ecue' => $id_ecue[$i][0]["id"],
					'prof' => $id_prof[$i][0]["id"],
					'ue' => $id_ue[0]["id"],
					'enseignement' => $type,
					'groupe' => $n
				];
				$classify->ignore(true)->insert($toInsert);
			}
		}
	}
/*
	public function insert()
	{
		if(!empty($this->request->getVar("nameED0G1")) || !empty($this->request->getVar("nameED1G1"))){
			insertByType("ED");			
		}

		if(!empty($this->request->getVar("nameET0G1")) || !empty($this->request->getVar("nameET1G1"))){
			insertByType("ET");			
		}

		if(!empty($this->request->getVar("nameEP0G1")) || !empty($this->request->getVar("nameEP1G1"))){
			insertByType("EP");			
		}		
		return redirect()->to('Back/index');
	}
*/

/*  public function modify_ue($id)
    {
		//passer à la modification
		$classify = new Classification();
		$ue = new UE();
		$ecue = new ECUE();
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

		$tmp=$ecue->where('id',$data["liste"][0]["ecue"])->findAll();
		$data["liste"][0]["nonUe"]=$tmp[0]["nomECUE"];

		return view('form_modify',$data);

	}
*/

/*  public function update_ue($id)
    {
		//inserer apres post
		//Databases
		$classify = new Classification();
		$ue = new UE();
		$ecue = new ECUE();
		$prof = new Professeur();

		//get UE and ECUE inputs
		$data_UE=[
			'nomUe' => $this->request->getVar("name0"),
		];

		$data_ECUE= array();
		$data_Prof= array();
		$data_hour=array();
		$data_credit=array();

		if(!empty($this->request->getVar("number"))){
			$num = $this->request->getVar("number");
			for($i=1;$i<=$num;$i++){
				$data_ECUE[]=[
					"nomECUE" => $this->request->getVar("name".$i)
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
			$data_ECUE[]=[
				'nomECUE' => $this->request->getVar("name0")
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

		foreach($data_ECUE as $dt){
			$ecue->ignore(true)->insert($dt);
		}
		foreach($data_Prof as $pr){
			$prof->ignore(true)->insert($pr);
		}
		//Get all ids
		$id_ue=$ue ->where($data_UE)
			->findAll();

		for($i=0;$i<$num;$i++){
			$id_ecue[]=$ecue ->where($data_ECUE[$i])
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
				'ecue' => $id_ecue[$i][0]["id"],
				'prof' => $id_prof[$i][0]["id"],
				'ue' => $id_ue[0]["id"]
			];
			$classify->update($id,$toInsert);
		}
		return redirect()->to('Back/index');
    }
*/

	///Modifer
	public function update_ecue($id){
		//inserer apres post
		//Databases
		$classify = new Classification();
		$ecue = new ECUE();
		$prof = new Professeur();

		//get UE and ECUE inputs

		$data_ECUE=[
			'nomECUE' => $this->request->getVar("nameOfEcue")
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
		$ecue->ignore(true)->insert($data_ECUE);
		$prof->ignore(true)->insert($data_Prof);
		//Get all ids
			$id_ecue=$ecue ->where($data_ECUE)
				->findAll();
			$id_prof=$prof ->where($data_Prof)
				->findAll();

		//insert to Classification table
		$toInsert=[
			'heure' => $this->request->getVar("nameOfHours"),
			'credit' => $this->request->getVar("valueOfCredit"),
			'ecue' => $id_ecue[0]["id"],
			'prof' => $id_prof[0]["id"],
		];
		$classify->ignore(true)->update($id,$toInsert);
		return redirect()->to('Back/index');	
	}

	///Supprimer
    public function delete_ecue($id_ecue)
    {
		//delete
		$classify = new Classification();
		$classify->delete($id_ecue);
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

	public function toPdf(){
		$dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('list'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
	}
}

?>
