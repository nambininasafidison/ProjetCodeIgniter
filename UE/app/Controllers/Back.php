<?php

namespace App\Controllers;
use App\Models\Classification;
use App\Models\Niveau;
use App\Models\ECUE;
use App\Models\Semestre;
use App\Models\UE;
use App\Models\Professeur;
use App\Models\Enseignement;
use App\Models\Etudiant;
use App\Services\ConnexionService;

class Back extends BaseController
{
	public $npage = 10;

	///Liste
	public function testConnexion() { 
		$s = new ConnexionService();

		$data = [
            'id' => 1,
            'nom' => "Filamatra",
            'prenom' => "Tahiry",
            'mot_de_passe' => "12345678",
            'statut' => 1
          ];
		// $data = $s->testConnexion();
		return $data;
	}

	public function index()
    {
		//listAll
//		$session = \Config\Services::session();
//		$session->destroy();
		$data['data']=$this->testConnexion();
		if($data['data'] == null) {
			$url = base_url('UserController/index');
			return redirect()->to($url);
		}

		$classify = new Classification();
		$data["liste"] = $classify	->select('Classification.id , Classification.ue as id_ue')
									->join('Niveau','Classification.niveau = Niveau.id','inner')
									->join('Semestre','Classification.semestre = Semestre.id','inner')
									->join('Professeur','Classification.prof = Professeur.id','inner')
									->join('UE','Classification.ue = UE.id','inner')
									->join('ECUE','Classification.ecue = ECUE.id','inner')
									->findAll();
		$profs = new Professeur();
		$data["prof"] = $profs->select('id,nomProf,prenomProf')->findAll();
		return view('list',$data);
	}
	///Get form datas of research
    public function form_search()
    {
		$data['data']=$this->testConnexion();
		
		if($data['data'] == null) {
			$url = base_url('UserController/index');
			return redirect()->to($url);
		}
		//filtrer
		$to_search = $this->request->getVar("searched");
		$data["to_search"]=$to_search;
		$profs = new Professeur();
		$data["prof"] = $profs->select('id,nomProf,prenomProf')->findAll();									

		return view('filter',$data);
	}
	///Get form datas of recapitulation
	public function form_recap()
	{
		$data['data']=$this->testConnexion();
		
		if($data['data'] == null) {
			$url = base_url('UserController/index');
			return redirect()->to($url);
		}
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
			if(!empty($data["liste"]))$data["id_prof"]= $data["liste"][0]["id_prof"];
		}

