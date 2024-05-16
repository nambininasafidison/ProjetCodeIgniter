<?php

namespace App\Controllers;
use App\Models\Professeur;
use App\Models\Grade;
use App\Services\ConnexionService;

class ProfController extends BaseController
{
    public function form_prof(){
	$s = new ConnexionService();

    $data["data"] = [
        'id' => 1,
        'nom' => "Filamatra",
        'prenom' => "Tahiry",
        'mot_de_passe' => "12345678",
        'statut' => 1
      ];

    	// $data["data"]=$s->testConnexion();
	    if($data["data"]==null){
		$url = base_url("UserController/login");
		return redirect()->to($url);
	}
	else{
	        $model = new Grade();
	        $profMod = new Professeur();
	        $data["grades"] = $model->findAll();
	        $data["profs"] = $profMod   ->select('Professeur.*, grade.nomGrade as nomGrade')
                                        ->join('grade','Professeur.idGrade=grade.id','inner')
                                        ->paginate(5);
	        $data["pager"] = $profMod->pager;
	}
        return view('form_prof' , $data);
    }

    public function returnData(){
       	$this->response->setContentType('application/json');
	$db = new Professeur();
	$id = $db->select('id')->findAll();
	$data=array();

	foreach($id as $elt){
		$value=$db->where($elt)->findAll();
		$data[$elt["id"]]=$value[0];
	}

	return json_encode($data);
    }

    public function insert()
    {
	if(!empty($this->request->getVar("nom"))){
            $model = new Professeur();
            $nom = $this->request->getVar("nom") ;
            $prenom = $this->request->getVar("prenom");
            $idGrade = $this->request->getVar("grade") ;
            $adresse =  $this->request->getVar("adresse") ;
            $tel =  $this->request->getVar("tel") ;
            $mail =  $this->request->getVar("mail") ;
            $vacataire = $this->request->getVar("vacataire");
            $matricule =  $this->request->getVar("matricule") ;

            if(empty($vacataire)) $vacataire = 1;

            $CIN =  $this->request->getVar("CIN");
            $datas = [
            "nomProf" => $nom,
            "prenomProf" => $prenom,
            "idGrade" => $idGrade,
            "adresse" =>$adresse,
            "tel" =>$tel,
            "mail" =>$mail,            
            "vacataire" => $vacataire,
            "matricule" => $matricule,
            "CIN" => $CIN,
	   ];
		try{
	            $model->insert($datas);
		}catch(\CodeIgniter\Database\Exceptions\DatabaseException $e){
	        	$data["error"] = "Impossible de faire l'ajout': ".$e->getMessage();
		}
	}
	$s = new ConnexionService();

	    $data["data"] = [
	        'id' => 1,
	        'nom' => "Filamatra",
	        'prenom' => "Tahiry",
	        'mot_de_passe' => "12345678",
	        'statut' => 1
	      ];

//    	$data["data"]=$s->testConnexion();
	if($data["data"]==null){
		$url = base_url("UserController/login");
		return redirect()->to($url);
	}
	else{
	        $model = new Grade();
	        $profMod = new Professeur();
	        $data["grades"] = $model->findAll();
	        $data["profs"] = $profMod   ->select('Professeur.*, grade.nomGrade as nomGrade')
                                        ->join('grade','Professeur.idGrade=grade.id','inner')
                                        ->paginate(5);
	        $data["pager"] = $profMod->pager;
	}

        return view('form_prof' , $data);
    }

    	public function delete_prof($id)
    {
	//delete
	$classify = new Professeur();
	$classify	->	where('id',$id)
			->	delete();
	return redirect()->to('ProfController/index');
    }

    public function modify($id)
    {
	if(!empty($this->request->getVar("nom"))){
            $model = new Professeur();
            $nom = $this->request->getVar("nom") ;
            $prenom = $this->request->getVar("prenom");
            $idGrade = $this->request->getVar("grade") ;
            $adresse =  $this->request->getVar("adresse") ;
            $tel =  $this->request->getVar("tel") ;
            $mail =  $this->request->getVar("mail") ;
            $vacataire = $this->request->getVar("vacataire");
            $matricule =  $this->request->getVar("matricule") ;

            if(empty($vacataire)) $vacataire = 1;

            $CIN =  $this->request->getVar("CIN");
            $datas = [
            "nomProf" => $nom,
            "prenomProf" => $prenom,
            "idGrade" => $idGrade,
            "adresse" =>$adresse,
            "tel" =>$tel,
            "mail" =>$mail,            
            "vacataire" => $vacataire,
            "matricule" => $matricule,
            "CIN" => $CIN,
	   ];
		try{
	            $model->update($id,$datas);
		}catch(\CodeIgniter\Database\Exceptions\DatabaseException $e){
	        	$data["error"] = "Impossible de faire l'ajout': ".$e->getMessage();
		}
	}
	$s = new ConnexionService();

	    $data["data"] = [
	        'id' => 1,
	        'nom' => "Filamatra",
	        'prenom' => "Tahiry",
	        'mot_de_passe' => "12345678",
	        'statut' => 1
	      ];

//    	$data["data"]=$s->testConnexion();
	if($data["data"]==null){
		$url = base_url("UserController/login");
		return redirect()->to($url);
	}
	else{
	        $model = new Grade();
	        $profMod = new Professeur();
	        $data["grades"] = $model->findAll();
	        $data["profs"] = $profMod   ->select('Professeur.*, grade.nomGrade as nomGrade')
                                        ->join('grade','Professeur.idGrade=grade.id','inner')
                                        ->paginate(5);
	        $data["pager"] = $profMod->pager;
	}

        return view('form_prof' , $data);
    }

}
?>
