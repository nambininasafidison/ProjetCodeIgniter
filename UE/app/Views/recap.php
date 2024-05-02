<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Lister</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS -->
	<style>
  /* Style background */
  	* {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: pop;
    }

	  TD{
		text-align:center;
	  }

    @font-face {
      font-family: pop;
      src: url(../assets/FontsFree-Net-Poppins-Medium.ttf);
    }

    body {
      width: 100vw;
      height: 100vh;
      background-color: #190306;
      overflow-x: hidden;
      z-index: 0;
    }

    .main {
      height: 90vh;
      width: 100vw;
    }

    .background {
      position: absolute;
      z-index: -1;
    }

    .background .back {
      width: 100vw;
      height: 100vh;
      position: absolute;
      top: 0;
      left: 0;
    }

    .background .back1 {
        clip-path: polygon(65% 0, 100% 0, 100% 100%, 25% 100%);
        background-color: #f001;
    }

    .background .back2 {
        clip-path: polygon(70% 0, 100% 0, 100% 100%, 30% 100%);
        background-color: #f001;
    }

    .background .back3 {
        clip-path: polygon(75% 0, 100% 0, 100% 100%, 35% 100%);
        background-color: #f001;
    }

  /* Menu ambony */
    header {
      width: 100vw;
      height: 10vh;
      display: flex;
    }
    header .container-menu {
      display: flex;
      align-items: center;
      flex-direction: column;
      color: #ffffff;
      width: 95vw;
      padding: 2vh 0 0 2vw;
    }
    header .container-menu hr {
      width: 91vw;
      height: 0.05vw;
      background-color: #fff;
      border: none;
      border-radius: 50%;
      margin-top: 2vh;
    }
    header .container-menu .menu-bar {
      display: flex;
      justify-content: space-between;
      width: 91vw;
      height: 5vh;
      padding: 0 1vw;
    }
    header .container-menu .menu-bar .menu {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 12vw;
    }
    header .container-menu .menu-bar .title{
      width: 40vw;      
    }

    header .container-menu .menu-bar .menu .menu-sand {
      width: 2.2vw;
      height: 2.2vw;
      background-color: #fff;
      padding: 0 0.4vw;
      border-radius: 50%;
      position: relative;
      color: #000;
      font-size: 1.5vw;
      border: none;
      cursor: pointer;
    }
    header .container-menu .menu-bar .menu .menu-sand::before {
      content: "";
      position: absolute;
      width: 1.8vw;
      height: 3px;
      margin: auto;
    }

    header .container-menu .menu-bar .menu p {
      text-decoration:none;
      font-size: 1vw;
    }

    header .container-menu .menu-bar .container-user-info {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header .container-menu .menu-bar .container-user-info .user-info-name {
      font-size: 1.2vw;
      border: 0.1vw solid #fff;
      padding: 0.5vh 3vw;
      border-radius: 5vw;
    }

    a{
      text-decoration:none;
      color:white;
    }

    header .container-menu .menu-bar .container-user-info .user-info-img {
      width: 3vw;
      height: 3vw;
      background-color: #fff;
      border-radius: 50%;
      font-size: 2vw;
      border: none;
      color: #000;
      padding: 0 0.6vw;
    }
  /* Options */
    .input,.checkbox,.del,button {
      position: relative;
      height: 10vh;
      top: 2vh;
    }

    .input input, .input select, button,.checkbox,.del {
      min-width: 9vw;
      height: 5.5vh;
      border-radius: 4vw;
      border: 1px solid #000;
      background-color: #fff;
      padding: 1.25vh 1vw;
      font-size: 0.8vw;
    }

    .input label {
      position: absolute;
      font-size: 1vw;
      top: -1.6vh;
      left: 1.5vw;
      background-color: #fff;
      padding: 0 0.3vw;
    }

    input[type="checkbox"]{
      border-radius: 10px;
      width:4vw;
    }

    input[type="submit"]{
      display:block;
      margin:auto;
      background-color:#bbb;
    }
    
    .flex{
      display:flex;
      justify-content:space-around;
	  background-color:#fff;
	  margin:1vw;
	  padding:1vw;
	  border-radius:20px;
    }

	  form{
		display:flex;
  	}

	  .del{
		color:#000;
	  }

  /* Liste */
	  .form {
		margin:auto;
		margin-top:2vh;
		padding: 6vw;
		padding-bottom:4vw;
		width: 66vw;
		height: 40vh;
		background-color: #fff;
		border-radius: 1.5vw;
		overflow: hidden;
		clip-path: polygon(0 0, 10% 0, 20% 9%, 95% 9%, 100% 14%, 100% 100%, 0 100%);
	  }

    .tab_to_pdf{
      width:90vw;
      background-color:#fff;
      margin: 0 5vw;
      margin-top:5vh;
      padding:5vw 2vw;
      display:flex;
      flex-direction:column;
      align-items:center;
    }

    .tab_to_pdf table{
        width:80vw;
      }

    table, p{
      margin:auto;
      text-align:center;
    }

    .titre_recherche{
      font-size:3vw;
      border:1px solid black;
      margin:3vw;
      padding:1vw;
      text-align:center;
    }


    @media print {
      header, .flex , hr{
        display: none;
      }
      body{
        background-color:#fff;
      }
      .tab_to_pdf{
        width:100vw;
        padding: 0;
        margin: 0;
        display:flex;
        flex-direction:column;
        align-items:center;
      }

      .tab_to_pdf table,#prof_info{
        width: 100vw;
        margin: 0;
        padding: 0;
        border:.2px;
      }
    }

    #debug-icon {
      display: none;
    }

    #prof_au_choix, #none{
      position:absolute;
      top:65%;
      left:25%;
      margin:auto;
      padding:5vw;
      width:50vw;
      height:50 vh;
      background-color:#190306;
      border-radius:10px;
      border:2px solid white;
      box-shadow:0px 0px 1000000000px #fff;
      color:#fff;      
      display:flex;
      flex-direction:column;
    }
    #none{
      top:50%;
    }

    #prof_au_choix form{
      display:flex;
      flex-direction:column;
    }

    #prof_au_choix p{
      margin:auto;
      padding-bottom:3vw;
    }

    .submit{
      display:block;
      margin:auto;
    }

    #prof_au_choix form table{
      margin-bottom:3vw;
      width:100%;
    }
    td{
      text-align: center;
      margin:3vw;
    }
    th{
      margin:3vw;
    }

