<?php
   session_start();

   if(!isset($_SESSION['zWuppkgTT6o0Y44'])){
       
    header("Location: ../login.php");

   }

   if(empty($_SESSION['zWuppkgTT6o0Y44'])){
       
    header("Location: ../login.php");

   }

   require("../config/commandes.php");

   $Clients=afficherClients();

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
          <a class="nav-link active" aria-current="page" href="ajoutClient.php" style="font-weight:bold">Client</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php" >Produits</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="ajoutClient.php" >Nouveau client</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="supprimerClient.php" style="font-weight:bold">Suppression</a>
        </li>
  
      </ul>
      <div style="display:flex;justify-content: flex-end">
        <a href="deconnexion.php" class="btn btn-danger">Se déconnecter</a>
      </div>
      
    </div>
  </div>
</nav>

   <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">  

	<form method="post">
  <div class="mb-3">
    

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Identifiant du client</label>

    <input type="number" class="form-control" name="idclient" required>
  </div>

  <button type="submit" name="valider" class="btn btn-warning">Supprimer le client</button>
</form>

</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

     <?php foreach($Clients as $cl): ?>
        <div class="col">
          <div class="card shadow-sm">

          <h4><?= $cl->nom ?></h4>

          <h4><?= $cl->prenom ?></h4>

          <h3><?= $cl->id ?></h3>

            <div class="card-body">
              
              
            </div>
          </div>
        </div>
     <?php endforeach; ?>
        </div>

</div></div> 



</body>
</html>

<?php 
if(isset($_POST['valider']) )
{
	if( isset($_POST['idclient']) )
	{
		if( !empty($_POST['idclient']) AND is_numeric($_POST['idclient']))
		{
			$idclient=htmlspecialchars(strip_tags($_POST['idclient']));

          try
           {
            supprimerClient($idclient);
           }
           catch(Exception $e){
           	$e->getMessage();

          }
		}

	}


}

?>
