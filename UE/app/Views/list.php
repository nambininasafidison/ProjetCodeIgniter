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
      overflow: hidden;
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
		top: 0;
		height: 4vh;
		font-size: 1vw;
		padding: .8vh 1vw;
	}

  /* Liste */
	.form {
		margin:auto;
		margin-top:2vh;
		padding: 2vh 1vw;
		width: 98vw;
		max-height: 69vh;
		background-color: #fff;
		border-radius: 1.5vw;
		overflow: hidden;
		font-size: 1.2vw;
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
		justify-content: space-evenly;
	}

</style>
</head>
<body>
	<?php if(isset($error)){ ?>
    	<script>alert("<?= $error ?>")</script>
  	<?php } ?>
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
				<a href="<?php echo base_url('Back/form') ?>" class="user-info-name">Ajouter une UE</a>
				<a href="<?php echo base_url('Back/form_recap') ?>" class="user-info-name">Recapitulation</a>
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

	<div class="flex">
		<div class="input">
			<label for="level">Niveau</label>
			<select name="level" id="level">
				<option value="L1" selected>L1</option>
				<option value="L2">L2</option>
				<option value="L3">L3</option>
				<option value="M1">M1</option>
				<option value="M2">M2</option>
			</select>
		</div>
		<div class="input">
			<label for="semester">Semestre</label>
			<select name="semester" id="semester">
				<option value="S1" selected>S1</option>
				<option value="S2">S2</option>
			</select>
		</div>

			<FORM action="<?php echo base_url('Back/delete_ue') ?>" method="post">
				<div class="input">
					<label for="ue">UE</label>
					<select name="ue" id="ue">
						<option value="">rien</option>
					</select>
				</div>
				<div class="input"><input type="submit" value="Supprimer l'UE"/></div>
			</FORM>
			<FORM action="<?php echo base_url('Back/form_search') ?>" methode="POST">
				<div class="input">
					<label for="searched">Filtrer</label> 
					<input type="text" name="searched" required/>
				</div>
				<div class="input"><INPUT type="submit" value="Filtrer"></div>
			</FORM>
		<a href="<?php echo base_url('/') ?>/"><button>Tous</button></a>
	</div>
	<hr>

	<form action="" method="post" id="form-modify" style="display: none;" onSubmit="return confirmer();">
		<div class="flex">
			<h4>Modifier:</h4>
			<div class="input">
				<label for="nameOfEcue">E.C.U.E</label>
				<input type="text" name="nameOfEcue" id="nameOfEcue" required>
			</div>
			<div class="input">        
          		<label for="nameOfProf">Nom du Prof.</label>
          		<select name="nameOfProf" id="nameOfProf">
        		  <?php foreach($prof as $p){?>
        		    <option value="<?=$p["id"]?>"><?=$p["nomProf"]?> <?=$p["prenomProf"]?></option>
        		  <?php } ?>
    	      </select>
	        </div>
			<div class="input">
				<label for="valueOfCredit">Credit</label>
				<input type="number" name="valueOfCredit" id="valueOfCredit" required>
			</div>
			<div class="input">
				<select name="jour" id="jour" class="jour">
					<option value="1">Lundi</option>
					<option value="2">Mardi</option>
					<option value="3">Mercredi</option>
					<option value="4">Jeudi</option>
					<option value="5">Vendredi</option>
					<option value="6">Samedi</option>
				</select>
			  </div>

			<div class="input">
				<label for="heure_edt_debut0">Heure debut :</label>
				<input type="time" id="heure_edt_debut0" name="heure_edt_debut0" placeholder="08:00" class="begin" required>
			</div>
			<div class="input">
				<label for="heure_edt_fin0">Heure fin:</label>
				<input type="time" id="heure_edt_fin0" name="heure_edt_fin0" placeholder="17:00" class="end" required>
			</div>
			<div class="input"><input type="submit" value="apply"></div>
		</div>
	</form>
	<hr>

	<TABLE class="form">
		<THEAD>
			<th>ECUE</th>
			<th>Professeur</th>
			<th>Credit</th>
			<th>Heure</th>
			<th>Enseignement</th>
			<th>Groupe</th>
			<th>Actions</th>
		</THEAD>

		<TBODY class="tbody">

		</TBODY>

	</TABLE>

    <!-- Les scripts -->
