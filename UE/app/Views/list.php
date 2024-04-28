<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		input,button,select{
			margin-right:2vw;
			border-radius:10px;
		}
		input[type='text']{
			width:15vw;
		}
		input[type='submit']{
			margin-right:5vw;
		}
		table{
			margin:2vw;
		}
	</style>
        <title>Lister</title>
    </head>
    <body>

<div class="container d-flex">

	<a href="http://notre.gestion.mit/index.php/Back/form"><button class="container">Inscrire</button></a>

</div>
<hr>
<div class="container d-flex">
		<label for="level">Niveau</label>
		<select name="level" id="level">
			<option value="L1" selected>L1</option>
			<option value="L2">L2</option>
			<option value="L3">L3</option>
			<option value="M1">M1</option>
			<option value="M2">M2</option>
		</select>
		<label for="semester">Semestre</label>
		<select name="semester" id="semester">
			<option value="S1" selected>S1</option>
			<option value="S2">S2</option>
		</select>
		<label for="ue">UE</label>
		<select name="ue" id="ue">
			<option value="">none</option>
		</select>
		<FORM  action="http://notre.gestion.mit/index.php/Back/filter" methode="POST">
                <INPUT class="input" id='search_input' type="text" name="searched" required/>
                <INPUT type="submit" value="Find">
        </FORM>

	<FORM action="http://notre.gestion.mit/index.php/Back/filterAll" methode="POST">
                Filter: <INPUT class="input" type="text" name="all" required/>
                <INPUT type="submit" value="Filter">
        </FORM>

	<a href="http://notre.gestion.mit/index.php/Back/index"><button>All</button></a>

</div>

<hr>
<form action="" method="post" id="form-modify" style="display: none;">
	<label for="nameOfQue">Q.U.E</label>
	<input type="text" name="nameOfQue" id="nameOfQue" required>
	<label for="nameOfProf">Nom du Prof</label>
	<input type="text" name="nameOfProf" id="nameOfProf" required>
	<label for="valueOfCredit">Credit</label>
	<input type="number" name="valueOfCredit" id="valueOfCredit" required>
	<label for="nameOfHours">Heure</label>
	<input type="number" name="nameOfHours" id="nameOfHours" required>
	<input type="submit" value="apply">
</form>
<hr>
		<TABLE class="container table table-striped">
			<THEAD>
				<!-- <th>Id</th>
				<th>Niveau</th>
				<th>Semestre</th>
				<th>UE</th> -->
				<th>QUE</th>
				<th>Professeur</th>
				<th>Credit</th>
				<th>Heure</th>
				<th>Actions</th>

			</THEAD>
			<TBODY class="tbody">
<?php
	$i=0;
	// foreach($liste as $l){
	// 	$i++;
	// 	echo "<TR>";
		// echo "<TD>".$l["id"]."</TD>";
		// echo "<TD>".$l["nomNiveau"]."</TD>";
		// echo "<TD>".$l["nomSemestre"]."</TD>";
		// echo "<TD>".$l["nomUe"]."</TD>";

		// echo "<TD>".$l["nomQUE"]."</TD>";
		// echo "<TD>".$l["credit"]."</TD>";
		// echo "<TD>".$l["nomProf"]."</TD>";
		// echo "<TD>".$l["heure"]."</TD>";

	// 	echo "<TD><a href='http://notre.gestion.mit/index.php/Back/delete_que/".$l["id"]."'>Delete</a></TD>";
	// 	echo "<TD><a href='http://notre.gestion.mit/index.php/Back/modify/".$l["id"]."'>Modify</a></TD>";

	// 	echo "</TR>";
	// }
?>
			</TBODY>
		</TABLE>



<script>

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


	async function display_data(id, s){
		const data = await postData("http://notre.gestion.mit/index.php/Back/filter");

		const levelValue = document.querySelector("#level").value;
		const semesterValue = document.querySelector("#semester").value;
		document.querySelector(".tbody").innerHTML = "";
		const ueSelect = document.querySelector("#ue");
		if(s!="ue") {
			const none = document.createElement("option");
			none.value = "none";
			none.innerText = "none";
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

	function createTbody(data) {
		const tbody = document.querySelector(".tbody");
		tbody.innerHTML = "";
		data.map((element) => {
			const tr = document.createElement("tr");

			for(let i=0;i<5;i++){
				const td = document.createElement("td");
				switch(parseInt(i)){
					case 0:
						td.innerHTML=element.nomQUE;
						break;
					case 1:
						td.innerHTML=element.nomProf;
						break;
					case 2:
						td.innerHTML=element.credit;
						break;
					case 3:
						td.innerHTML=element.heure;
						break;
					case 4:
						const mod = document.createElement("button");
						// mod.classlist.add("btn-content");
						// mod.setAttribute("onclick", show());
						// mod.setAttribute("href", "http://notre.gestion.mit/index.php/Back/modify/"+element.id);
						mod.innerText = "Modify";
						
						mod.addEventListener('click', ()=>{
							const form_content = document.querySelector("#form-modify");
							form_content.style.display = "block";
						});
						td.appendChild(mod);
						const del = document.createElement("a");
						del.setAttribute("href", "http://notre.gestion.mit/index.php/Back/delete_que/"+element.id);
						del.innerText = "Delete";
						td.appendChild(del);
						break;
				}
				
				tr.appendChild(td);
			}
			tbody.appendChild(tr);
		});
	}

	display_data();

</script>

	</BODY>
</HTML>
