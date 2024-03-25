<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre idée</title>
    <link rel="stylesheet" href="adddonnee.css">
</head>
<body>
<header>
    <div><img src="images\lampe.png" alt="lampe" class="lampe"></div>
    <div>
      <h1>My idea</h1>
    </div>
</header>
  
<?php
require_once "connexion.php";

// Sélectionner toutes les catégories
$sql_categories = "SELECT id_categorie, nom_categorie FROM categorie";
$resultat_categories = mysqli_query($connexion, $sql_categories);

// Vérifier s'il y a des catégories
if (mysqli_num_rows($resultat_categories) > 0) {
    echo '<div class="cards">';
    while ($row_categorie = mysqli_fetch_assoc($resultat_categories)) {
        $categorie_classe = strtolower(str_replace(' ', '-', $row_categorie["nom_categorie"])); // Convertir le nom de la catégorie en classe CSS
        
        echo '<div class="carte ' . $categorie_classe . '">';
        echo '<div class="nom_categorie">';
        echo '<h2>' . $row_categorie["nom_categorie"] . '</h2>';
        echo '</div>';
        echo '<div class="idee">';
        
        // Sélectionner les idées associées à cette catégorie
        $id_categorie = $row_categorie['id_categorie'];
        $requete_idees = "SELECT idee.texte_idee, idee.id_idee
                         FROM idee
                         INNER JOIN categorie
                         ON categorie.id_categorie = idee.id_categorie
                         WHERE categorie.id_categorie = $id_categorie";
        $resultat_idees = mysqli_query($connexion, $requete_idees);
        
        if (mysqli_num_rows($resultat_idees) > 0) {
            while ($row_idee = mysqli_fetch_assoc($resultat_idees)) {
                echo '<div>';
                echo '<p>' . $row_idee['texte_idee'] . '</p>';
                echo '</div>';
                echo '<div class="div_class">';
                echo '<div>';
                echo '<form action="modifie.php" method="GET">';
                echo '<input type="hidden" name="id_idee" value="' . $row_idee['id_idee'] . '">';
                echo '<button type="submit">Modifier</button>';
                echo '</form>';
                echo '</div>';
                echo '<div>';
                echo '<form action="suppression.php" method="POST">';
                echo '<input type="hidden" name="id_idee" value="' . $row_idee['id_idee'] . '">';
                echo '<button type="submit">Supprimer</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'Aucune idée associée à cette catégorie.';
        }
        
        echo '</div>';  
        echo '</div>';
    }
    echo '</div>';
}
?>
<style>
    .lampe{
        width: auto;
        height: 45px;
    }
    .div_class{
        display:flex;
    }
    h1{
        font-size:15px;
        margin-top:47%;
        color:white
    }
    header{
        display:flex;
        background-color: #f1c40f;
        margin-bottom: 2%;
    }
    body{
        margin:0
    }
    .cards {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
    .carte {
        flex: 1 1 300px; /* Ajustez la largeur des cartes selon votre choix */
        padding: 20px;
        border-radius: 10px;
        background-color: #f5f5f5; /* Couleur de fond par défaut */
    }
    .nom_categorie {
        text-align: center;
        margin-bottom: 10px;
    }
    .idee {
        background-color: #fff;
        padding: 10px;
        border-radius: 5px;
    }
    /* Ajoutez des styles pour chaque catégorie */
    .mode {
        background-color: #3498db;
    }
    .cuisine {
        background-color: #ccffcc;
    }
    .art{
        background-color: #9b59b6;
    }
    .design{
        background-color: #ff7675;
    }
    .créativité{
        background-color: #f39c12;
    }
    .informatique{
        background-color:#fd79a8 ;
    }
    .livres{
   background-color: #D980FA;
    }
    .voyages{
     background-color:#B53471;
    }

