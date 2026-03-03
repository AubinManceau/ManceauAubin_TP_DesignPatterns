<?php

// 1. L'INTERFACE COMMANDE
interface Commande {
    public function execute(): void;
    public function undo(): void;
}

// 2. LE RÉCEPTEUR (La logique métier)
class Lumiere {
    public function allumer() { echo "La lumière est allumée.\n"; }
    public function eteindre() { echo "La lumière est éteinte.\n"; }
}

class Garage {
    public function ouvrir() { echo "Le garage est ouvert.\n"; }
    public function fermer() { echo "Le garage est fermé.\n"; }
}

// 3. COMMANDES CONCRÈTES
class CommandeAllumerLumiere implements Commande {
    private $lumiere;

    public function __construct(Lumiere $l) {
        $this->lumiere = $l;
    }

    public function execute(): void {
        $this->lumiere->allumer();
    }

    public function undo(): void {
        $this->lumiere->eteindre();
    }
}

class CommandeOuvrirGarage implements Commande {
    private $garage;

    public function __construct(Garage $g) {
        $this->garage = $g;
    }

    public function execute(): void {
        $this->garage->ouvrir();
    }

    public function undo(): void {
        $this->garage->fermer();
    }
}

// 4. LE DEMANDEUR (Invoker)
class Telecommande {
    private $bouton;
    private $historique;

    public function setCommande(Commande $c) {
        $this->bouton = $c;
    }

    public function presserBouton() {
        $this->bouton->execute();
        $this->historique = $this->bouton;
    }

    public function presserAnnuler() {
        if ($this->historique) {
            $this->historique->undo();
        }
    }
}

// --- CODE CLIENT ---

// On crée les récepteur
$salonLumiere = new Lumiere();
$garage = new Garage();

// On crée le demandeur
$telecommande = new Telecommande();

// On crée la commande et on lui donne son récepteur
$allumer = new CommandeAllumerLumiere($salonLumiere);

// On configure la télécommande
$telecommande->setCommande($allumer);

// Utilisation
$telecommande->presserBouton();
$telecommande->presserAnnuler();

// Maintenant, on veut changer l'utilisation de la télécommande pour ouvrir le garage
// On crée la nouvelle commande et on lui donne son récepteur
$ouvrir = new CommandeOuvrirGarage($garage);

// On configure la télécommande avec la nouvelle commande
$telecommande->setCommande($ouvrir);

// Utilisation
$telecommande->presserBouton();
$telecommande->presserAnnuler();