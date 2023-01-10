<?php
//fonctions liees au client
function ajouterClient( $nom, $prenom,$num, $email) {
	if (require("connexion.php")) 
	{   
		$req= $access->prepare("INSERT INTO client (`nom`, prenom, numtel, `email`) 
		VALUES (?,?,?,?)");

		$req->execute(array($nom, $prenom,$num, $email));

		//echo "<script>alert('ajout OK')</script>";

		$req->closeCursor();
	}
}

function supprimerClient($idclient) {
	if (require("connexion.php")) {
		$req=$access->prepare("DELETE FROM client WHERE id=?");

		$req->execute(array($idclient));

		$req->closeCursor();
	}
} 

function afficherClients() {
	if (require("connexion.php")) {
		$req=$access->prepare("SELECT * FROM client ORDER BY id DESC");

		$req->execute();

		$data=$req->fetchAll(PDO::FETCH_OBJ);

		return $data;

		$req->closeCursor();
	}
}


//fonctions liées au panier



function ajouterAuPanier($image, $nom, $prix, $qte) {
	if (require("connexion.php")) 
	{   
		$req= $access->prepare("INSERT INTO produits (`image`, nom, prix, quantité) 
		VALUES (?,?,?,?)");

		$req->execute(array($image, $nom,$prix, $qte));

		//echo "<script>alert('ajout OK')</script>";

		$req->closeCursor();
	}
}
function modifierPanier( $id) {
	if (require("connexion.php")) 
	{   
		$req= $access->prepare("UPDATE produits SET `qte` = ? WHERE id=?");

		$req->execute(array($image, $nom,$prix, $qte, $id));

		$req->closeCursor();
	}
}

function getPanier($id){
	if (require("connexion.php")) 
	{
		$req= $access->prepare("SELECT * FROM panier WHERE id=?");

		$req->execute(array($id));

		if($req->rowCount() == 1){

			$data=  $req-> fetchAll(PDO::FETCH_OBJ);

			return $data;

		}else{
			return false;

		}

		$req->closeCursor();
	}
}

function afficherPanier() {
	if (require("connexion.php")) {
		$req=$access->prepare("SELECT * FROM panier ORDER BY id DESC");

		$req->execute();

		$data=$req->fetchAll(PDO::FETCH_OBJ);

		return $data;

		$req->closeCursor();
	}
}

//fonctions liées au produits
function modifier($image, $nom, $prix, $desc, $id) {
	if (require("connexion.php")) 
	{   
		$req= $access->prepare("UPDATE produits SET `image` = ?, nom = ?, prix = ?, `description` = ? WHERE id=?");

		$req->execute(array($image, $nom,$prix, $desc, $id));

		$req->closeCursor();
	}
}

function getProduit($id){
	if (require("connexion.php")) 
	{
		$req= $access->prepare("SELECT * FROM produits WHERE id=?");

		$req->execute(array($id));

		if($req->rowCount() == 1){

			$data=  $req-> fetchAll(PDO::FETCH_OBJ);

			return $data;

		}else{
			return false;

		}

		$req->closeCursor();
	}
}




function getAdmin( $email, $password){
	if (require("connexion.php")) 
	{
		$req= $access->prepare("SELECT * FROM admin WHERE email = ? AND motdepasse = ?");

		$req->execute(array( $email, $password));

		if($req->rowCount() == 1){

			$data=  $req-> fetch();

			return $data;
		}else{
			return false;
		}

		$req->closeCursor();
	}
}



function ajouter($image, $nom, $prix, $desc) {
	if (require("connexion.php")) 
	{   
		$req= $access->prepare("INSERT INTO produits (`image`, nom, prix, `description`) 
		VALUES (?,?,?,?)");

		$req->execute(array($image, $nom,$prix, $desc));

		//echo "<script>alert('ajout OK')</script>";

		$req->closeCursor();
	}
}

function afficher() {
	if (require("connexion.php")) {
		$req=$access->prepare("SELECT * FROM produits ORDER BY id DESC");

		$req->execute();

		$data=$req->fetchAll(PDO::FETCH_OBJ);

		return $data;

		$req->closeCursor();
	}
}

function supprimer($id) {
	if (require("connexion.php")) {
		$req=$access->prepare("DELETE FROM produits WHERE id=?");

		$req->execute(array($id));

		$req->closeCursor();
	}
} 



?>