</style>
</head>
<body>
	<header>
      <section class="container-menu">
          <div class="menu-bar">
            <div class="menu">
              <!-- <button class="menu-sand"><i class="fa fa-bars"></i></button> -->
              <p>User_connecte</p>
            </div>
            <div class="title"><h1>Toutes les Unites d'Enseignements</h1></div>
            <div class="container-user-info">
                <div class="user-info-name">
			        <a href="<?php echo base_url('Back/form') ?>">Ajouter une UE</a>
                </div>
                <div class="user-info-name">
                    <a href="<?php echo base_url('/') ?>" class="btn btn-primary">Lister</a>
                </div>
                <div class="user-info-name">
                    <a href="<?php echo base_url('ProfController/form_prof') ?>" class="btn btn-primary">Professeurs</a>
                </div>
            </div>
          </div>
        <hr />
      </section>
      <section class="background">
        <div class="back back1"></div>
        <div class="back back2"></div>
        <div class="back back3"></div>
      </section>  
    </header>
    <section>
      <!-- Message none -->
      <section id="none" style="display:none;">      
        <p>Aucun resultat.</p>
        <button id="dacc">OK</button>
      </section>
    </section>
    <section id="prof_au_choix" style="display:none;">
      <p>Resultat pour: <b id="pour"></b></p>
      <FORM action="<?php echo base_url('Back/form_recap') ?>" method="POST">          
        <input type="text" name="field" id="new_field" value="Professeur" style="display:none;"/>
        <table border="1">
          <tbody id="recherche_prof">

          </tbody>
        </table>  
        <p><input type="submit" class="submit" value="Envoyer"/></p>
      </form>
    </section>
<!--  -->
	<div class="flex">
  <FORM action="<?php echo base_url('Back/form_recap')?>" method="POST" id="check">
    <div class="input">
        <label for="field">Filter</label> 
        <select name="field" id="field">
            <option selected>Niveau</option>
            <option>Semestre</option>
            <option>Professeur</option>
            <option>Enseignement</option>
            <option>UE</option>
            <option>ECUE</option>
            <option>Credit</option>
        </select>
        <input type="text" name="to_search" id="inpSearch" required/>
    </div>
    <div class="input"><INPUT type="submit" value="Filter"></div>
