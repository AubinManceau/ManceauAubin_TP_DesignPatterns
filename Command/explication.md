# 📌 Command

## 🎯 Problème qu’il résout

Le design pattern Commande résout le problème du couplage direct entre l'objet qui demande une action et celui qui l'exécute. Si l'on met le code métier directement dans la classe de l'objet qui demande une action, on rencontre deux soucis :

- Duplication : Si l'on veut la même action via un autre objet, on doit copier le code métier.

- Rigidité : L'objet est "soudé" à une action précise. On ne peut pas changer sa fonction dynamiquement.

Le pattern Commande transforme une requête en un objet autonome. Cela permet de transporter l'action, de la stocker, de la retarder ou de l'annuler.

## 🧠 Principe de fonctionnement

L'idée est d'intercaler un objet entre celui qui clique et celui qui travaille :

- Le Récepteur : C'est l'objet qui sait "faire" le travail (ex: la Lumière qui s'allume).

- La Commande : Un objet qui contient la référence du récepteur et les paramètres nécessaires. Il possède une méthode executer().

- Le Demandeur (Invoker) : Il déclenche la commande (ex: l'interupteur). Il ne sait pas ce que fait la commande, il sait juste qu'il doit appeler executer().

- Le Client : C'est lui qui crée la commande, lui donne son récepteur, et l'associe au bouton.

## 🏗 Structure (rôles des classes)

- Interface Commande : Déclare généralement une seule méthode : executer().

- Commande Concrète : Définit le lien entre un récepteur et une action.

- Récepteur : La classe qui contient la logique métier complexe.

- Demandeur (Invoker) : Stocke et déclenche la commande.

- Client : Assemble les pièces (crée le récepteur, la commande et configure le demandeur).

## 📈 Avantages

- Découplage : La classe qui déclenche l'action ne connaît rien de la logique interne du traitement.

- Annulation : En stockant les objets commandes dans une pile, on peut facilement revenir en arrière.

- Files d'attente : On peut lister des commandes pour les exécuter plus tard ou à distance.

- Commandes Composites : On peut créer une "Macro" (une seule commande qui en déclenche 10 autres).

## ⚠️ Inconvénients

- Nombre de classes : On crée beaucoup de petites classes pour chaque action, ce qui peut alourdir l'architecture.

## 🧩 Cas d’usage réel possible

Prenons l'exemple d'une Télécommande Universelle pour domotique. La télécommande (Demandeur) possède des boutons génériques (Bouton A, Bouton B). On veut pouvoir configurer le Bouton A pour qu'il allume la Lumière du salon, mais plus tard, on veut qu'il puisse aussi ouvrir la Porte du garage.

Au lieu de modifier le code de la télécommande, on lui "donne" simplement une nouvelle commande (AllumerLumiere ou OuvrirGarage) qui pilotera le bon appareil (Récepteur).

<a href="./example.php">Exemple de la télécommande</a>