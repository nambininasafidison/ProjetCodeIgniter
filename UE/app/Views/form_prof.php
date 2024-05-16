<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Ajouter</title>
<style>

  /* Style background */
      * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: pop;
    }


    @font-face {
      font-family: pop;
      src: url(../assets/FontsFree-Net-Poppins-Medium.ttf);
    }

    body {
      width: 100vw;
      height: 100vh;
      background-color: #190306;
      /*overflow: hidden; */
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
  /* Formulaire */
    .form {
      margin-top:2vh;
      width: 98vw;
      height: 78vh;
      margin: 0 1vw;
      background-color: #fff;
      border-radius: 1.5vw;
      overflow: hidden;
    }

    .containerInput {
      width: 96vw;
      height: 62vh;
      border: 1px solid #000;
      margin: 2vh 1vw;
      border-radius: 1vw;
      padding: 6vh;
    }

    .input,.checkbox,button {
      position: relative;
      height: 10vh;
      top: 2vh;
    }

    .input input, select, button,.checkbox, .del {
      height: 5.5vh;
      border-radius: 4vw;
      border: 1px solid #000;
      background-color: #fff;
      padding: 1.25vh 1vw;
      font-size: 1vw;
    }
    
    .input input, select, .checkbox {
      width: 26vw;
      
    }

    .checkbox {
      display: flex;
      align-items: center;
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
      background-color:grey;
    }

    .input button{
      position:relative;
      top:-0vh;
    }

    .flex{
      display:flex;
      justify-content:space-around;
    }

    #lister_les_prof, #ajouter_prof{
      width: 40vw;
      margin-right: 1vw;
      position: absolute;
      left: 33vw;
      font-size: 1.1vw;
    }

    .table{
      width: 100%;
      overflow:scroll;      
    }
    td,th{
      text-align:center;
      font-size: 1vw;
    }

    .title{
	    font-size: 1vw;
    }

    #debug-icon {
		display: none;
	}

  .options {
		display: flex;
		align-items: center;
		justify-content: center;
    gap: 1vw;
	}

  .del {
    color: #000;
    padding: .5vh 2vw;
    top: 0;
    height: 4vh;
    display: flex;
    align-items: center;
  }

  #btn {
    font-size: 1.1vw;
  }

  nav ul {
    display: flex;
    list-style: none;
    gap: 1vw;
  }
  
  /* nav ul li {
    
  } */

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
            <div class="title"><h1>Ajouter une Unite d'Enseignement</h1></div>
            <div class="container-user-info">
              <a href="<?php echo base_url('/') ?>" class="user-info-name">Lister</a>
              <a href="<?php echo base_url('Back/form') ?>" class="user-info-name">Ajouter une UE</a>
              <a href="<?php echo base_url('Back/form_recap') ?>" class="user-info-name">Recapitulation</a>
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

    <div class="input">
      <button id="lister_les_prof" >Lister les professeurs existants</button>
    </div>
  <form class="form" action="<?php echo base_url('ProfController/insert') ?>" method="post"  onSubmit="return confirmer();">
<!-- Lister -->
      <div class="containerInput" id="list" style="display:none;">
          <table class="table">
            <thead>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Grade</th>
              <th>Courriel</th>
              <th>Options</th>
            </thead>
            <?php foreach($profs as $p){?>
              <tr>
                <td><?=$p["nomProf"]?></td>
                <td><?=$p["prenomProf"]?></td>              
                <td><?=$p["nomGrade"]?></td>
                <td><?=$p["mail"]?></td>
                <td class="options">
                  <button class="del mod" id="modifier<?= $p["id"]?>">Modifier</button>
                  <a href="http://dev.ue/Back/delete_ecue/<?= $p["id"]?>" class="del" onclick="return confirm('Voulez-vous vraiment le supprimer?');">Supprimer</a>
                </td>
              </tr>          
            <?php } ?>
          </table>
          <?=$pager->links()?>
      </div>
