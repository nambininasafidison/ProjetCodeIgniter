<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Ajouter</title>
  </head>
  <body>
    <form action="http://notre.gestion.mit/Back/insert" method="post">
      <label for="level">Niveau</label>
      <select name="level" id="level">
        <option value="1" selected>L1</option>
        <option value="2">L2</option>
        <option value="3">L3</option>
        <option value="4">M1</option>
        <option value="5">M2</option>
      </select>
      <label for="semester">Semestre</label>
      <select name="semester" id="semester">
        <option value="1" selected>S1</option>
        <option value="2">S2</option>
      </select>
      <label for="name0">Nom de l'U.E</label>
      <input type="text" name="name0" id="name0" />
      <div class="isnotque">
        <label for="prof0">Nom du Professeur</label>
        <input type="text" name="prof0" id="prof0" />
        <label for="credit0">Credit</label>
        <input type="number" name="credit0" id="credit0" />
        <label for="hour0">Heures</label>
        <input type="number" name="hour0" id="hour0" />
      </div>
      <input type="checkbox" name="que" id="que" />
      <label for="que">Q.U.E</label>
      <div class="isque" style="display: none">
        <label for="number">Nombre de Q.U.E</label>
        <input type="number" name="number" id="number" />
        <button class="generate">Generer</button>
        <div class="contents"></div>
      </div>
      <input type="submit" value="Enregistrez" />
    </form>
    <script src="index.js"></script>
  </body>
<script>
const que = document.querySelector("#que");
const isque = document.querySelector(".isque");
const isnotque = document.querySelector(".isnotque");
const number = document.querySelector("#number");
const genarate = document.querySelector(".generate");
const contents = document.querySelector(".contents");
const level = document.querySelector("#level");
const semester = document.querySelector("#semester");

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
});

const createQueInputs = (n) => {
  const div = document.createElement("div");
  div.classList.add("container" + n);
  for (let i = 1; i < 5; i++) {
    const input = document.createElement("input");
    const label = document.createElement("label");
    switch (i) {
      case 1:
        label.setAttribute("for", "name" + n);
        label.innerText = "Nom Q.U.E n:" + n;
        input.setAttribute("type", "text");
        input.setAttribute("id", "name" + n);
        input.setAttribute("name", "name" + n);
        break;
      case 2:
        label.setAttribute("for", "prof" + n);
        label.innerText = "Nom du Professeur n:" + n;
        input.setAttribute("type", "text");
        input.setAttribute("id", "prof" + n);
        input.setAttribute("name", "prof" + n);
        break;
      case 3:
        label.setAttribute("for", "credit" + n);
        label.innerText = "Valeur du credit n:" + n;
        input.setAttribute("type", "number");
        input.setAttribute("id", "credit" + n);
        input.setAttribute("name", "credit" + n);
        break;
      case 4:
        label.setAttribute("for", "hour" + n);
        label.innerText = "Nombre d'heure n:" + n;
        input.setAttribute("type", "number");
        input.setAttribute("id", "hour" + n);
        input.setAttribute("name", "hour" + n);
        break;
    }
    div.appendChild(label);
    div.appendChild(input);
  }
  return div;
};

</script>
  </html>
