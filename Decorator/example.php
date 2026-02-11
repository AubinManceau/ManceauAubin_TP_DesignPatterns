<?php

// 1. L'interface commune (Composant)
interface Boisson {
    public function price(): float;
    public function description(): string;
}

// 2. Le composant concret de base
class CafeSimple implements Boisson {
    public function price(): float {
        return 2.0;
    }

    public function description(): string {
        return "Café simple";
    }
}

class The implements Boisson {
    public function price(): float {
        return 2.5;
    }

    public function description(): string {
        return "Thé";
    }
}

// 3. Le décorateur de base
// Il implémente l'interface et contient une référence vers un autre objet de type Boisson (dans le constructeur)
abstract class BoissonDecorator implements Boisson {
    protected $boisson;

    public function __construct(Boisson $boisson) {
        $this->boisson = $boisson;
    }

    public function price(): float {
        return $this->boisson->price();
    }

    public function description(): string {
        return $this->boisson->description();
    }
}

// 4. Les décorateurs concrets
class Lait extends BoissonDecorator {
    public function price(): float {
        return $this->boisson->price() + 0.5; // Ajoute le coût du lait
    }

    public function description(): string {
        return $this->boisson->description() . ", Lait";
    }
}

class Chocolat extends BoissonDecorator {
    public function price(): float {
        return $this->boisson->price() + 1.0; // Ajoute le coût du chocolat
    }

    public function description(): string {
        return $this->boisson->description() . ", Chocolat";
    }
}

class Chantilly extends BoissonDecorator {
    public function price(): float {
        return $this->boisson->price() + 0.7; // Ajoute le coût de la chantilly
    }

    public function description(): string {
        return $this->boisson->description() . ", Chantilly";
    }
}

class Caramel extends BoissonDecorator {
    public function price(): float {
        return $this->boisson->price() + 0.8; // Ajoute le coût du caramel
    }

    public function description(): string {
        return $this->boisson->description() . ", Caramel";
    }
}

// Démonstration

$monCafe = new CafeSimple();
echo "Description : " . $monCafe->description() . "\n";
echo "Prix : " . $monCafe->price() . "€\n\n";

// On "décore" le café avec du lait
$monCafeAuLait = new Lait($monCafe);
echo "Description : " . $monCafeAuLait->description() . "\n";
echo "Prix : " . $monCafeAuLait->price() . "€\n\n";

// On peut empiler les décorateurs
$cafeLaitChocolatChantilly = new Chantilly(new Chocolat($monCafeAuLait));
echo "Description : " . $cafeLaitChocolatChantilly->description() . "\n";
echo "Prix : " . $cafeLaitChocolatChantilly->price() . "€\n\n";

$the = new The();
$theCaramel = new Caramel($the);
echo "Description : " . $theCaramel->description() . "\n";
echo "Prix : " . $theCaramel->price() . "€\n";
