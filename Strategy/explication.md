# 📌 Stratégie

## 🎯 Problème qu’il résout

Le design pattern Stratégie résout le problème des classes remplies de blocs conditionnels (if/else ou switch) servant à choisir entre plusieurs variantes d'un même algorithme.

Imaginons un site e-commerce qui gère des réductions. Au début, on a une seule règle. Puis on ajoute les soldes, puis un code promo influenceur, puis une remise "fidélité", puis le Black Friday...
Rapidement, la méthode calculerPrix() devient un cauchemar de maintenance :

- Modifier une règle de calcul risque de casser toutes les autres.

- La classe devient gigantesque.

- Il est impossible d'ajouter une nouvelle promotion sans modifier le code source principal (violation du principe Open/Closed).

Le pattern Stratégie permet de sortir ces algorithmes de la classe principale pour les rendre interchangeables.

## 🧠 Principe de fonctionnement

L'idée est de transformer un comportement en un objet séparé :

- L'interface Stratégie : Elle définit une méthode commune à toutes les variantes (ex: appliquerPromotion(prix)).

- Les Stratégies Concrètes : Chaque classe implémente une version spécifique de l'algorithme (ex: PromotionSoldes, PromotionNoel).

- Le Contexte : C'est la classe qui a besoin de l'algorithme (ex: le Panier). Elle possède une référence vers une interface Stratégie. Elle ne sait pas quel calcul est effectué, elle appelle juste la méthode de calcul.

Le point clé est que le client choisit la stratégie et la donne au contexte. Le contexte peut même changer de stratégie en plein milieu de l'exécution (ex: appliquer une remise de dernière minute).

## 🏗 Structure (rôles des classes)

- Stratégie : L'interface commune à tous les algorithmes.

- Stratégies Concrètes : Les différentes implémentations de l'algorithme.

- Contexte : Garde une référence vers une stratégie et délègue le travail à celle-ci.

- Client : Crée l'objet stratégie spécifique et le passe au contexte.

## 📈 Avantages

- Permutation à l'exécution : Permet de changer le comportement d'un objet dynamiquement.

- Isolation : Sépare les détails de calcul de la logique métier globale.

- Open/Closed Principle : On peut ajouter de nouvelles stratégies sans toucher au code du Contexte.

- Évite l'Héritage : Utilise la composition plutôt que de créer des dizaines de sous-classes.

## ⚠️ Inconvénients

- Complexité inutile : Si il n'y a que deux algorithmes qui ne changent jamais, une simple condition suffit.

- Connaissance du client : Le client doit connaître les différences entre les stratégies pour choisir la bonne.

## 🧩 Cas d’usage réel possible

Prenons l'exemple d'un système de calcul de frais de livraison. Selon le choix du client, le calcul change :

- Standard : Prix fixe au poids.

- Express : Prix fixe élevé.

- Relais : Gratuit à partir d'un certain montant.

Au lieu d'avoir un switch dans la classe Commande, on crée une interface LivraisonStrategy. La commande appelle juste $strategy->calculer($poids). Si demain on ajoute la livraison par "Drone", on aura juste à créer une nouvelle classe DroneStrategy.

<a href="./example.php">Exemple du système de livraison</a>