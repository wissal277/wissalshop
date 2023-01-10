<?php
   session_start();

   if(!isset($_GET['pdt'])){
    header("Location: panier.php");
   }

   if(empty($_GET['pdt']) AND !is_numeric($_GET['pdt'])){
    header("Location: panier.php");
   }

   $id= $_GET['pdt'];

   require("../config/commandes.php");
   $panier=getPanier($id);


   foreach($panier as $p){
    $nom = $p->nom;
    $idPdt = $p->id;
    $image= $p->image;
    $qte = $p->quantité;
    $prix = $p->prix;
   }
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	 <title></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Wissal's phone shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link " href="afficher.php" >Panier</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active " href="#" style="font-weight:bold; color:green;">Modification sur la panier</a>
        </li>
      </ul>

      
    </div>
  </div>
</nav>


   <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">  

	<form method="post">

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom de produit</label>
    <input type="text" class="form-control" name="nom" value="<?= $nom ?>" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Quantité</label>
    <input type="number" class="form-control" name="qte" value="<?= $quantité ?>" required>
  </div>

  <button type="submit" name="valider" class="btn btn-success">Enregistrer</button>
</form>


</div></div></div> 



</body>
</html>

<?php 

if(isset($_POST['valider']))
{
	if( isset($_POST['qte']) )
	{
		if(!empty($_POST['qte']) )
		{
			$qte  =htmlspecialchars(strip_tags($_POST['qte']));
           
            modifierPanier($id);

            header("Location: panier.php");
           
			
		}

	}


}

?>