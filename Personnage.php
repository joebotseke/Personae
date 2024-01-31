<?php
// Personnage.php

class Personnage {
    private $nom;
    private $image;

    public function __construct($nom, $image) {
        $this->nom = $nom;
        $this->image = $image;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nouveauNom) {
        $this->nom = $nouveauNom;
    }

    public function setImage($nouvelleImage) {
        $this->image = $nouvelleImage;
    }

    public function getImage() {
        return $this->image;
    }
}
?>
