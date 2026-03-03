<?php

// Le Produit Final
class Gateau {
    public $etapes = [];
    public function afficher() {
        echo "Gâteau composé de : " . implode(", ", $this->etapes) . "\n";
    }
}

// Interface du Builder
interface GateauBuilder {
    public function reset(): self;
    public function ajouterBase(): self;
    public function ajouterSaveur(): self;
    public function ajouterNappage(): self;
    public function getResult(): Gateau;
}

class Builder implements GateauBuilder {
    private $gateau;

    public function reset(): self {
        $this->gateau = new Gateau();
        return $this;
    }

    public function ajouterBase(): self {
        $this->gateau->etapes[] = "Génoise";
        return $this;
    }

    public function ajouterSaveur(): self {
        $this->gateau->etapes[] = "Ganache Chocolat Noir";
        return $this;
    }

    public function ajouterNappage(): self {
        $this->gateau->etapes[] = "Copeaux de chocolat";
        return $this;
    }

    public function getResult(): Gateau {
        return $this->gateau;
    }
}

class Director {
    public function faireGateauSimple(GateauBuilder $builder) {
        $builder->reset()
                ->ajouterBase()
                ->ajouterSaveur();
    }

    public function faireGateauSpecial(GateauBuilder $builder) {
        $builder->reset()
                ->ajouterBase()
                ->ajouterSaveur()
                ->ajouterNappage();
    }
}

// --- UTILISATION ---

$director = new Director();
$builder = new Builder();

// Option 1 : Utilisation via le Directeur 
$director->faireGateauSpecial($builder);
$gateauSpecial = $builder->getResult();
$gateauSpecial->afficher();

// Option 2 : Construction personnalisée (Le client décide)
$builder->reset()
        ->ajouterBase()
        ->ajouterNappage();
$gateauPerso = $builder->getResult();
$gateauPerso->afficher();