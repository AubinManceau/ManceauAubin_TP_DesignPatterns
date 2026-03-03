<?php

interface VetementFactory {
    public function createTshirt(): TShirt;
    public function createChemise(): Chemise;
    public function createPull(): Pull;
    // public function createPantalon(): Pantalon;
}

class SizeXLFactory implements VetementFactory {
    public function createTshirt(): TShirt {
        return new TshirtSizeXL();
    }

    public function createChemise(): Chemise {
        return new ChemiseSizeXL();
    }

    public function createPull(): Pull {
        return new PullSizeXL();
    }

    // public function createPantalon(): Pantalon {
    //     return new Pantalon();
    // }
}

class SizeMFactory implements VetementFactory {
    public function createTshirt(): TShirt {
        return new TshirtSizeM();
    }

    public function createChemise(): Chemise {
        return new ChemiseSizeM();
    }

    public function createPull(): Pull {
        return new PullSizeM();
    }

    // public function createPantalon(): Pantalon {
    //     return new Pantalon();
    // }
}

class SizeSFactory implements VetementFactory {
    public function createTshirt(): TShirt {
        return new TshirtSizeS();
    }

    public function createChemise(): Chemise {
        return new ChemiseSizeS();
    }

    public function createPull(): Pull {
        return new PullSizeS();
    }

    // public function createPantalon(): Pantalon {
    //     return new Pantalon();
    // }
}

interface TShirt {
    public function essayer(): string;
}

class TshirtSizeXL implements TShirt {
    public function essayer(): string {
        return "Essayage d'un T-shirt taille XL";
    }
}

class TshirtSizeM implements TShirt {
    public function essayer(): string {
        return "Essayage d'un T-shirt taille M";
    }
}

class TshirtSizeS implements TShirt {
    public function essayer(): string {
        return "Essayage d'un T-shirt taille S";
    }
}

interface Chemise {
    public function essayer(): string;
}

class ChemiseSizeXL implements Chemise {
    public function essayer(): string {
        return "Essayage d'une chemise taille XL";
    }
}

class ChemiseSizeM implements Chemise {
    public function essayer(): string {
        return "Essayage d'une chemise taille M";
    }
}

class ChemiseSizeS implements Chemise {
    public function essayer(): string {
        return "Essayage d'une chemise taille S";
    }
}

interface Pull {
    public function essayer(): string;
}

class PullSizeXL implements Pull {
    public function essayer(): string {
        return "Essayage d'un pull taille XL";
    }
}

class PullSizeM implements Pull {
    public function essayer(): string {
        return "Essayage d'un pull taille M";
    }
}

class PullSizeS implements Pull {
    public function essayer(): string {
        return "Essayage d'un pull taille S";
    }
}

// interface Pantalon {
//     public function essayer(): string;    
// }

// class PantalonSizeXL implements Pantalon {
//     public function essayer(): string {
//         return "Essayage d'un pantalon taille XL";
//     }
// }

// class PantalonSizeM implements Pantalon {
//     public function essayer(): string {
//         return "Essayage d'un pantalon taille M";
//     }
// }

// class PantalonSizeS implements Pantalon {
//     public function essayer(): string {
//         return "Essayage d'un pantalon taille S";
//     }
// }


function habillerMannequin(VetementFactory $factory) {
    $tshirt = $factory->createTshirt();
    $chemise = $factory->createChemise();
    $pull = $factory->createPull();

    echo $tshirt->essayer() . "\n";
    echo $chemise->essayer() . "\n";
    echo $pull->essayer() . "\n";
}

// --- UTILISATION ---
echo "--- Commande client 1 (XL) ---\n";
habillerMannequin(new SizeXLFactory());

echo "\n--- Commande client 2 (S) ---\n";
habillerMannequin(new SizeSFactory());

