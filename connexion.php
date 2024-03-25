<?php
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASSWORD","Juin1706-*2000");
define("DB_NAME","gestion_idea");


$connexion=mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
if ($connexion === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
