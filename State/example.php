<?php

// 1. L'INTERFACE ÉTAT
interface EtatDistributeur {
    public function insererMonnaie(): void;
    public function selectionnerBoisson(): void;
}

// 2. LE CONTEXTE (Le Distributeur)
class Distributeur {
    private $etat;

    public function __construct() {
        $this->setState(new EtatAttente($this));
    }

    public function setState(EtatDistributeur $etat) {
        $this->etat = $etat;
    }

    public function insererPiece() {
        $this->etat->insererMonnaie();
    }

    public function boutonCafe() {
        $this->etat->selectionnerBoisson();
    }
}

// 3. ÉTATS CONCRETS
class EtatAttente implements EtatDistributeur {
    private $machine;
    public function __construct($machine) { 
        $this->machine = $machine; 
    }

    public function insererMonnaie(): void {
        echo "Pièce acceptée. Vous pouvez choisir.\n";
        $this->machine->setState(new EtatArgentRecu($this->machine));
    }

    public function selectionnerBoisson(): void {
        echo "Veuillez d'abord insérer une pièce.\n";
    }
}

class EtatArgentRecu implements EtatDistributeur {
    private $machine;
    public function __construct($machine) { 
        $this->machine = $machine; 
    }

    public function insererMonnaie(): void {
        echo "Pièce déjà présente.\n";
    }

    public function selectionnerBoisson(): void {
        echo "Café en cours de préparation... Servi !\n";
        $this->machine->setState(new EtatAttente($this->machine));
    }
}

// --- CODE CLIENT ---
$maMachine = new Distributeur();

$maMachine->boutonCafe();
$maMachine->insererPiece();
$maMachine->boutonCafe();