</FORM>
		<a href="<?php echo base_url('/') ?>"><button>All</button></a>
        <!-- <a href="<?php //echo base_url('Back/toPdf') ?>"><button>To PDF</button></a> -->
        <button class="topdf">To PDF</button>
    </div>
	<hr>

  <!-- Tableau -->
  <div class="tab_to_pdf" id="prof_info" style="display:none;">
		<table cellpadding="5px" cellspacing="0px" border=".2px" width="100%" height="" >
			<tr>
                <th colspan="">TABLEAU A</th>
				<th> </th>
                <th> </th>
                <th> </th>
                <th> </th>
			</tr>
			<tr>
				<th><i>Ministère de l’Enseignement Supérieur et de la Recherche Scientifique</i></th>
                <th> </th>
                <th> </th>
                <th> </th>
                <td id="vacataire_prof"></td>
                
			</tr>
            <tr>
                <td>Université : <b>Université d’Antananarivo</b></td>
                 
                <th> </th>
                <th> </th>
                <th> </th>
                <td id="matricule_prof">
                </td>
            </tr>
            <tr>
                <td>
                    Domaine : <b>Sciences et Technologies</b> <i> (Faculté des Sciences)</i>
                    <br>
                    Mention : <b>Informatique et Technologie</b> 
                </td>
                <td colspan="4">
                    <b>          FICHE INDIVIDUELLE DE DECLARATION DES ENSEIGNEMENTS EN L1, L2,, L4, M1 et M2</b>
                </td>
            </tr>
            <tr>
                <td id="nom_prof"> <b></b></td>
                <td colspan="4"> </td>

            </tr>
            <tr>
                <td id="prenom_prof"></td>
                <td colspan="4">
                    <b>                                                         Année universitaire : ……………..</b>
                </td>

            </tr>
            <tr>
                <td id="grade_prof"></td>
                <td colspan="4"><b>Parcours: Master Mathématiques Informatique et  Statistiques Appliquées</b></td>
            </tr>
            <tr>
                <td colspan="5" id="coordonnee"></td>
            </tr>

		</table>
        <br>
        <br>

        <table cellpadding="3px" cellspacing="0px" border="1px" width="100%" height="">
            <tr>
                <th rowspan="2">
                    Grade
                    (Licence/Master)
                </th>
                <th rowspan="2">
                     Niveau d’étude (S1,S2,S3,S4,S5,S6,S7,S8,S9)
                </th>
                <th rowspan="2">
                    Intitulé de l’UE ou/et EC
                </th>
                <th rowspan="2">
                    Type
                    (ET/ED/EP)
                </th>
                <th rowspan="2">
                    Crédits dans l’offre habilitée
                </th>
                <th rowspan="2">
                    Volume Horaire pendant le semestre                   
                </th>
                <th rowspan="2">
                    Numéro(s) Groupe
                </th>
                <th colspan="3">
                    Heures effectuées
                </th>
            </tr>
            <tr>
                <th>ET</th>
                <th>ED</th>
                <th>EP</th>
            </tr>
      <?php
        $somme=0;
      ?>            
    <?php foreach($liste as $s){?>
            <tr>
                <td><?=$s["Niveau"]?></td>
                <td><?=$s["Semestre"]?></td>
                <td><?=$s["ECUE"]?></td>
                <td><?=$s["Enseignement"]?></td>
                <td><?=$s["Credit"]?></td>
                <td><?=$s["Heure"]?></td>
                <td><?=$s["Groupe"]?></td>
                <td><?=$s["Heure"]?></td>
                <td><?=$s["Heure"]?></td>
                <td><?=$s["Heure"]?></td>
                <?php $somme+= (int)$s["Heure"]?>
            </tr>
    <?php }?>
            <tr>
                <td colspan="4"></td>
                <th colspan="3">Heures à déclarer (à compléter par l’administration)</th>
                <td><?=$somme?></td>
                <td><?=$somme?></td>
                <td><?=$somme?></td>

            </tr>
        </table>

        <br>
        <br>
        <br>

        <p>Arrêtée la présente déclaration à………heures d’enseignements effectuées dont :	</p>
        <p>……….heures de ET ……heures de ED et …0….heure de EP</p>
        <table cellspacing="0px" border=".2px" width="100%">
            <tr>
                <th colspan="1">Certifiée l’exactitude des renseignements fournis</th>
                <th> </th>
            </tr>
            <tr>
                <td> </td>
               

                <td>	  Fait à Antananarivo le,</td>
            </tr>
        </table>
    <center>
          <table cellspacing="10px">
              <tr>
              <td><i>Le Responsable du parcours,</i></td>
              <td><i>Le Responsable du parcours,</i></td>
              <td><i>Signature de l’Enseignant,</i></td>
          </tr>
          </table>
      </center>
  </div>

  <div class="tab_to_pdf" id="form_tsotra" style="display:none;">

      <div class="titre_recherche">
        Résultat pour "<?=$field?> : <?=$to_search?>"
      </div>

    <table cellpadding="3px" cellspacing="0px" border="1px" >
            <tr>
                <th rowspan="2">
                    Grade
                    (Licence/Master)
                </th>
                <th rowspan="2">
                     Niveau d’étude (S1,S2,S3,S4,S5,S6,S7,S8,S9)
                </th>
                <th rowspan="2">
                    Intitulé de l’UE ou/et EC
                </th>
                <th rowspan="2">
                    Professeur
                </th>
                <th rowspan="2">
                    Type
                    (ET/ED/EP)
                </th>
                <th rowspan="2">
                    Crédits dans l’offre habilitée
                </th>
                <th rowspan="2">
                    Volume Horaire pendant le semestre                   
                </th>
                <th rowspan="2">
                    Numéro(s) Groupe
                </th>
                <th colspan="3">
                    Heures effectuées
                </th>
            </tr>
            <tr>
                <th>ET</th>
                <th>ED</th>
                <th>EP</th>
            </tr>
      <?php
        $somme=0;
      ?>                        
    <?php foreach($liste as $s){?>
            <tr>
                <td><?=$s["Niveau"]?></td>
                <td><?=$s["Semestre"]?></td>
                <td><?=$s["ECUE"]?></td>
                <td><?=$s["NomProf"]?> <?=$s["PrenomProf"]?></td>                
                <td><?=$s["Enseignement"]?></td>
                <td><?=$s["Credit"]?></td>
                <td><?=$s["Heure"]?></td>
                <td><?=$s["Groupe"]?></td>
                <td><?=$s["Heure"]?></td>
                <td><?=$s["Heure"]?></td>
                <td><?=$s["Heure"]?></td>
                <?php $somme+= (int)$s["Heure"]?>
            </tr>
    <?php }?>
            <tr>
                <td colspan="4"></td>
                <th colspan="4">Heures à déclarer (à compléter par l’administration)</th>
                <td><?=$somme?></td>
                <td><?=$somme?></td>
                <td><?=$somme?></td>

            </tr>
        </table>

        <br>
        <br>
        <br>
        <div>
          <p>Arrêtée la présente déclaration à . . . . . . . . heures d’enseignements effectuées dont :	</p>
          <p> . . . . . . heures de ET . . . . . . heures de ED et . . . 0 . . . . heure de EP</p>
        </div>
        <table cellspacing="0px" border=".2px">
            <tr>
                <th colspan="1">Certifiée l’exactitude des renseignements fournis</th>
                <th> </th>
            </tr>
            <tr>
                <td> </td>
               

                <td>	  Fait à Antananarivo le,</td>
            </tr>
        </table>
    <center>
          <table cellspacing="10px">
              <tr>
              <td><i>Le Responsable du parcours,</i></td>
              <td><i>Le Responsable du parcours,</i></td>
              <td><i>Signature de l’Enseignant,</i></td>
          </tr>
          </table>
      </center>
  </div>
    <!-- Les scripts -->

