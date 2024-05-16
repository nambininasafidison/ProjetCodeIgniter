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
      color: #fff;
      width: 100vw;
	  padding: 2vh 0;
    }
    header .container-menu hr {
      width: 98vw;
      height: 0.05vw;
      background-color: #fff;
      border: none;
      border-radius: 50%;
      margin-top: 2vh;
    }
    header .container-menu .menu-bar {
      display: flex;
      justify-content: space-between;
      width: 98vw;
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
      display: flex;
      align-items: center;
      text-wrap: nowrap;
      padding: 0 .5vw;
      font-size: 1.1vw;
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
      justify-content: center;
      align-items: center;
	  gap: .5vw;
    }
    header .container-menu .menu-bar .container-user-info .user-info-name {
      font-size: 1.2vw;
      border: 0.1vw solid #fff;
      padding: 0.5vh 3vw;
      border-radius: 5vw;
	  text-wrap: nowrap;
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

  .tab_to_pdf{
    width:98vw;
    background-color:#fff;
    margin: 2vh 1vw;
    padding: 2vh 1vw;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
  }

  .tab_to_pdf table{
    width: 100%;
  }

  .titre_recherche{
    font-size:3vw;
    border: 1px solid black;
    margin-bottom:  3vh;
    padding:1vw;
    text-align:center;
  }
  
  .titre_niveau{
    font-size:2vw;
    border:1px solid black;
    margin: 3vh 0;
    padding: 1vh 0;
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
    }
    
    .tab_to_pdf table,#prof_info{
      width: 100vw;
      margin: 0;
      padding: 0;
      border:.2px;
    }
  }
  
  #prof_au_choix, #none{
    padding: 5vw;
    width: 50vw;
    background-color: #190306;
    border-radius: 10px;
    border: 1px solid white;
    color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
    
  .containerNone, .containerProf {
    position: fixed;
    top: 30vh;
    background: #f001;
    backdrop-filter: blur(10px);
    width: 100vw;
    height: 70vh;
    display: none;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    overflow: auto;
    padding: 2vh 0;
  }

    #prof_au_choix form{
      display:flex;
      flex-direction:column;
    }

    #prof_au_choix p{
      padding-bottom:3vw;
    }
    
    p {
      font-size: 1.1vw;
    }

    .submit{
      display:block;
      margin:auto;
    }

    #prof_au_choix form table{
      margin-bottom:3vw;
      width:100%;
      border: none;
    }

    td,th{
      text-align: center;
      font-size: 1.1vw;
    }

    #prof_au_choix form table{
      text-align: start;
    }


    .title{
      font-size: 1vw;
    }

    #show-content-table{
    	border-collapse:collapse;
      max-width: 100%;
      border: 1px solid black;
      height: 2vh;
    }

    #debug-icon {
		display: none;
	}

</style>
</head>
<body>
	<header>
      <section class="container-menu">
          <div class="menu-bar">
            <div class="menu">
              <!-- <button class="menu-sand"><i class="fa fa-bars"></i></button> -->
              <p>
		<?php 
                  if($data['statut'] == 1){
                    echo "Mr/Mme: " . $data['nom'];
                  } else {
                    echo "Etudiant: " . $data['prenom'];
                  }
                ?>
              </p>
            </div>
            <div class="title"><h1>Toutes les Unites d'Enseignements</h1></div>
            <div class="container-user-info">
              <a href="<?php echo base_url('/') ?>" class="user-info-name">Lister</a>
		<a href="<?php echo base_url('Back/form') ?>" class="user-info-name">Ajouter une UE</a>
              <a href="<?php echo base_url('ProfController/form_prof') ?>" class="user-info-name">Professeurs</a>
              <a href="<?php echo base_url('Back/schedule') ?>" class="user-info-name">EDT</a>
              <a href="<?php echo base_url('UserController/deconnexion') ?>" class="user-info-name">Deconnexion</a>
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
    <div class="containerNone">
      <section id="none">      
        <p>Aucun resultat.</p>
        <button id="dacc">OK</button>
      </section>
    </div>
    <div class="containerProf">
      <section id="prof_au_choix">
        <p>Resultat pour: <b id="pour"></b></p>
        <FORM action="<?php echo base_url('Back/form_recap') ?>" method="POST">          
          <input type="hidden" name="field" id="new_field" value="Professeur"/>
          <table>
            <tbody id="recherche_prof"></tbody>
          </table>  
          <input type="submit" class="submit" value="Envoyer"/>
        </form>
      </section>
    </div>
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

        <!-- <a href="<?php //echo base_url('Back/toPdf') ?>"><button>To PDF</button></a> -->
        <button class="topdf">Exporter en PDF</button>
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
    <?php foreach($liste as $s){ if(($s["Groupe"]==0))$s["Groupe"]="Tous";   ?>
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
    <?php foreach($liste as $s){ if(($s["Groupe"]==0))$s["Groupe"]="Tous";  ?>
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

  document.getElementById("check").addEventListener("submit", async function(event) {
    const field = document.getElementById("field");
    const to_search = document.getElementById("inpSearch");

    if(field.value == "Professeur"){
      event.preventDefault();
      const data = await postData("<?php echo base_url('Back/lesProf') ?>/ALL/"+to_search.value);
      if(data.length>0){
        document.querySelector(".containerNone").style.display="none";
        document.querySelector(".containerProf").style.display = "flex";
        const list = document.getElementById("recherche_prof");
        list.innerHTML = "";
        document.getElementById("pour").innerHTML = to_search.value;
        for(let i = 0; i < data.length; i++){
            list.innerHTML += "<tr><td><input type='radio' name='to_search' value='" + data[i]["CIN"] + "'/></td><td>" + data[i]["nomProf"]+" "+data[i]["prenomProf"] + "</td></tr>";
        }
      }
      else{
        document.querySelector(".containerProf").style.display="none";
        document.querySelector(".containerNone").style.display= "flex";
        console.log("attt");
      }
    }
  });
  
  document.getElementById("dacc").addEventListener("click",() => { document.querySelector(".containerNone").style.display="none"; });
  const topdf = document.querySelector(".topdf");

  topdf.addEventListener("click", () => {
	if (document.getElementById("none").style.display != "block" &&
          document.getElementById("form_tsotra").style.display == "block")      window.print();
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
    if(data[0].vacataire==0)vacat="Permanant"
    else vacat="Vacataire"
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
    else if(isset($liste)&&(count($liste)==0)) echo "document.querySelector('.containerNone').style.display= 'flex';";
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