<script>
	//Confirmer
	function confirmer(){
      reponse = confirm("Voulez-vous vraiment le modifier?");
	  return reponse;
	}

	//Gestion Niveau et Semestre
	function niv_and_semester(){
		const level = document.querySelector("#level");
		const semester = document.querySelector("#semester");
		const ue = document.querySelector("#ue");
		const select = [level, semester, ue];

		const options = (n) => {
		const option = document.createElement("option");
		option.innerText = "S" + n;
		option.setAttribute("value", "S" + n);
		return option;
		};

		select.map((items) => {
			items.addEventListener("change", () => {
				const selected = items.getAttribute("name");
				console.log();
				display_data(items.value, selected);
			});
		})

		level.addEventListener("change", () => {
		let option = document.createElement("option");
		let option1 = document.createElement("option");
		semester.innerHTML = "";
		const n = level.value;
		switch (n) {
			case "L1":
			option = options(1);
			option1 = options(2);
			break;
			case "L2":
			option = options(3);
			option1 = options(4);
			break;
			case "L3":
			option = options(5);
			option1 = options(6);
			break;
			case "M1":
			option = options(7);
			option1 = options(8);
			break;
			case "M2":
			option = options(9);
			option1 = options(10);
			break;
		}
		semester.appendChild(option);
		semester.appendChild(option1);
		});
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
	async function display_data(id, s){
		const data = await postData("<?php echo base_url('Back/filter') ?>");
		console.log(data);
		const levelValue = document.querySelector("#level").value;
		const semesterValue = document.querySelector("#semester").value;
		document.querySelector(".tbody").innerHTML = "";
		const ueSelect = document.querySelector("#ue");
		if(s!="ue") {
			const none = document.createElement("option");
			none.value = "none";
			none.innerText = "neant";
			ueSelect.innerHTML = "";
			ueSelect.appendChild(none);
		}
		data[levelValue][semesterValue].map((ue) => {
			if(s!="ue") {
				const ueOption = document.createElement("option");
				ueOption.value = ue[0];
				ueOption.innerText = ue[1];
				ueSelect.appendChild(ueOption);
			}
			if(id == ue[0]){
				createTbody(ue[2]);
			}
		});
	}

	//Afficher le table de ECUE    
	function createTbody(data) {
		const tbody = document.querySelector(".tbody");
		tbody.innerHTML = "";
		data.map((element) => {
			const tr = document.createElement("tr");

			for(let i=0;i<7;i++){
				const td = document.createElement("td");
				switch(parseInt(i)){
					case 0:
						td.innerHTML=element.nomECUE;
						break;
					case 1:
						td.innerHTML=element.nomProf +" "+ element.prenomProf;
						break;
					case 2:
						td.innerHTML=element.credit;
						break;
					case 3:
						td.innerHTML=element.heure;
						break;
					case 4:
						td.innerHTML=element.type;
						break;
					case 5:
						if(element.groupe==null)element.groupe="--";
						td.innerHTML=element.groupe;
						break;
					case 6:
						const mod = document.createElement("button");
						mod.innerText = "Modifier";
						mod.setAttribute("class", "del");
						mod.addEventListener('click', ()=>{
							const form_content = document.querySelector("#form-modify");
							
							options = document.querySelectorAll("#nameOfProf option");
							for(opt of options){
								if(opt.innerHTML == element.nomProf+" "+element.prenomProf){
									opt.setAttribute("selected","");
								}
								console.log(opt.innerHTML+" et "+element.nomProf+" "+element.prenomProf+"\n");
							}

							j = document.querySelectorAll("#jour option");
							for(opt of j){
								if(opt.innerHTML == element.jour){
									opt.setAttribute("selected","");
								}
								console.log(opt.innerHTML+" et "+element.nomProf+" "+element.prenomProf+"\n");
							}

							document.getElementById("nameOfEcue").setAttribute('value',element.nomECUE);
							document.getElementById("valueOfCredit").setAttribute('value',element.credit);
							document.getElementById("heure_edt_debut0").setAttribute('value',element.heure_edt_debut);
							document.getElementById("heure_edt_fin0").setAttribute('value',element.heure_edt_fin);
							form_content.action = "<?php echo base_url('Back/update_ecue') ?>/"+element.id;
							form_content.style.display = "block";
						});
						td.appendChild(mod);
						const del = document.createElement("a");
						del.setAttribute("href", "<?php echo base_url('Back/delete_ecue') ?>/"+element.id);
						del.setAttribute("class", "del");
						del.setAttribute("onCLick","return confirm('Voulez-vous vraiment le supprimer?');");
						del.innerText = "Supprimer";
						td.appendChild(del);
						td.classList.add("options");
						break;
				}
				
				tr.appendChild(td);
			}
			tbody.appendChild(tr);
		});
	}

	niv_and_semester();
	display_data();

</script>

	</BODY>
</HTML>
