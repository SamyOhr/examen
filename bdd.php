<?php
// Connexion à la base de données
$base = new PDO('mysql:host=localhost; dbname=id20205701_samy', 'id20205701_samyouicher', '/&*hX18M$A}2#QGr');
$base->exec("SET CHARACTER SET utf8");

// Récupération des données du formulaire de cotact
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Insertion des données dans la table "contacts"
$sql = "INSERT INTO contacts (name, email, phone) VALUES (:name, :email, :phone)";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);
$stmt->execute();

// Récupération de l'ID du contact inséré
$contact_id = $dbh->lastInsertId();

// Insertion du commentaire dans la table "comments"
$sql = "INSERT INTO comments (contact_id, message) VALUES (:contact_id, :message)";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':contact_id', $contact_id);
$stmt->bindParam(':message', $message);
$stmt->execute();

// Redirection vers la page de confirmation de contact
header('Location: confirmation.php');
exit();
?>