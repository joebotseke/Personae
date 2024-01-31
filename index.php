<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personnages</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <h1>Témoignages</h1>
    <section>
        <?php
        // Inclure les fichiers nécessaires
        include 'PersonnageManager.php';
        include 'Database.php';

        // Créer une instance de la classe Database
        $database = new Database("localhost", "root", "", "personae");

        // Créer une instance de la classe PersonnageManager
        $personnageManager = new PersonnageManager($database);

        // Récupérer tous les personnages
        $personnages = $personnageManager->getAllPersonnages();

        // Afficher les personnages
        foreach ($personnages as $personnage) {
            echo "<div class='container'>";
            echo "<p>Image: <strong>{$personnage['Nom']}</strong> <br>Puissance: <span>{$personnage['NomPuissance']}</span> <br> <img src=\"{$personnage['ImageSrc']}\" width='180px' height='200px'></p>";
            echo "</div>";

        }
        ?>
    </section>

</body>
</html>
