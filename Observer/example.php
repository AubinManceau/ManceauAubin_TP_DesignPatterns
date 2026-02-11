<?php

// 1. Interface de l'abonné
interface Subscriber {
    public function update(float $nouvelleValeur): void;
    public function getName(): string;
}

// 2. Interface du diffuseur
interface Publisher {
    public function attacher(Subscriber $subscriber): void;
    public function detacher(Subscriber $subscriber): void;
    public function notifier(): void;
}

// 3. Sujet Concret (La Bourse)
class Bourse implements Publisher {
    private $investisseurs = [];
    private $prixAction;

    public function __construct(float $prixInitial) {
        $this->prixAction = $prixInitial;
    }

    public function attacher(Subscriber $investisseur): void {
        $this->investisseurs[] = $investisseur;
        echo "📢 " . $investisseur->getName() . " s'est abonné au flux boursier.\n";
    }

    public function detacher(Subscriber $investisseur): void {
        foreach ($this->investisseurs as $key => $subscriber) {
            if ($subscriber === $investisseur) {
                unset($this->investisseurs[$key]);
                echo "🔇 " . $investisseur->getName() . " s'est désabonné.\n";
            }
        }
    }

    public function notifier(): void {
        echo "\n🔔 ALERTE MARCHÉ : Nouvelle valeur de l'action : " . $this->prixAction . "€\n";
        foreach ($this->investisseurs as $subscriber) {
            $subscriber->update($this->prixAction);
        }
    }

    public function setPrix(float $nouveauPrix): void {
        $this->prixAction = $nouveauPrix;
        $this->notifier();
    }
}

// 4. Observateurs Concrets

class InvestisseurParticulier implements Subscriber {
    private $nom;

    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    public function update(float $prix): void {
        if ($prix < 100) {
            echo "👤 " . $this->nom . " : Le prix est bas (" . $prix . "€), je devrais peut-être ACHETER !\n";
        } else {
            echo "👤 " . $this->nom . " : Le prix est haut (" . $prix . "€), je surveille...\n";
        }
    }

    public function getName(): string {
        return $this->nom;
    }
}

class BanqueInvestissement implements Subscriber {
    private $nom;

    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    public function update(float $prix): void {
        echo "🏦 " . $this->nom . " : Enregistrement de la fluctuation. Nouvelle cotation : " . $prix . "€.\n";
    }

    public function getName(): string {
        return $this->nom;
    }
}

// Démonstration

// Création du diffuseur
$bourse = new Bourse(120.0);

// Création des abonnés
$jean = new InvestisseurParticulier("Jean");
$marie = new InvestisseurParticulier("Marie");
$banque = new BanqueInvestissement("Banque 1");

// Inscription à l'évènement
$bourse->attacher($jean);
$bourse->attacher($banque);

// Changement de prix (Notification automatique)
$bourse->setPrix(115.0);

// Inscription à l'évènement
$bourse->attacher($marie);

// Nouveau changement de prix (Notification automatique)
$bourse->setPrix(95.0);

// Désinscription à l'évènement
$bourse->detacher($jean);

// Dernier changement (Notification automatique)
$bourse->setPrix(200.0);
