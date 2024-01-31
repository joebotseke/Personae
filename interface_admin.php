<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personnage Manager</title>
    <link rel="stylesheet" href="styles/interface_admin.css">
</head>
<body>

<?php
// interface.php

require_once 'Personnage.php';
require_once 'Database.php';
require_once 'PersonnageManager.php';

$database = new Database("localhost", "root", "", "personae");
$personnageManager = new PersonnageManager($database);

// Traitement du formulaire d'ajout
if (isset($_POST['submitAdd'])) {
    $nom = $_POST['nom'];
    $image = $_POST['image'];
    $nomPuissance = $_POST['nomPuissance'];

    $personnageManager->addPersonnage($nom, $image, $nomPuissance);
}

// Traitement du formulaire de mise à jour
if (isset($_POST['submitUpdate'])) {
    $personnageID = $_POST['updateID'];
    $nom = $_POST['updateNom'];
    $image = $_POST['updateImage'];
    $nomPuissance = $_POST['updateNomPuissance'];

    $personnageManager->updatePersonnage($personnageID, $nom, $image, $nomPuissance);
}

// Traitement du formulaire de suppression
if (isset($_POST['submitDelete'])) {
    $personnageID = $_POST['deleteID'];
    $personnageManager->deletePersonnage($personnageID);
}

// Récupérer tous les personnages
$personnages = $personnageManager->getAllPersonnages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personnage Manager</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <h1>Personnage Manager</h1>

    <!-- Formulaire d'ajout -->
    <form method="post">
        <h2>Ajouter un personnage</h2>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required>
        <label for="image">Image URL:</label>
        <input type="text" name="image" required>
        <label for="nomPuissance">Nom de la Puissance:</label>
        <input type="text" name="nomPuissance" required>
        <button type="submit" name="submitAdd">Ajouter</button>
    </form>

    <!-- Liste des personnages -->
    <h2>Liste des personnages</h2>
    <ul>
        <?php foreach ($personnages as $personnage): ?>
            <li>
                <?= $personnage['Nom'] ?> - 
                <?= $personnage['NomPuissance'] ?> 
                
                <!-- Formulaire de mise à jour -->
                <form method="post">
                    <input type="hidden" name="updateID" value="<?= $personnage['PersonnageID'] ?>">
                    <label for="updateNom">Nouveau Nom:</label>
                    <input type="text" name="updateNom" required>
                    <label for="updateImage">Nouvelle Image URL:</label>
                    <input type="text" name="updateImage" required>
                    <label for="updateNomPuissance">Nouveau Nom de la Puissance:</label>
                    <input type="text" name="updateNomPuissance" required>
                    <button type="submit" name="submitUpdate">Mettre à jour</button>
                </form>
                
                <!-- Formulaire de suppression -->
                <form method="post">
                    <input type="hidden" name="deleteID" value="<?= $personnage['PersonnageID'] ?>">
                    <button type="submit" name="submitDelete">Supprimer</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
