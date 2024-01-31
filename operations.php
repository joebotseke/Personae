<?php
// operations.php

include 'Personnage.php';
include 'Database.php';
include 'PersonnageManager.php';

$database = new Database("localhost", "root", "", "personae");
$personnageManager = new PersonnageManager($database);

// Ajouter un nouveau personnage
$personnageManager->addPersonnage('Nuée', 'https://branham.org/azure/branham/073884ef-dd28-41d1-a7b8-33accbc478b2.jpg', 'Vivifiante');

// Mettre à jour un personnage existant
$existingPersonnage = $personnageManager->getPersonnageById(1);
if ($existingPersonnage) {
    $personnageID = intval($existingPersonnage['PersonnageID']);
    $personnageManager->updatePersonnage($personnageID, 'NouveauNom', $existingPersonnage['ImageSrc'], 'NouvellePuissance');
    echo "<p>Personnage existant mis à jour avec succès</p>";
}


// Supprimer un personnage existant
$personnageManager->deletePersonnage(2);
?>
