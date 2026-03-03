<?php

// 1. L'INTERFACE STRATÉGIE
interface LivraisonStrategy {
    public function calculerFrais(float $poids): float;
}

// 2. LES STRATÉGIES CONCRÈTES
class LivraisonStandard implements LivraisonStrategy {
    public function calculerFrais(float $poids): float {
        return $poids * 2;
    }
}

class LivraisonExpress implements LivraisonStrategy {
    public function calculerFrais(float $poids): float {
        return ($poids * 2) + 20;
    }
}

class LivraisonGratuite implements LivraisonStrategy {
    public function calculerFrais(float $poids): float {
        return 0;
    }
}

// class DroneStrategy implements LivraisonStrategy {
//     public function calculerFrais(float $poids): float {
//         return ($poids * 2) + 50;
//     }
// }

// 3. LE CONTEXTE
class Commande {
    private $poids;
    private $strategy;

    public function __construct(float $poids) {
        $this->poids = $poids;
    }

    public function setLivraisonStrategy(LivraisonStrategy $s) {
        $this->strategy = $s;
    }

    public function afficherTotalLivraison() {
        $frais = $this->strategy->calculerFrais($this->poids);
        echo "Frais de port pour " . $this->poids . "kg : " . $frais . "€\n";
    }
}

// --- CODE CLIENT ---

$maCommande = new Commande(5.5);

// Le client choisit la stratégie en fonction du bouton cliqué par l'utilisateur
$maCommande->setLivraisonStrategy(new LivraisonStandard());
$maCommande->afficherTotalLivraison();

// Le client change d'avis et veut de l'express
$maCommande->setLivraisonStrategy(new LivraisonExpress());
$maCommande->afficherTotalLivraison();

// Lorsque la livraison en drone sera possible, le client pourra choisir cette option
// $maCommande->setLivraisonStrategy(new DroneStrategy());
// $maCommande->afficherTotalLivraison();