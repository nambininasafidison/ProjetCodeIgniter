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
  /* Formulaire */
    .form {
      margin:auto;
      margin-top:2vh;
      width: 66vw;
      height: 85vh;
      background-color: #fff;
      border-radius: 1.5vw;
      overflow: hidden;
      clip-path: polygon(0 0, 15% 0, 20% 9%, 95% 9%, 100% 14%, 100% 100%, 0 100%);
    }

    .form .square {
      width: 8vw;
      height: 10vw;
      position: absolute;
      background-color: #f009;
      z-index: 3;
      border-radius: 1vw;
      transform: rotate(60deg);
    }

    .form .square1 {
      right: -4vw;
      top: 40vh;
    }

    .form .square2 {
      right: -2vw;
      top: 50vh;
    }

    .form .square3 {
      right: 0;
      top: 60vh;
    }

    .containerInput {
      margin:auto;
      width: 90%;
      height: 73%;
      border: 1px solid #000;
      margin-top: 15vh;
      border-radius: 1vw;
      padding: 6vh;
    }

    .input,.checkbox,button {
      position: relative;
      height: 10vh;
      top: 2vh;
    }

    .input input, .input select, button,.checkbox {
      width:26vw;
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
      background-color:grey;
    }
    
    .flex{
      display:flex;
      justify-content:space-around;
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
                <a href="<?php echo base_url('Back/form_prof') ?>" class="btn btn-primary">Ajouter un prof</a>
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

    <form class="form" action="<?php echo base_url('ProfController/insert') ?>" method="post"  onSubmit="return confirmer();">
      <div class="containerInput">
      <div class="flex"><div class="input">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required/>
      </div>
      <div class="input">
        <label for="prenom">Prenom:</label>
        <input type="text" name="prenom" id="prenom" required/>
      </div>
      <div>
      </div></div>
      <div class="flex">
        <div class="input">        
          <label for="CIN">CIN:</label>
          <input type="text" name="CIN" id="CIN" required/>          
        </div>
        <div class="input">
          <label for="adresse">Adresse</label>            
          <input type="text" name="adresse" id="adresse" required/>
        </div>
      </div>
      <div class="flex">
        <div class="input">        
          <label for="grade">Grade:</label>
          <select name="grade">
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
       <div class="input" id ="matricule" style="display:none;">
            <label for="matricule">Matricule:</label>
            <input type="text" name="matricule" id="input_matricule"/>
        </div>
        <div class="flex"><div class="input">
        <label for="tel">Tel:</label>
        <input type="text" name="tel" id="tel" />
      </div>
      <div class="input">
        <label for="mail">Mail:</label>
        <input type="email" name="mail" id="mail" />
      </div>
    </div></div>
    <div class="input"><input type="submit" value="Enregistrez" /></div>
    </form>
    <script src="index.js"></script>
  </body>

  <!-- Script -->
<script>
    const vac = document.getElementById("vacataire");
    vac.addEventListener("change", () => {
        document.getElementById("matricule").style.display = vac.checked ? "block" : "none";
        document.getElementById("input_matricule").setAttribute("required","");
    });
</script>

</html>