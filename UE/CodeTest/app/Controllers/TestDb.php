<?php

namespace App\Controllers;
use App\Models\Db;

class TestDb extends BaseController
{
	public $npage = 9;
    public function index(): string
    {
	$db = new Db();
	$data["liste"] = $db->paginate($this->npage);
	$data["pager"] = $db->pager;
	$data["count"] = $db->countAllResults();
        return view('afficheDb',$data);
    }

    public function filter(): string
    {
	$db = new Db();

	$s1 = $this->request->getVar("selected");
	$s2 = $this->request->getVar("searched");

	$inp[$s1]=$s2;
	$data["liste"] = $db->like($inp)->paginate($this->npage);

	$data["pager"] = $db->pager;
	$data["count"] = $db->countAllResults();
        return view('afficheDb',$data);
    }

    public function filterAll(): string
    {
	$db = new Db();
	$inp=$this->request->getVar("all");
	$fields = ["nom","prenom","dNaissance","lNaissance","genre","gmail","tel"];
	$db->like($fields[0],$inp);
	foreach($fields as $f){
		$db->orLike($f,$inp);
	}
	$data["liste"] = $db->paginate($this->npage);
	$data["pager"] = $db->pager;
	$data["count"] = $db->countAllResults();
        return view('afficheDb',$data);
    }

    public function form(): string
    {
        return view('inscrire');
    }

    public function modify($id)
    {
	$db = new Db();
	$inp["id"]=$id;
	$data["liste"] = $db->where($inp)->paginate($this->npage);
	$data["pager"] = $db->pager;
        return view('modify',$data);
    }

    public function insert()
    {

	$db = new Db();
	$datas = [
		"nom" => $this->request->getVar("nom"),
		"prenom" => $this->request->getVar("prenom"),
		"dNaissance" => $this->request->getVar("dNaissance"),
		"lNaissance" => $this->request->getVar("lNaissance"),
		"genre" => $this->request->getVar("genre"),
		"gmail" => $this->request->getVar("gmail"),
		"tel" => $this->request->getVar("tel")
	];
	$db->insert($datas);
	return redirect()->to('TestDb/index');
    }

    public function update($id)
    {
	$db = new Db();
	$datas = [
		"nom" => $this->request->getVar("nom"),
		"prenom" => $this->request->getVar("prenom"),
		"dNaissance" => $this->request->getVar("dNaissance"),
		"lNaissance" => $this->request->getVar("lNaissance"),
		"genre" => $this->request->getVar("genre"),
		"gmail" => $this->request->getVar("gmail"),
		"tel" => $this->request->getVar("tel")
	];
	$db->update($id,$datas);
	return redirect()->to('TestDb/index');
    }

    public function delete($id)
    {
	$db = new Db();
	$db->delete($id);
	return redirect()->to('TestDb/index');
    }
}

?>
