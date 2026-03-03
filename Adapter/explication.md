# 📌 Adapter

## 🎯 Problème qu’il résout

Le design pattern Adapter résout le problème de l'incompatibilité entre deux interfaces.

si une application utilise un format de données ou une structure de méthodes précise, mais qu'elle doit intégrer un service qui utilise un format totalement différent, on rencontre les 2 blocages suivants :

- On ne peut pas modifier le code du service (code propriétaire ou risque de tout casser).

- On ne veut pas modifier toute application pour l'adapter à chaque nouvel outil externe.

L'Adaptateur permet de faire le pont entre notre code et l'outil externe sans modifier l'un ou l'autre.

## 🧠 Principe de fonctionnement

L'idée est de créer un objet intermédiaire (l'Adaptateur) qui joue le rôle de traducteur :

- L'interface Client : l'application définit comment elle veut travailler (ex: une méthode payer(montant)).

- Le Service : C'est l'outil externe qui a une interface différente (ex: une méthode executeTransaction(amount, currency)).

- L'Adaptateur : Il implémente l'interface de l'application, mais à l'intérieur de ses méthodes, il appelle les méthodes du service en faisant les conversions nécessaires.

## 🏗 Structure (rôles des classes)

- Client : Contient la logique métier de l'application.

- Interface Client : Le contrat que l'application utilise pour communiquer avec d'autres classes.

- Service : La classe externe ou ancienne que l'application veut utiliser mais qui est incompatible.

- Adaptateur : La classe qui implémente l'Interface Client et possède une instance du Service pour effectuer la "traduction".

## 📈 Avantages

- Single Responsibility Principle (SRP) : Séparation de la logique de conversion des données et de la logique métier de l'application.

- Open/Closed Principle (OCP) : On peut ajouter de nouveaux adaptateurs (pour d'autres services externes) sans modifier le code client existant.

- Réutilisation : Facilite l'utilisation des bibliothèques "anciennes" ou incompatibles.

## ⚠️ Inconvénients

- Complexité accrue : Ajouts de nouvelles interfaces et classes. Parfois, si on a la main sur le code externe, il est plus simple de le modifier directement.

## 🧩 Cas d’usage réel possible

Prenons l'exemple d'un système de paiement pour un site E-commerce.

L'application est codé pour utiliser une interface simple PaiementInterface avec une méthode payer($total). Au début, elle utilise PayPal. Plus tard, on veut ajouter Stripe, mais Stripe demande un objet Token et une Devise en paramètres, ce qui est incompatible avec le code actuel.

Au lieu de changer tout le code de tunnel d'achat, on crée un StripeAdapter. L'application continue d'appeler payer($total), et l'adaptateur s'occupe de créer le token et de spécifier la devise pour Stripe.

<a href="./example.php">Exemple du système de paiement</a>