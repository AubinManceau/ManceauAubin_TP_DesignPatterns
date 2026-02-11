# 📌 Decorator

## 🎯 Problème qu’il résout

Le design pattern Decorator résout un problème lié à la rigidité de l'héritage statique lorsque l'on souhaite ajouter des fonctionnalités à un objet.

Dans une approche classique, pour ajouter des comportements à une classe, on utilise l'héritage en créant des sous-classes. Cependant, cette méthode présente deux limites majeures.

- D'une part, l'ajout de fonctionnalités est statique : on ne peut pas modifier l'état d'un objet existant au moment de l'exécution.

- D'autre part, si l'on souhaite combiner plusieurs fonctionnalités indépendantes, on se retrouve rapidement avec un nombre important de sous-classes pour couvrir tous les cas possibles, ce qui rend le code difficile à maintenir.

## 🧠 Principe de fonctionnement

Pour mettre en place un Decorator, l'idée est d'envelopper la classe de base dans des classes "décorateurs" qui ajoutent leur propre comportement.

- Une interface commune : On définit une interface (ou une classe abstraite) que l'objet de base et tous les décorateurs devront respecter. Cela permet au reste du code de traiter un objet simple ou un objet "décoré" exactement de la même manière.

- La classe concrète : C'est la classe initiale auquel on souhaite ajouter des fonctionnalités.

- Le Décorateur de base : Cette classe implémente l'interface commune et possède un attribut qui contient le décorateur suivant. Il permet de faire le lien entre la couche actuelle et la couche suivante.

- Les Décorateurs Concrets : Ce sont des classes qui héritent du décorateur de base. Elles ajoutent leur propre logique à l'objet qu'elles enveloppent.

Ainsi, on peut "empiler" les décorateurs pour cumuler les fonctionnalités souhaitées sur un même objet.

## 🏗 Structure (rôles des classes)

Le design pattern Decorator repose sur la composition et l'implémentation d'une interface commune.

On peut identifier quatre acteurs principaux :

1. Le Composant (Component) : L'interface ou la classe abstraite définissant les méthodes communes.

2. Le Composant Concret (Concrete Component) : La classe de base qui implémente l'interface et contient la logique métier de base.

3. Le Décorateur (Decorator) : La classe intermédiaire qui implémente l'interface et contient une référence vers un Composant (soit un Composant Concret, soit un autre Décorateur).

4. Les Décorateurs Concrets (Concrete Decorators) : Les classes qui ajoutent les fonctionnalités supplémentaires.

## 📈 Avantages

- Flexibilité : On peut ajouter ou retirer des responsabilités à un objet même après sa création, contrairement à l'héritage qui est figé à la création de la classe.

- Principe de Responsabilité Unique (SRP) : On peut diviser une classe complexe qui fait trop de choses en plusieurs petites classes avec des fonctionnalités spécifiques.

- Alternative à l'héritage : Permet d'éviter les hiérarchies de classes profondes et complexes (énormément de sous-classes).

## ⚠️ Inconvénients

- Complexité du code : Le pattern introduit de nombreuses petites classes dans le projet, ce qui peut rendre la structure plus difficile à comprendre et à maintenir.

- Instanciation verbeuse : La création des objets décorés nécessite souvent d'empiler plusieurs décorateurs, ce qui peut rendre le code de création moins lisible.

## 🧩 Cas d’usage réel possible

Pour illustrer ce design pattern, prenons l'exemple d'un système de vente de boissons (comme un café). On commence avec une boisson de base.

Si l'on veut permettre aux clients d'ajouter des ingrédients (lait, caramel, chantilly), créer une sous-classe pour chaque combinaison (CafeLait, CafeCaramel, CafeLaitChantilly...) serait ingérable. Avec le Decorator, on peut simplement "décorer" notre objet boisson avec les ingrédients souhaités au moment de la commande.

<a href="./example.php">Exemple de préparation de café</a>