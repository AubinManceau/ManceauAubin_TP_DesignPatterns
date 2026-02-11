<?php

// Interface pour les notifications
interface Notification {
    public function send(string $message): void;
    public function receive(): string;
}

// Factory pour créer des instances de notifications, peu importe le type
class NotificationsFactory
{
    public static function createNotifications(string $type): Notifications
    {
        $className = ucfirst($type);
        if (class_exists($className)) {
            return new $className();
        }
        throw new InvalidArgumentException("Type de notification inconnu: $type");
    }
}

// Implémentation concrète pour les notifications par email
class Email implements Notifications
{
    public function send(string $message): void
    {
        echo "Envoi de l'email: $message\n";
    }

    public function receive(): string
    {
        return "Email reçu";
    }
}

// Implémentation concrète pour les notifications par SMS
class SMS implements Notifications
{
    public function send(string $message): void
    {
        echo "Envoi du SMS: $message\n";
    }

    public function receive(): string
    {
        return "SMS reçu";
    }
}

// On peut créer autant de notifications que nécessaire sans modifier la factory, il suffit d'ajouter une nouvelle classe qui implémente l'interface Notifications


// Exemple d'utilisation de la factory pour créer des notifications
$emailNotification = NotificationsFactory::createNotifications('email');
$emailNotification->send("Bonjour, ceci est un email de test.");
echo $emailNotification->receive() . "\n";

$smsNotification = NotificationsFactory::createNotifications('sms');
$smsNotification->send("Bonjour, ceci est un SMS de test.");
echo $smsNotification->receive() . "\n";
