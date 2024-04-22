<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "injectionsql";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
  die("Échec de la connexion : " . $conn->connect_error);
}

// Récupération des données utilisateur
$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_de_passe = $_POST['mot_de_passe'];

// Requête SQL avec des paramètres liés
$query = "SELECT * FROM utilisateurs WHERE nom_utilisateur = ? AND mot_de_passe = ?";
$stmt = $conn->prepare($query);

// Liaison des paramètres
$stmt->bind_param("ss", $nom_utilisateur, $mot_de_passe);

// Exécution de la requête
$stmt->execute();

// Récupération des résultats
$result = $stmt->get_result();

// Vérification des résultats
if ($result->num_rows > 0) {
  echo "Utilisateur authentifié";
} else {
  echo "Nom d'utilisateur ou mot de passe incorrect";
}

// Fermeture de la connexion
$stmt->close();
$conn->close();
