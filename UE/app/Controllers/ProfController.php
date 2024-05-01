<?php

namespace App\Controllers;
use App\Models\Professeur;
use App\Models\Grade;

class ProfController extends BaseController
{
    public function form_prof(){
        $model = new Grade();
        $data["grades"] = $model->findAll();
        return view('form_prof' , $data);
    }

    public function insert()
    {
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

        $model->ignore(true)->insert($datas);
        return redirect()->to('Back/index');
    }
}
