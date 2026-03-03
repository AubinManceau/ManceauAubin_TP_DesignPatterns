<?php

// 1. Notre interface interne (ce que notre site attend)
interface PaiementInterface {
    public function payer(float $montant): void;
}

// 2. Un service compatible
class PaiementInterne implements PaiementInterface {
    public function payer(float $montant): void {
        echo "Paiement de $montant € via le système interne.\n";
    }
}

// 3. Le Service Externe INCOMPATIBLE
class StripeSDK {
    public function capturePayment(int $amountInCents, string $currency): void {
        echo "Paiement de " . ($amountInCents/100) . " $currency via Stripe SDK.\n";
    }
}

// 4. L'ADAPTATEUR
class StripeAdapter implements PaiementInterface {
    private $stripeSDK;

    public function __construct(StripeSDK $sdk) {
        $this->stripeSDK = $sdk;
    }

    public function payer(float $montant): void {
        $centimes = (int)($montant * 100);
        $this->stripeSDK->capturePayment($centimes, "€");
    }
}

// --- CODE CLIENT ---
function traiterCommande(PaiementInterface $methode, float $total) {
    $methode->payer($total);
}

// Utilisation
$interne = new PaiementInterne();
traiterCommande($interne, 50.0);

$stripe = new StripeAdapter(new StripeSDK());
traiterCommande($stripe, 50.0);