		return view("recap",$data);
	}

	///Datas envoyEs par Json	
    public function filter()
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

		///Datas envoyEs par Json	
	public function filterEdt()
		{//filter par niveau sns
			//Les variables
			$this->response->setContentType('application/json');

			$classify = new Classification();
			$condition["Classification.niveau"] = 1;
			$condition["Classification.semestre"] = 1;

			///CLassifier les datas
			$data["L1"]["S1"]=$classify->edt($condition);

			$condition["Classification.semestre"]=2;
			$data["L1"]["S2"]=$classify->edt($condition);

			$condition["Classification.niveau"]=2;
			$condition["Classification.semestre"]=3;
			$data["L2"]["S3"]=$classify->edt($condition);

			$condition["Classification.semestre"]=4;
			$data["L2"]["S4"]=$classify->edt($condition);
	
			$condition["Classification.niveau"]=3;
			$condition["Classification.semestre"]=5;
			$data["L3"]["S5"]=$classify->edt($condition);
	
			$condition["Classification.semestre"]=6;
			$data["L3"]["S6"]=$classify->edt($condition);
	
			$condition["Classification.niveau"]=4;
			$condition["Classification.semestre"]=7;
			$data["M1"]["S7"]=$classify->edt($condition);
	
			$condition["Classification.semestre"]=8;
			$data["M1"]["S8"]=$classify->edt($condition);
	
			$condition["Classification.niveau"]=5;
			$condition["Classification.semestre"]=9;
			$data["M2"]["S9"]=$classify->edt($condition);
	
			$condition["Classification.semestre"]=10;
			$data["M2"]["S10"]=$classify->edt($condition);
	
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

	public function search($to_search)
    {
		//recherche
		$this->response->setContentType('application/json');
		$champ=["Classification.id","Classification.heure","Classification.credit","Professeur.nomProf","Professeur.prenomProf","Niveau.nomNiveau","Semestre.nomSemestre","UE.nomUe","ECUE.nomECUE","Classification.credit","jour.day","Classification.heure_edt_debut","Classification.heure_edt_fin","Professeur.CIN","Enseignement.type","CONCAT(Professeur.nomProf,' ',Professeur.prenomProf)"];

		foreach($champ as $c){
			$like[][$c]=$to_search;
		}
		$data = $this->dataToFilter($like);
		return json_encode($data);
    }

	public function DataRecap($field,$to_search)
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

	public function lesProf($type,$search_prof){
		$this->response->setContentType('application/json');
		$prof = new Professeur();
		if($type!="ALL"){
			$data=$prof		->select("Professeur.*,grade.nomGrade as grade")
							->join("grade","Professeur.idGrade = grade.id","inner")
							->where("Professeur.".$type,$search_prof)
							->findAll();
		}
		else if($type=="ALL"){
			$champ = ["Professeur.nomProf","Professeur.prenomProf","Professeur.idGrade","Professeur.adresse","Professeur.tel","Professeur.mail","Professeur.vacataire","Professeur.matricule","Professeur.CIN"];
			$prof	->select("Professeur.*,grade.nomGrade as grade")
					->join("grade","Professeur.idGrade = grade.id","inner")
					->like($champ[0],$search_prof);
				foreach($champ as $ch){
					$prof	->orLike($ch,$search_prof);
				}
			$data=$prof->findAll();			
		}
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
			$data[$l+3]= $etudiants->getTotal($condition);
		}
//		return json_encode($data);

//		$data["num"]=2;
		return json_encode($data);
	}

	///Ajout UE
    public function form()
    {
		$data['data']=$this->testConnexion();
		
		if($data['data'] == null) {
			$url = base_url('UserController/index');
			return redirect()->to($url);
		}
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
		$etudiants = new Etudiant();
		$niveau = new Niveau();
		$enseignement = new Enseignement();

		//Get number

			// $niv = $niveau ->where("id",$this->request->getVar("level"))->findAll();
			// $condition=[
			// 	"grade" => $niv[0]["nomNiveau"][0],
			// 	"niveau" => $niv[0]["nomNiveau"][1]
			// ];
			// $count= $etudiants->getTotal($condition);

		$count=2;
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
					"heure" => (int)(10* (int)($this->request->getVar("credit".$i)) )
				];
				$data_jour[]=[
					"jour" => $this->request->getVar("jour".$i)
				];
				$data_h_d[]=[
					"heure_edt_debut" => $this->request->getVar("heure_edt_debut".$i)
				];
				$data_h_f[]=[
					"heure_edt_fin" => $this->request->getVar("heure_edt_fin".$i)
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
				"heure" => (int)(10*(int)($this->request->getVar("credit0")))
			];
			$data_jour[]=[
				"jour" => $this->request->getVar("jour0")
			];
			$data_h_d[]=[
				"heure_edt_debut" => $this->request->getVar("heure_edt_debut0")
			];
			$data_h_f[]=[
				"heure_edt_fin" => $this->request->getVar("heure_edt_fin0")
			];
		}

		//insert all
		try{
			$ue->ignore(true)->insert($data_UE);
		}
		catch(\CodeIgniter\Database\Exceptions\DatabaseException $e){}

		foreach($data_ECUE as $dt){
			try{
				$ecue->ignore(true)->insert($dt);
			}
			catch(\CodeIgniter\Database\Exceptions\DatabaseException $e){}	
		}
		//Get all ids
		$id_ue=$ue ->where($data_UE)
			->findAll();

		for($i=0;$i<$num;$i++){
			$id_ecue[]=$ecue ->where($data_ECUE[$i])
				->findAll();
			$type = $enseignement->orderBy("id")->findAll(); 
		}

		//insert to Classification table
		for($i=0;$i<$num;$i++){
			$toInsert=[
				'niveau' => $this->request->getVar("level"),
				'semestre' => $this->request->getVar("semester"),
				'heure' => $data_hour[$i],
				'credit' => $data_credit[$i],
				'ecue' => $id_ecue[$i][0]["id"],
				'prof' => $data_Prof[$i]["nomProf"],
				'ue' => $id_ue[0]["id"],
				'jour' => $data_jour[$i],
				'heure_edt_debut' => $data_h_d[$i],
				'heure_edt_fin' => $data_h_f[$i],				
				'enseignement' => $type[0]["id"] //ilay ET
			];
			
			try{
				$classify->insert($toInsert);
			}catch(\CodeIgniter\Database\Exceptions\DatabaseException $e){
				$data['data']=$this->testConnexion();
		
				if($data['data'] == null) {
					$url = base_url('UserController/index');
					return redirect()->to($url);
				}
				//passer à l'ajout
				$profs = new Professeur();
				$data["prof"] = $profs->select('id,nomProf,prenomProf')->findAll();
				$data["error"] = "Impossible de faire l'ajout': ".$e->getMessage();
				return view('ajout',$data);
			}
			
			if(!empty($this->request->getVar("profED0G1"))||!empty($this->request->getVar("profED1G1"))){
				for($n=1;$n<=$count;$n++){						
					$toInsert["enseignement"]=$type[1]["id"];
					$toInsert["groupe"]=$n;
					if(!empty($this->request->getVar("profED0G1"))){	
						$toInsert["jour"]=$this->request->getVar("jourED0G".$n);
						$toInsert["heure_edt_debut"]=$this->request->getVar("heure_edt_debutED0G".$n);
						$toInsert["heure_edt_fin"]=$this->request->getVar("heure_edt_finED0G".$n);					
						$toInsert["prof"]=$this->request->getVar("profED0G".$n);
					}
					else {
						$toInsert["prof"]=$this->request->getVar("profED".($i+1)."G".$n);
						$toInsert["jour"]=$this->request->getVar("jourED".($i+1)."G".$n);
						$toInsert["heure_edt_debut"]=$this->request->getVar("heure_edt_debutED".($i+1)."G".$n);
						$toInsert["heure_edt_fin"]=$this->request->getVar("heure_edt_finED".($i+1)."G".$n);
					}
					try{
						$classify->insert($toInsert);
					}catch(\CodeIgniter\Database\Exceptions\DatabaseException $e){
						$data['data']=$this->testConnexion();
				
						if($data['data'] == null) {
							$url = base_url('UserController/index');
							return redirect()->to($url);
						}
						//passer à l'ajout
						$profs = new Professeur();
						$data["prof"] = $profs->select('id,nomProf,prenomProf')->findAll();
						$data["error"] = "Impossible de faire l'ajout': ".$e->getMessage();
						return view('ajout',$data);
					}
				}
			}
			if(!empty($this->request->getVar("profEP0G1"))||!empty($this->request->getVar("profEP1G1"))){
				for($n=1;$n<=$count;$n++){
					$toInsert["enseignement"]=$type[2]["id"];
					$toInsert["groupe"]=$n;
					if(!empty($this->request->getVar("profEP0G1"))){
						$toInsert["jour"]=$this->request->getVar("jourEP0G".$n);
						$toInsert["heure_edt_debut"]=$this->request->getVar("heure_edt_debutEP0G".$n);
						$toInsert["heure_edt_fin"]=$this->request->getVar("heure_edt_finEP0G".$n);
						$toInsert["prof"]=$this->request->getVar("profEP0G".$n);
					}
					else {
						$toInsert["prof"]=$this->request->getVar("profEP".($i+1)."G".$n);
						$toInsert["jour"]=$this->request->getVar("jourEP".($i+1)."G".$n);
						$toInsert["heure_edt_debut"]=$this->request->getVar("heure_edt_debutEP".($i+1)."G".$n);
						$toInsert["heure_edt_fin"]=$this->request->getVar("heure_edt_finEP".($i+1)."G".$n);
					}
					try{
						$classify->insert($toInsert);
					}catch(\CodeIgniter\Database\Exceptions\DatabaseException $e){
						$data['data']=$this->testConnexion();
				
						if($data['data'] == null) {
							$url = base_url('UserController/index');
							return redirect()->to($url);
						}
						//passer à l'ajout
						$profs = new Professeur();
						$data["prof"] = $profs->select('id,nomProf,prenomProf')->findAll();
						$data["error"] = "Impossible de faire l'ajout': ".$e->getMessage();
						return view('ajout',$data);
					}
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

		//insert all
		try{
			$ecue->ignore(true)->insert($data_ECUE);
		}catch(\CodeIgniter\Database\Exceptions\DatabaseException $e){}
		//Get all ids
			$id_ecue=$ecue ->where($data_ECUE)
				->findAll();

		//insert to Classification table
		$toInsert=[
			'heure' => (10*$this->request->getVar("valueOfCredit")),
			'credit' => $this->request->getVar("valueOfCredit"),
			'ecue' => $id_ecue[0]["id"],
			'prof' => $this->request->getVar("nameOfProf"),
			'heure_edt_debut' => $this->request->getVar("heure_edt_debut0"),
			'heure_edt_fin' => $this->request->getVar("heure_edt_fin0"),
			'jour' => $this->request->getVar("jour")
		];
		try{
			$classify->update($id,$toInsert);
		}catch(\CodeIgniter\Database\Exceptions\DatabaseException $e){
			$data['data']=$this->testConnexion();
			if($data['data'] == null) {
				$url = base_url('UserController/index');
				return redirect()->to($url);
			}
	
			$classify = new Classification();
			$data["liste"] = $classify	->select('Classification.id , Classification.ue as id_ue')
										->join('Niveau','Classification.niveau = Niveau.id','inner')
										->join('Semestre','Classification.semestre = Semestre.id','inner')
										->join('Professeur','Classification.prof = Professeur.id','inner')
										->join('UE','Classification.ue = UE.id','inner')
										->join('ECUE','Classification.ecue = ECUE.id','inner')
										->findAll();
			$profs = new Professeur();
			$data["prof"] = $profs->select('id,nomProf,prenomProf')->findAll();
			$data["error"] = "Impossible de faire l'ajout': ".$e->getMessage();
			return view('list',$data);
		}
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

	public function schedule()
	{
		$data['data']=$this->testConnexion();
		
		if($data['data'] == null) {
			$url = base_url('UserController/index');
			return redirect()->to($url);
		}
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
		$classify	->select('Niveau.nomNiveau as Niveau,Semestre.nomSemestre as Semestre,UE.nomUe as UE,ECUE.nomECUE as ECUE,Classification.heure as Heure, Classification.credit as Credit,Enseignement.type as Enseignement, Classification.groupe as Groupe, Professeur.nomProf as NomProf, Professeur.prenomProf as PrenomProf, Professeur.id as id_prof, jour.day as jour, Classification.heure_edt_debut as h_edt_d, Classification.heure_edt_fin as h_edt_f')
					->join('Niveau','Classification.niveau = Niveau.id','inner')
					->join('Semestre','Classification.semestre = Semestre.id','inner')
					->join('Professeur','Classification.prof = Professeur.id','inner')
					->join('jour','Classification.jour = jour.id','inner')
					->join('Enseignement','Classification.enseignement = Enseignement.id','inner')
					->join('UE','Classification.ue = UE.id','inner')
					->join('ECUE','Classification.ecue = ECUE.id','inner')
					->like($champ[0],$to_search);
					foreach($champ as $ch){
						$classify->orLike($ch,$to_search);
					}
		$data["liste"] = $classify	->orderBy("Niveau,Semestre,ECUE,h_edt_d,h_edt_f")->findAll();		
		$data["to_search"] = $to_search;
		$data["field"]=$field;
		if($field == "Professeur"){
			if(!empty($data["liste"]))$data["id_prof"]= $data["liste"][0]["id_prof"];
		}

		return view('edt.php',$data);
	}
}

?>
