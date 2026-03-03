<?php

// --- LE SOUS-SYSTÈME ---
class Lumiere { public function eteindre() { echo "Lumières éteintes.\n"; } }
class Volets { public function baisser() { echo "Volets fermés.\n"; } }
class Amplificateur { public function setModeCinema() { echo "Ampli sur HDMI 2, Volume 20.\n"; } }
class Television { public function allumer() { echo "TV allumée.\n"; } }

// --- LA FAÇADE ---
class SmartHomeFacade {
    protected $lumiere;
    protected $volets;
    protected $ampli;
    protected $tv;

    public function __construct() {
        $this->lumiere = new Lumiere();
        $this->volets = new Volets();
        $this->ampli = new Amplificateur();
        $this->tv = new Television();
    }

    public function activerModeCinema() {
        echo "Préparation de la soirée cinéma...\n";
        $this->volets->baisser();
        $this->lumiere->eteindre();
        $this->tv->allumer();
        $this->ampli->setModeCinema();
        echo "Bon film !\n";
    }
}

// --- CODE CLIENT ---
$maison = new SmartHomeFacade();
$maison->activerModeCinema();