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
