<?php
require_once "connexion.php";


// Insérer une nouvelle idée si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idee = $_POST['texte_idee'];
    $categorie = $_POST['id_categorie'];
    $sql = "INSERT INTO idee (texte_idee, id_categorie) VALUES ('$idee', $categorie)";
    if ($connexion->query($sql) === TRUE) {
        header("location: adddonnee.php");
        exit();
    } else {
        echo "Échec de l'insertion de l'idée.";
    }
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumission de son idée</title>
</head>
<body>
<header>
    <div><img src="images\lampe.png" alt="lampe" class="lampe"></div>
    <div>
      <h1>My idea</h1>
    </div>
  </header>
    <h2>Boite à idée</h2>
    <div class="div_khaby">
        <div><img src="images\khaby.png" alt="image des khaby"></div>
         <div class="container">
            <form action="" method="POST">
              <h3>Soumission d'une idée</h3>
            <div>
              <h4><label for="" class="label_categorie">Catégorie:</label></h4>
              <select name="id_categorie" id="">
                <option value="">Choisissez une catégorie</option>
                <option value="1">Informatique</option>
                <option value="2">Créativité</option>
                <option value="3">Design</option>
                <option value="4">Voyages</option>
                <option value="5">Livres</option>
                <option value="6">Cuisine</option>
                <option value="7">Mode</option>
                <option value="8">Art</option>
              </select>
            </div>
            <div class="champ">
               <textarea name="texte_idee" id="" cols="60" rows="8" placeholder="Votre idée"></textarea>
            </div>
            <div><button class="envoie" type="submit" name="submit">Soumettre</button>
          </div>
            </form>
        </div>
    </div>
    <style>
      body{
        margin: 0;
      }
      .lampe{
        width: auto;
        height: 45px;
      }
      h1{
        font-size: 1rem;
        margin-top: 23px;
        color:white
      }
      header{
        display: flex;
        background-color: #f1c40f;
      }
      textarea:focus{
        outline: none;
      }
      select:focus{
          outline: none;
      }
      option{
        color:#f1c40f
      }
      h2{
        text-align: center;
        color:goldenrod;
        font-size: 2.5rem;
        margin-top: 55px;
      }
      .div_khaby{
        display:flex;
        margin-top:100px
      }
      .container {
      width: 540px;
      height: 380px;
      border-radius: 30px;
      background: goldenrod;
      color:white;
      text-align: center;
      margin-left: 127px;
      } 
      h3{
        font-size: 1.7rem;
      }
      h4{
        font-size: 1.5rem;
      }
      select{
        margin-bottom: 20px;
      }
      textarea{
        margin-bottom: 20px;
        border-style:none
      }
      .envoie{
        padding: 8px;
        border-color: white ;
        border-style: solid;
        background-color:#f1c40f;
        color:white;
        font-weight: bolder;
        border-radius: 17px;
      }
    </style>
</body>
</html>
