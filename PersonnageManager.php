<?php
// PersonnageManager.php

class PersonnageManager {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getAllPersonnages() {
        $conn = $this->db->getConnection();
        $sql = "SELECT `PersonnageID`, `Nom`, `ImageSrc`, `NomPuissance` FROM `personnage` JOIN `puissance` ON `PersonnageID` = `PuissanceID`";
        $result = $conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    public function addPersonnage($nom, $image, $nomPuissance) {
        $conn = $this->db->getConnection();
        
        // Insert into Personnage table
        $insertPersonnage = "INSERT INTO Personnage (Nom, ImageSrc) VALUES (:nom, :image)";
        $stmt = $conn->prepare($insertPersonnage);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':image', $image);
        $stmt->execute();
        
        // Get the last inserted ID
        $personnageID = $conn->lastInsertId();
        
       // Insert into Puissance table
        $insertPuissance = "INSERT INTO Puissance (PuissanceID, NomPuissance) VALUES (:personnageID, :nomPuissance)";
        $stmt = $conn->prepare($insertPuissance);
        $stmt->bindParam(':personnageID', $personnageID);
        $stmt->bindParam(':nomPuissance', $nomPuissance);
        $stmt->execute();

    }
    

    public function getPersonnageById($personnageID) {
        $conn = $this->db->getConnection();
        $sql = "SELECT `PersonnageID`, `Nom`, `ImageSrc`, `NomPuissance` FROM `personnage` JOIN `puissance` ON `PersonnageID` = `PuissanceID` WHERE `PersonnageID` = :personnageID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':personnageID', $personnageID);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePersonnage($personnageID, $nom, $image, $nomPuissance) {
        $conn = $this->db->getConnection();

        // Update Personnage table
        $updatePersonnage = "UPDATE Personnage SET Nom = :nom, ImageSrc = :image WHERE PersonnageID = :personnageID";
        $stmt = $conn->prepare($updatePersonnage);
        $stmt->bindParam(':personnageID', $personnageID);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':image', $image);
        $stmt->execute();

        // Update Puissance table
        $updatePuissance = "UPDATE Puissance SET NomPuissance = :nomPuissance WHERE PuissancePersonnageID = :personnageID";
        $stmt = $conn->prepare($updatePuissance);
        $stmt->bindParam(':personnageID', $personnageID);
        $stmt->bindParam(':nomPuissance', $nomPuissance);
        $stmt->execute();

    }

    public function deletePersonnage($personnageID) {
        $conn = $this->db->getConnection();

      // Delete from Puissance table
        $deletePuissance = "DELETE FROM Puissance WHERE PuissanceID = :personnageID";
        $stmt = $conn->prepare($deletePuissance);
        $stmt->bindParam(':personnageID', $personnageID);
        $stmt->execute();

        // Delete from Personnage table
        $deletePersonnage = "DELETE FROM Personnage WHERE PersonnageID = :personnageID";
        $stmt = $conn->prepare($deletePersonnage);
        $stmt->bindParam(':personnageID', $personnageID);
        $stmt->execute();
    }
}
?>
