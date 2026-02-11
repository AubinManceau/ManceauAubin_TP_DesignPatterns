<?php

class TourDeControle {

    // Gestion du cycle de vie
    private static $instance = null; // Stocke l'instance unique de la classe

    private function __construct() {} // Empêche l'instanciation directe de la classe

    private function __clone() {} // Empêche la duplication de l'instance

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new TourDeControle(); // Crée une nouvelle instance si elle n'existe pas encore
        }
        return self::$instance; // Retourne l'instance unique de la classe si elle existe déjà
    }

    // Logique métier
    public function donnerAutorisationAtterrissage($avion) {
        return "Autorisation accordée pour l'avion " . $avion;
    }
}

// --- CODE CLIENT ---

// 1. On demande l'instance une première fois
$tour1 = TourDeControle::getInstance();

// 2. On demande l'instance une deuxième fois (n'importe où ailleurs dans le code)
$tour2 = TourDeControle::getInstance();

// 3. Preuve ultime : Est-ce que ce sont strictement les mêmes objets ?
echo "Est-ce la même instance ? ";
var_dump($tour1 === $tour2);

// 4. Utilisation métier
echo $tour1->donnerAutorisationAtterrissage("AF123");
echo $tour2->donnerAutorisationAtterrissage("RYN456");