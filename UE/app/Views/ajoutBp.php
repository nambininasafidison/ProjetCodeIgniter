<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ajouter</title>
<style>

  /* Style background */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
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
      padding: 0.5vh 5vw;
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
  /* Formulaire */
    .form {
      margin:auto;
      margin-top:2vh;
      width: 95vw;
      height: 85vh;
      background-color: #fff;
      border-radius: 1.5vw;
      overflow: hidden;
      clip-path: polygon(0 0, 15% 0, 20% 9%, 95% 9%, 100% 14%, 100% 100%, 0 100%);
    }

    .containerInput {
      margin:auto;
      width: 90%;
      height: 73%;
      border: 1px solid #000;
      margin-top: 15vh;
      border-radius: 1vw;
      padding: 2vh;
    }

    .checkbox {
      display: flex;
      align-items: center;
    }

    .input,.checkbox,button {
      position: relative;
      height: 10vh;
      top: 2vh;
    }

    .input input, .input select, button,.checkbox {
      min-width: 12vw;
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
      top: -1vh;
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
    
    .flex{
      display:flex;
      justify-content:space-around;
    }

    .flexEt {
      width: 84vw;
    }


    .contents {
      height: 39vh;
      max-height: 39vh;
      overflow-y: auto;
      overflow-x: hidden;
      padding-right: .5vw;
      margin-right: -.5vw;
    }

    .ajoutc {
      border: none;
      padding: 0;
      height: 3vh;
      font-size: 1vw;
      min-width: 10vw;
    }

    .generate {
      font-size: 1vw;
      cursor: pointer;
    }

    .containerECUE {
      width: 59.4vw;
      display: flex;
      flex-direction: column;
    }

    .profGrp {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      margin-left: 1vw;
    }

    .jour {
      width: 12vw;
      height: 5.5vh;
      border-radius: 4vw;
      background: none;
      margin-top: 2vh;
      border: 1px solid #000;
      padding: 0 .5vw;
      font-size: .8vw;
    }
    
    .title {
      font-size: 1vw;
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
            <div class="title"><h1>Ajouter une Unite d'Enseignement</h1></div>
            <div class="container-user-info">
                <div class="user-info-name">
				          <a href="<?php echo base_url('/') ?>">Lister</a>
                </div>
                <div class="user-info-name">
				          <a href="<?php echo base_url('Back/form_recap') ?>">Recapitulation</a>
                </div>
		        	  <div class="user-info-name">
                  <a href="<?php echo base_url('ProfController/form_prof') ?>" class="btn btn-primary">Ajouter un prof</a>
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

    <form class="form" action="/index.php/Back/insert" method="post">
      <div class="containerInput">
        <div class="flex"><div class="input">
          <label for="level">Niveau</label>
          <select name="level" id="level">
            <option value="1" selected>L1</option>
            <option value="2">L2</option>
            <option value="3">L3</option>
            <option value="4">M1</option>
            <option value="5">M2</option>
          </select>
        </div>
      <div class="input">
          <label for="semester">Semestre</label>
          <select name="semester" id="semester">
            <option value="1" selected>S1</option>
            <option value="2">S2</option>
          </select>
      </div>
      <div class="input">
        <label for="name0">Nom de l'U.E</label>
        <input type="text" name="name0" id="name0" />
      </div>
      <div>
        <div class="checkbox">
          <input type="checkbox" name="que" id="que" />
          <label for="que">E.C.U.E</label>
        </div>
      </div>
    </div>

      <div class="isnotque">
        <div class="flex">
          <div class="input">        
            <label for="prof0">Nom du Prof.</label>
            <select name="prof0" id="prof0">
              <?php foreach($prof as $p){?>
                <option value="<?=$p["id"]?>"><?=$p["nomProf"]?> <?=$p["prenomProf"]?> </option>
              <?php } ?>
            </select>
          </div>
          <div class="input">
            <label for="credit0">Credit</label>
            <input type="number" name="credit0" id="credit0" min="1"/>
          </div>
          <select name="jour0" id="jour0" class="jour">
              <option value="1">Lundi</option>
              <option value="2">Mardi</option>
              <option value="3">Mercredi</option>
              <option value="4">Jeudi</option>
              <option value="5">Vendredi</option>
              <option value="6">Samedi</option>
              <option value="7">Dimanche</option>
          </select>
          <div class="input horaire">
            <label for="heure_edt_debut0">Horaire debut:</label>
            <input type="time" id="heure_edt_debut0" name="heure_edt_debut0" placeholder="08:00" class="begin">
          </div>
          <div class="input horaire">
            <label for="heure_edt_fin0">Horaire fin:</label>
            <input type="time" id="heure_edt_fin0" name="heure_edt_fin0" placeholder="17:00" class="end">
          </div>
          <div class="containerCheckbox1">
            <div class="checkbox ajoutc">
              <input type="checkbox" id="ED0" name="ED0" class="Checkbox ueCheck">
              <label for="ED0">Ajouter ED</label>
            </div>
            <div class="checkbox ajoutc">
              <input type="checkbox" id="EP0" name="EP0" class="Checkbox ueCheck">
              <label for="EP0">Ajouter EP</label>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="isque" style="display: none">
          <div class="flex">
            <div class="input">
              <label for="number">Nombre de E.C.U.E</label>
              <input type="number" name="number" id="number" />
            </div>
            <button class="generate">Generer</button>
          </div>
          <div class="contents"></div>
        </div>
      </div>
    </div>
    <div class="input"><input type="submit" value="Enregistrez" /></div>
    </form>

  <!-- Script -->
<script>


  const que = document.querySelector("#que");
  const isque = document.querySelector(".isque");
  const isnotque = document.querySelector(".isnotque");
  const number = document.querySelector("#number");
  const genarate = document.querySelector(".generate");
  const contents = document.querySelector(".contents");
  const level = document.querySelector("#level");
  const semester = document.querySelector("#semester");
  const begin = document.querySelectorAll(".begin");
  const end = document.querySelectorAll(".end");
  let isTime = true;

  const timeToFloat = (time) => {
    return time != "" ? parseInt(time.split(":")[0]) * 60 + parseInt(time.split(":")[1]) : 0;
  }
  
  begin.forEach((e) => {
    e.addEventListener("change", () => {
      const num = e.getAttribute('id')[e.getAttribute('id').length-1];
      const beginValue = timeToFloat(e.value);
      const endValue = timeToFloat(document.querySelector("#heure_edt_fin"+num).value);
      // console.log("debut",beginValue,endValue,beginValue>endValue&&endValue!=0);
      isTime = (beginValue>=endValue&&endValue!=0) ? false : true;
      // console.log(isTime);
    })
  });

  end.forEach((e) => {
    e.addEventListener("change", () => {
      const num = e.getAttribute('id')[e.getAttribute('id').length-1];
      const endValue = timeToFloat(e.value);
      const beginValue = timeToFloat(document.querySelector("#heure_edt_debut"+num).value);
      // console.log("fin",beginValue,endValue,beginValue>endValue&&endValue!=0);
      isTime = (beginValue>=endValue&&endValue!=0) ? false : true;
      // console.log(isTime);
    })
  });

  document.querySelector(".form").addEventListener("submit", (e) => {
    const res = confirm("Voulez-vous vraiment ajouter cette UE?");
      if(res) {
        if(!isTime) { 
          e.preventDefault();
          alert("Horaire non validé");
        }
      }
      else {
        e.preventDefault();
      }
  });

  const ueCheck = document.querySelectorAll(".ueCheck");
  ueCheck.forEach((e) => {
    e.addEventListener("change", async () => {
      const grpNumber = await getGroupNumber();
      const id = e.getAttribute("id")
      if (e.checked) {
        isnotque.appendChild(createEInputs(id, grpNumber));
      }
      else {
        const delDiv = document.querySelector(".container"+ id);
        isnotque.removeChild(delDiv);
      }
    });
  })
 

  const options = (n) => {
    const option = document.createElement("option");
    option.innerText = "S" + n;
    option.setAttribute("value", n);
    return option;
  };

  level.addEventListener("change", () => {
    let option = document.createElement("option");
    let option1 = document.createElement("option");
    semester.innerHTML = "";
    const n = parseInt(level.value);
    switch (n) {
      case 1:
        option = options(1);
        option1 = options(2);
        break;
      case 2:
        option = options(3);
        option1 = options(4);
        break;
      case 3:
        option = options(5);
        option1 = options(6);
        break;
      case 4:
        option = options(7);
        option1 = options(8);
        break;
      case 5:
        option = options(9);
        option1 = options(10);
        break;
    }
    semester.appendChild(option);
    semester.appendChild(option1);
  });

  que.addEventListener("change", () => {
    isque.style.display = que.checked ? "block" : "none";
    isnotque.style.display = que.checked ? "none" : "block";
  });

  genarate.addEventListener("click", (e) => {
    e.preventDefault();
    const n = number.value;
    contents.innerHTML = "";
    if (n > 0 && n < 5) {
      for (let i = 0; i < n; i++) {
        contents.appendChild(createQueInputs(i + 1));
      }
    }
    const ED = document.querySelectorAll(".Checkbox");
    ED.forEach((e) => {
      e.addEventListener("change", async () => {
        const id = e.getAttribute("id");
	      const grpNumber = await getGroupNumber();
        const ndiv = document.querySelector(".containerECUE"+ id.split(/[A-Z]/)[2]);
        if (e.checked) {
          ndiv.appendChild(createEInputs(id, grpNumber));
        }
        else {
          const delDiv = document.querySelector(".container"+ id);
          ndiv.removeChild(delDiv);
        }
      });
    })
  });

  const createEInputs = (n, m) => {
    const div = document.createElement("div");
    div.classList.add("container" + n);
    div.classList.add("profGrp");
    for(let j = 1; j <= m ; j++) {
      for (let i = 1; i < 5; i++) {
        const div_input = document.createElement("div");
        const select = document.createElement("select");
        const input = document.createElement("input");
        const label = document.createElement("label");
        div_input.setAttribute('class','input');
        switch(i) {
          case 1:
            label.setAttribute("for", "prof" + n + "G" + j);
            label.innerText = "Nom du Prof. " + n + "G" + j;
            const profs = document.querySelector("#prof0");
            select.setAttribute("id", "prof" + n + "G" + j);
            select.setAttribute("name", "prof" + n + "G" + j);
            select.innerHTML = profs.innerHTML;
            break;
          case 2:
            label.setAttribute("for", "jour" + n + "G" + j);
            label.innerText = "Jour";
            const jours = document.querySelector("#jour0");
            select.setAttribute("id", "jour" + n + "G" + j);
            select.setAttribute("name", "jour" + n + "G" + j);
            select.innerHTML = jours.innerHTML;
            break;
          case 3:
            label.setAttribute("for", "heure_edt_debut" + n + "G" + i);
            label.innerText = "Debut";
            input.setAttribute("type", "time");
            input.setAttribute("id", "heure_edt_debut" + n + "G" + i);
            input.setAttribute("name", "heure_edt_debut" + n + "G" + i);
            input.classList.add("begin");
            break;
          case 4:
            label.setAttribute("for", "heure_edt_fin" + n + "G" + i);
            label.innerText = "Fin";
            input.setAttribute("type", "time");
            input.setAttribute("id", "heure_edt_fin" + n + "G" + i);
            input.setAttribute("name", "heure_edt_fin" + n + "G" + i);
            input.classList.add("end");
            break;
        }
        div_input.appendChild(label);
        select.innerHTML != "" ? div_input.appendChild(select) : div_input.appendChild(input);
        div.appendChild(div_input);    
      }
    }
    return div;
  };

  const createQueInputs = (n) => {
    const divECUE = document.createElement("div");
    const div = document.createElement("div");
    divECUE.classList.add("containerECUE" + n);
    divECUE.classList.add("containerECUE");
    div.classList.add("container" + n);
    div.classList.add("flex"); 
    div.classList.add("flexEt"); 
    for (let i = 1; i < 8; i++) {
      const div_input = document.createElement("div");
      const input = document.createElement("input");
      const label = document.createElement("label");
      const select = document.createElement("select");
      const div1 = document.createElement("div");
      div1.classList.add("containerCheckbox" + n);
      div_input.setAttribute('class','input');

      switch (i) {
        case 1:
          label.setAttribute("for", "name" + n);
          label.innerText = "E.C.U.E n:" + n;
          input.setAttribute("type", "text");
          input.setAttribute("id", "name" + n);
          input.setAttribute("name", "name" + n);
          break;
        case 2:
          label.setAttribute("for", "prof" + n);
          label.innerText = "Prof. n:" + n;
          const profs = document.querySelector("#prof0");
          select.setAttribute("id", "prof" + n);
          select.setAttribute("name", "prof" + n);
          select.innerHTML = profs.innerHTML;
          break;
        case 3:
          label.setAttribute("for", "credit" + n);
          label.innerText = "Credit n:" + n;
          input.setAttribute("type", "number");
          input.setAttribute("id", "credit" + n);
          input.setAttribute("name", "credit" + n);
          break;
        case 4:
          label.setAttribute("for", "jour" + n);
          label.innerText = "Jour";
          const jours = document.querySelector("#jour0");
          select.setAttribute("id", "jour" + n);
          select.setAttribute("name", "jour" + n);
          select.innerHTML = jours.innerHTML;
          break;
        case 5:
          label.setAttribute("for", "heure_edt_debut" + n);
          label.innerText = "Debut";
          input.setAttribute("type", "time");
          input.setAttribute("id", "heure_edt_debut" + n);
          input.setAttribute("name", "heure_edt_debut" + n);
          input.classList.add("begin");
          break;
        case 6:
          label.setAttribute("for", "heure_edt_fin" + n);
          label.innerText = "Fin";
          input.setAttribute("type", "time");
          input.setAttribute("id", "heure_edt_fin" + n);
          input.setAttribute("name", "heure_edt_fin" + n);
          input.classList.add("end");
          break;
        case 7:
          const checkbox0 = document.createElement("div");
          const input0 = document.createElement("input");
          const label0 = document.createElement("label");
          label0.setAttribute("for", "ED" + n);
          label0.innerText = "Ajouter ED";
          input0.setAttribute("type", "checkbox");
          input0.setAttribute("id", "ED" + n);
          input0.setAttribute("name", "ED" + n);
          input0.classList.add("Checkbox");
          checkbox0.classList.add("checkbox");
          checkbox0.classList.add("ajoutc");
          checkbox0.appendChild(input0);
          checkbox0.appendChild(label0);
          div1.appendChild(checkbox0);

          const checkbox1 = document.createElement("div");
          const input1 = document.createElement("input");
          const label1 = document.createElement("label");
          label1.setAttribute("for", "EP" + n);
          label1.innerText = "Ajouter EP";
          input1.setAttribute("type", "checkbox");
          input1.setAttribute("id", "EP" + n);
          input1.setAttribute("name", "EP" + n);
          input1.classList.add("Checkbox");
          checkbox1.classList.add("checkbox");
          checkbox1.classList.add("ajoutc");
          checkbox1.appendChild(input1);
          checkbox1.appendChild(label1);
          div1.appendChild(checkbox1);

          break;
      }
      div_input.appendChild(label);
      select.innerHTML != "" ? div_input.appendChild(select) : div_input.appendChild(input);
      (div1.innerHTML != "") ? div.appendChild(div1) : div.appendChild(div_input);
    }
    divECUE.appendChild(div);
    return divECUE;
  };

  const levelConverter = (id) => {
    let levelConverted = "";
    switch(id) {
      case "1": levelConverted = "L1"; break;
      case "2": levelConverted = "L2"; break;
      case "3": levelConverted = "L3"; break;
      case "4": levelConverted = "M1"; break;
      case "5": levelConverted = "M2"; break;
    }

    return levelConverted;
  }

	getSchedule();

  async function getSchedule() {
    const schedule = await postData("<?php echo base_url('/index.php/Back/filterEdt') ?>");
    console.log(schedule[levelConverter(level.value)]["S"+semester.value]);
 	  // return grpnum[level.value];
  }

  async function getGroupNumber() {
    const grpnum = await postData("<?php echo base_url('/index.php/Back/nEtudiant') ?>");
    // console.log(grpnum,level.value);
 	  // return grpnum[level.value];
    return 2;
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

</body>

</html>
