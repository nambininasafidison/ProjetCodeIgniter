<HTML>
<HEAD><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integr>
<style>
                input,button{
                        margin-right:2vw;
                        border-radius:10px;
                }
</style>
   </HEAD>
       <BODY>
<div class="container d-flex">
       <H1 class='container primary' >Inscription</H1>
        <a href="http://mon.projet.mit/"><button class="container">Lister</button></a>
</div>
<hr>
       <div class='container border border-2' style='margin-top:2vw;padding:3vw;width:60vw;'>
       <H3 class='container bg-secondary' >Veuillez entrer votre information</H3>
       <FORM class='container' METHOD='POST' ACTION='http://mon.projet.mit/index.php/TestDb/insert'>
       <p>Nom: <input class='container' type='text' name='nom' required/></p>
       <p>Prenom: <input class='container' type='text' name='prenom' required/></p>
       <p>Date de naissance: <input class='container' type='date'name='dNaissance' required/></p>
       <p>Lieu de naissance: <input class='container' type='text' placeholder='Antananarivo...' name='lNaissance' required>
       <p>Genre: <select name='genre' class='container'><option>Feminin</option><option>Masculin</option></select></p>
       <p>Gmail: <input type='email' class='container' placeholder='a***@***.***' name='gmail' required/></p>
       <p>Tel: <input class='container' class='container' pattern='[0-9]{3} [0-9]{2} [0-9]{3} [0-9]{2}' type='text' placeholder='034 xx xxx xx' name='tel' required/></p>
       <p><input type='submit' style='margin:auto;' value='Enregistrer'/></p>
   </div>

	</BODY>
</HTML>

