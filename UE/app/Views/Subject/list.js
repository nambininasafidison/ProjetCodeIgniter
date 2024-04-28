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

function createTable(data) {
  const table = document.createElement("table");
  const thead = document.createElement("thead");
  const tbody = document.createElement("tbody");
  const tr = document.createElement("tr");
  const th = document.createElement("th");
  const td = document.createElement("td");
  for(let i=0;i<5;i++){
    switch(i){
        case 0:
    }
  }
}