<!-- Formulaire -->
    <div class="containerInput" id="formulaire">
      <div class="flex">
        <div class="input">
          <label for="nom">Nom:</label>
          <input type="text" name="nom" id="nom" required/>
        </div>
        <div class="input">
          <label for="prenom">Prenom:</label>
          <input type="text" name="prenom" id="prenom" required/>
        </div>
      </div>
      <div class="flex">
        <div class="input">        
          <label for="CIN">CIN:</label>
          <input type="text"pattern="[0-9]{12}" name="CIN" id="CIN" required/>          
        </div>
        <div class="input">
          <label for="adresse">Adresse</label>            
          <input type="text" name="adresse" id="adresse" required/>
        </div>
      </div>
      <div class="flex">
        <div class="input">        
          <label for="grade">Grade:</label>
          <select name="grade" id="grade">
            <?php
                foreach ($grades as $grade){
                    echo "<option value='".$grade['id']."' >".$grade['nomGrade']." </option>";
                }
              ?>           
          </select>
        </div>
        <div class="checkbox">
          <input type="checkbox" name="vacataire" value="false" id="vacataire" />
          <label for="Vacataire">Permanant</label>
        </div>
      </div>
      <div class="flex">
        <div class="input" id ="matricule" style="display:none;">
          <label for="matricule">Matricule:</label>
          <input type="text" name="matricule" id="input_matricule"/>
        </div>
      </div>
      <div class="flex">
        <div class="input">
          <label for="tel">Tel:</label>
          <input type="text" pattern="(032|033|034|037|038|020) [0-9]{2} [0-9]{3} [0-9]{2}" name="tel" id="tel" placeholder="03x xx xxx xx " />
        </div>
        <div class="input">
          <label for="mail">Mail:</label>
          <input type="email" name="mail" id="mail" />
        </div>
      </div>
    </div>
    <div class="input">
      <input type="submit" value="Enregistrez" id="btn"/>
    </div>
  </form>

    <script src="index.js"></script>
  </body>

  <!-- Script -->
<script>
  const vac = document.getElementById("vacataire");
  const mod = document.querySelectorAll(".mod");
  const form = document.querySelector(".form");
  const choix1 = document.getElementById("lister_les_prof");
  mod.forEach((e) => {
    e.addEventListener("click", async () => {
      document.getElementById("list").style.display="none";
      document.getElementById("formulaire").style.display="block";                  
      document.querySelector('.containerInput').style.height = "62vh";
      const id = e.getAttribute('id').slice(8);
      const dataProf = await getProf(id);
      const name = document.querySelector("#nom");
      const lastName = document.querySelector("#prenom");
      const cin = document.querySelector("#CIN");
      const address = document.querySelector("#adresse");
      const grade = document.querySelector("#grade");
      const matricule = document.querySelector("#input_matricule");
      const vacataire = document.querySelector("#vacataire");
      const tel = document.querySelector("#tel");
      const mail = document.querySelector("#mail");
      const submit = document.querySelector("#btn");
      choix1.innerHTML= "Lister les professeurs existants";
      submit.value="Modifier";
      submit.style.display="block";
      name.value = dataProf.nomProf;
      lastName.value = dataProf.prenomProf;
      cin.value = dataProf.CIN;
      address.value = dataProf.adresse;
      Array.from(grade)[dataProf.idGrade-1].setAttribute("selected",true);
      matricule.value = dataProf.matricule;
      (!parseInt(dataProf.vacataire)) ? document.getElementById("matricule").style.display = "block" : document.getElementById("matricule").style.display = "none";
      vacataire.checked = !parseInt(dataProf.vacataire);
      tel.value = dataProf.tel;
      mail.value = dataProf.mail;
    });
  });
  
  vac.addEventListener("change", () => {
    document.getElementById("matricule").style.display = vac.checked ? "block" : "none";
    document.getElementById("input_matricule").setAttribute("required","");
  });

  choix1.addEventListener("click", ()=>{
    if(choix1.innerHTML!="Ajouter un professeur"){
      document.getElementById("list").style.display="block";
      document.getElementById("formulaire").style.display="none";
      choix1.innerHTML="Ajouter un professeur";
      document.getElementById("btn").style.display="none";
      document.querySelector('.containerInput').style.height = "74vh";
    }
    else{
      document.getElementById("list").style.display="none";
      document.getElementById("formulaire").style.display="block";          
      choix1.innerHTML="Lister les professeurs existants";
      document.getElementById("btn").style.display="block";
      document.querySelector('.containerInput').style.height = "62vh";
    }
  });

  async function getProf(id) {
    const dataProf = await postData("<?php echo base_url('/index.php/ProfController/returnData') ?>");
    return dataProf[id];
  }

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

</script>

</html>
