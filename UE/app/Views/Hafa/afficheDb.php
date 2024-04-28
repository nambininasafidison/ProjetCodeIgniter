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
	<H1 class='container'> Lister les inscrits ( <?php echo $count ?> ) </H1>
	<a href="http://mon.projet.mit/index.php/TestDb/form"><button class="container">Inscrire</button></a>
</div>
<hr>
<div class="container d-flex">
	<FORM  action="http://mon.projet.mit/index.php/TestDb/filter" methode="POST">
                <SELECT id='select' name="selected">
			<option value="id">Id</option>
			<option value="nom">Nom</option>
			<option value="prenom">Prenom</option>
			<option value="dNaissance">Date de naissance</option>
			<option value="lNaissance">Lieu de naissance</option>
			<option value="genre">Genre</option>
			<option value="gmail">Gmail</option>
			<option value="tel">Tel</option>
		</SELECT>
                <INPUT class="input" id='search_input' type="text" name="searched" required/>
                <INPUT type="submit" value="Find">
        </FORM>

	<FORM action="http://mon.projet.mit/index.php/TestDb/filterAll" methode="POST">
                Filter: <INPUT class="input" type="text" name="all" required/>
                <INPUT type="submit" value="Filter">
        </FORM>

	<a href="http://mon.projet.mit/index.php/TestDb/index"><button>All</button></a>

</div>
<hr>
		<TABLE class="container table table-striped">
			<THEAD>
				<th>Num</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Date de naissance</th>
				<th>Lieu de naissance</th>
				<th>Genre</th>
				<th>Gmail</th>
				<th>Tel</th>
				<th>Del</th>
				<th>Mod</th>
			</THEAD>
			<TBODY>
<?php
	$i=0;
	foreach($liste as $l){
		$i++;
		echo "<TR>";
		echo "<TD>".$l["id"]."</TD>";
		echo "<TD>".$l["nom"]."</TD>";
		echo "<TD>".$l["prenom"]."</TD>";
		echo "<TD>".$l["dNaissance"]."</TD>";
		echo "<TD>".$l["lNaissance"]."</TD>";
		echo "<TD>".$l["genre"]."</TD>";
		echo "<TD>".$l["gmail"]."</TD>";
		echo "<TD>".$l["tel"]."</TD>";
		echo "<TD><a href='http://mon.projet.mit/index.php/TestDb/delete/".$l["id"]."'>Delete</a></TD>";
		echo "<TD><a href='http://mon.projet.mit/index.php/TestDb/modify/".$l["id"]."'>Modify</a></TD>";
		echo "</TR>";
	}
?>
			</TBODY>
		</TABLE>

<?php echo $pager->links() ?>

<script>
	const elt=document.getElementById("select");
	elt.addEventListener('change',()=>{
		const inp=document.getElementById("search_input");
		console.log(elt.value);
		if(elt.value=='dNaissance'){
			inp.setAttribute("type","date");

		}
		else{
			inp.setAttribute("type","text");
		}
	}
	);
</script>
	</BODY>
</HTML>
