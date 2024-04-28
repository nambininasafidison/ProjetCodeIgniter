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
      <div class="isnotque">
        <label for="name0">Nom de l'U.E</label>
        <input type="text" name="name0" id="name0" />
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
</html>
