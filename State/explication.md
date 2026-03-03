# 📌 State

## 🎯 Problème qu’il résout

Le design pattern État résout le problème des classes polluées par d'énormes structures conditionnelles (if/else ou switch) qui tentent de gérer les programmes disposants d'un nombre fini d'état.

Imaginons un objet dont le comportement change selon sa situation (un Document, un Personnage de jeu vidéo, etc.). Sans ce pattern, chaque méthode de l'objet doit d'abord vérifier : "Dans quel état suis-je ?" avant d'agir.

- Maintenance complexe : Si on ajoute un nouvel état, on doit modifier chaque méthode de la classe.

- Illisibilité du code : La logique de changement d'état est mélangée à la logique métier, rendant le code illisible.

Le design pattern État permet à un objet de changer de classe dynamiquement pour adopter un nouveau comportement.

## 🧠 Principe de fonctionnement

Au lieu d'avoir une variable string $state et des conditions, on transforme chaque état en une classe réelle :

- Le Contexte : C'est l'objet principal (ex: le Distributeur). Il possède une référence vers un "objet État". Lorsqu'il reçoit une action (ex: "appuyer sur le bouton"), il ne réfléchit pas : il délègue l'appel à son objet État actuel.

- L'interface État : Elle définit toutes les actions possibles (ex: insererArgent(), appuyerBouton()).

- Les États Concrets : Chaque classe représente un état (ex: AttenteArgent, ProduitSelectionne). Elle sait comment réagir et, surtout, elle sait quel sera l'état suivant.

Contrairement au pattern Stratégie, les états se connaissent souvent entre eux pour déclencher les transitions (le passage d'un état à l'autre).

## 🏗 Structure (rôles des classes)

- Contexte : Maintient une instance d'un état concret et expose une méthode pour changer d'état.

- Interface État : Déclare les méthodes communes à tous les états.

- États Concrets : Implémentent les comportements spécifiques et gèrent le passage vers l'état suivant via le contexte.

## 📈 Avantages

- Principe de Responsabilité Unique (SRP) : Le code lié à chaque état est isolé dans sa propre classe.

- Principe Ouvert/Fermé (OCP) : On peut ajouter de nouveaux états sans modifier les classes existantes ou le contexte.

- Clarté : On élimine les gros blocs de conditions imbriquées.

## ⚠️ Inconvénients

- Surpoids : Si l'automate ne possède que deux états simples avec peu de changements, créer une hiérarchie de classes peut être excessif.

## 🧩 Cas d’usage réel possible

Prenons l'exemple d'un Distributeur de Café. Ses comportements changent selon sa situation :

- État "Attente" : Si on appuie sur "Café", il ne se passe rien. Si on insère une pièce, il passe en État "Argent Reçu".

- État "Argent Reçu" : Si on appuie sur "Café", il lance la préparation et passe en État "Distribution".

- État "Épuisé" : Il refuse les pièces et affiche un message d'erreur.

Le distributeur (Contexte) délègue tout à l'objet État. Si la machine tombe en panne, on lui injecte un EtatPanne et tous les boutons changent de comportement instantanément.

<a href="./example.php">Exemple du distributeur</a>