<script>
/*
  document.getElementById("ch").addEventListener("submit",function(event){
    const field = document.getElementById("field");
    const to_search = document.getElementById("to_search");
    const list = dodument.getElementById("recherche_prof");
    list.innerHTML="";
    alert("atooo");
    console.log("ato");
/*
    if(field.value == "Professeur"){
      const data = await postData("<?php echo base_url('Back/lesProf') ?>/ALL/"+to_search.value);
      
      if(data.length>1){
        document.getElementById("pour").innerHTML=to_search.value;
        document.getElementById("new_to_search").value=to_search.value;
        for(let i=0;i<data.length;i++){
          list.innerHTML+="<tr><input type='checkbox' name='to_search' value='"+data[i]["nomProf"]+"'"+data[i]["nomProf"]+"</td><td>"+data[i]["prenomProf"]+"</td></tr>";
        }
        ducument.getElementById("prof_au_choix").innerHTML+="Selectionner votre choix.";
        ducument.getElementById("prof_au_choix").style.display="block";
        return false;
      }
      else{
        return true;
      }
    }
    else{
      return true;
    }
/
    event.preventDefault();
  });
*/
  document.getElementById("check").addEventListener("submit", async function(event) {
    const field = document.getElementById("field");
    const to_search = document.getElementById("inpSearch");

    if(field.value == "Professeur"){
      event.preventDefault();
      const data = await postData("<?php echo base_url('Back/lesProf') ?>/ALL/"+to_search.value);
      if(data.length>0){
        document.getElementById("prof_au_choix").style.display = "block";
        const list = document.getElementById("recherche_prof");
        list.innerHTML = ""; // Assurez-vous de réinitialiser l'innerHTML avant d'ajouter du contenu
        document.getElementById("pour").innerHTML = to_search.value;
        for(let i = 0; i < data.length; i++){
            list.innerHTML += "<tr><td><input type='checkbox' name='to_search' value='" + data[i]["CIN"] + "'/></td><td>" + data[i]["nomProf"]+" "+data[i]["prenomProf"] + "</td></tr>";
        }
        document.getElementById("prof_au_choix").innerHTML += "<p>Selectionner votre choix.</p>";
      }
      else{
        document.getElementById("none").style.display="block";
        console.log("attt");
      }
    }
  });
  
  document.getElementById("dacc").addEventListener("click",()=>{document.getElementById("none").style.display="none";});
  const topdf = document.querySelector(".topdf");

  topdf.addEventListener("click", () => {
    window.print();
  });

  //Confirmer
	function confirmer(){
      return confirm("Voulez-vous vraiment le modifier?");
  	}

    //Recuperer les donnees via Fetch    
	async function postData(url="", donnee={}) {
		var data = null;
		try {
			const reponse = await fetch(
				url,
				{
					method: "POST",
					mode: "cors",
					headers: {
						"Content-Type": "application/json",
					},
					redirect: "follow",
					body: JSON.stringify(donnee),
				}
			);
			if (!reponse.ok) {
				throw new Error(`HTTP error! status: ${reponse.status}`);
			}

			data = await reponse.json();
		} catch (error) {
			console.error("Error:", error);
		}
		return data;
	}

	//Gestion UE et ECUE 

	async function display_data(id_prof){
    const data = await postData("<?php echo base_url('Back/lesProf') ?>/id/"+id_prof);
    console.log(data);
    $infoProf = document.getElementById("prof_info");
    var vacat;
    if(data[0].vacataire==0)vacat="Non"
    else vacat="Oui"
    document.getElementById("nom_prof").innerHTML="Nom :"+data[0].nomProf;    
    document.getElementById("prenom_prof").innerHTML="Prénoms : "+data[0].prenomProf;    
    document.getElementById("grade_prof").innerHTML="Grade: "+data[0].grade; 
    document.getElementById("coordonnee").innerHTML="Coordonnées (adresse, tél., e-mail) :  <br>"+data[0].adresse+"<br>"+data[0].tel+"<br>"+data[0].mail+"<br>";        
    document.getElementById("vacataire_prof").innerHTML="Vacataire: "+vacat;        
    document.getElementById("matricule_prof").innerHTML="Numéro matricule: "+data[0].matricule+"<br>CIN :"+data[0].CIN;        

    $infoProf.style.display="block";
  }
	//Afficher le table de ECUE    

  <?php

    if($to_search==""){
      echo "document.getElementById('form_tsotra').style.display='none';";
      echo "document.getElementById('prof_info').style.display='none';";      
    }
    else if(isset($liste)&&(count($liste)==0)) echo "document.getElementById(\"none\").style.display='block'";
    else{

      if(isset($id_prof)){
        echo "display_data(".$id_prof.");";  
      }
      else{
        echo "document.getElementById('form_tsotra').style.display='block';";
      }
    }
  ?>

  //display_data(1);

</script>

	</BODY>
</HTML>
