<?php
   session_start();

   if(!isset($_SESSION['zWuppkgTT6o0Y44'])){
    header("Location: ../login.php");
   }

   if(empty($_SESSION['zWuppkgTT6o0Y44'])){
    header("Location: ../login.php");
   }

   require("../config/commandes.php");
   
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
          <a class="nav-link active" aria-current="page" href="ajoutClient.php" style="font-weight:bold">Nouveau Client</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="supprimerClient.php" >Suppression</a>
        </li>

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
    <label for="exampleInputEmail1" class="form-label">Nom du client</label>
    <input type="name" class="form-control" name="nom" required>

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prenom du client</label>
    <input type="text" class="form-control" name="prenom" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">le numero de telephone</label>
    <input type="text" class="form-control" name="num" required>
  </div>

  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">L'adresse email du client</label>
    <input type="email" class="form-control" name="email" required> 
  </div>

  <button type="submit" name="valider" class="btn btn-success" >Ajouter un nouveau Client</button>
</form>

</div></div></div> 



</body>
</html>

<?php 

if(isset($_POST['valider']))
{
	if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['num']) AND isset($_POST['email']) )
	{
		if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['num']) 
			AND !empty($_POST['email']) )
		{
			$nom =htmlspecialchars(strip_tags($_POST['nom']));
			$prenom  =htmlspecialchars(strip_tags($_POST['prenom']));
			$num  =htmlspecialchars(strip_tags($_POST['num']));
			$email  =htmlspecialchars(strip_tags($_POST['email']));
      

          
            ajouterClient( $nom, $prenom,$num, $email);
            echo "<script>alert('test1 OK')</script>";
           
			
		}

	}


}

?>
