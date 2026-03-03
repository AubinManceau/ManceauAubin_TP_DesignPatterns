<?php

// 1. L'INTERFACE COMMUNE
interface SystemeElement {
    public function getNom(): string;
    public function getTaille(): int;
}

// 2. LA FEUILLE
class Fichier implements SystemeElement {
    private $nom;
    private $taille;

    public function __construct($nom, $taille) {
        $this->nom = $nom;
        $this->taille = $taille;
    }

    public function getNom(): string { return $this->nom; }
    public function getTaille(): int { return $this->taille; }
}

// 3. LE COMPOSITE
class Dossier implements SystemeElement {
    private $nom;
    private $enfants = [];

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function ajouter(SystemeElement $element) {
        $this->enfants[] = $element;
    }

    public function getNom(): string { return $this->nom; }

    public function getTaille(): int {
        $total = 0;
        foreach ($this->enfants as $enfant) {
            $total += $enfant->getTaille();
        }
        return $total;
    }
}

// --- CODE CLIENT ---

$f1 = new Fichier("image.jpg", 500);
$f2 = new Fichier("notes.txt", 100);
$f3 = new Fichier("film.mp4", 2000);

$dossierImages = new Dossier("Photos");
$dossierImages->ajouter($f1);

$racine = new Dossier("C:");
$racine->ajouter($dossierImages);
$racine->ajouter($f2);
$racine->ajouter($f3);

echo "Taille totale du dossier " . $racine->getNom() . " : " . $racine->getTaille() . " Ko.\n";
echo "Taille totale du dossier " . $dossierImages->getNom() . " : " . $dossierImages->getTaille() . " Ko.\n";
echo "Taille du fichier " . $f2->getNom() . " : " . $f2->getTaille() . " Ko.\n";