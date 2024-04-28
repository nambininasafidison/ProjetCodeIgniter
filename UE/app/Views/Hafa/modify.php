<HTML>
<HEAD><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
<style>
                input,button{
                        margin-right:2vw;
                        border-radius:10px;
                }
</style>
   </HEAD>
       <BODY>
<div class="container d-flex">
       <H1 class='container primary' >Modifier une inscription</H1>
        <a href="http://mon.projet.mit/"><button class="container">Lister</button></a>
        <a href="http://mon.projet.mit/index.php/TestDb/form"><button class="container">Inscrire</button></a>
</div>
<hr>
       <div class='container border border-2' style='margin-top:2vw;width:60vw'>
       <H3 class='container bg-secondary' >Modifier votre information</H3>

	<?php echo "<FORM class=\"container\" action=\"http://mon.projet.mit/index.php/TestDb/update/".$liste[0]["id"]."\" method=\"POST\">"?>
      <?php echo " <p>Nom: <input class='container' type='text' name='nom' value='".$liste[0]["nom"]."' required></p>"?>
      <?php echo "<p>Prenom: <input class='container' type='text' name='prenom' value='".$liste[0]["prenom"]."' required></p> "?>
      <?php echo "<p>Date de naissance: <input class='container' type='date'name='dNaissance' value=".$liste[0]["dNaissance"]."> </p>" ?>
      <?php echo "<p>Lieu de naissance: <input class='container' type='text' name='lNaissance' value='".$liste[0]["lNaissance"]."' > </p>" ?>
      <?php echo "<p>Genre: <select name='genre' class='container'><option ".($liste[0]["genre"]=='Feminin' ? "selected" : "").">Feminin</option><option ".( $liste[0]["genre"]=='Masculin'? "selected" : "").">Masculin</option></select></p>" ?>
      <?php echo " <p>Gmail: <input type='email' class='container' name='gmail' value='".$liste[0]["gmail"]."'></p>" ?>
      <?php echo " <p>Tel: <input class='container' type='text' name='tel' value='".$liste[0]["tel"]."'></p>" ?>
      <p><input type='submit' style='margin:auto;' value='Enregistrer'></p>
	</FORM>
   </div></BODY>
</HTML>
