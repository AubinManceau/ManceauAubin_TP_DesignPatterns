# 📌 Builder

## 🎯 Problème qu’il résout

Le design pattern Builder résout le problème de la complexité de création des objets possédant de nombreuses options. Habituellement, pour créer des objets complexex, avec de nombreuses options possibles, on utilise 2 méthodes :

- Le constructeur géant : Un constructeur avec 15 paramètres (dont la moitié sont souvent null ou false), ce qui rend le code illisible.

- Les sous-classes : Créer une classe pour chaque combinaison possible. On peut finir avec une centaine de sous-classes, ce qui rend le code illisible.

Le Builder permet de construire ces objets étape par étape sans polluer le constructeur principal.

## 🧠 Principe de fonctionnement

L'idée est d'extraire la logique de construction de l'objet de sa propre classe pour la confier à des objets spécialisés appelés Builders. Prenons l'exemple de la confection d'un gâteau :

- Construction étape par étape : Au lieu d'envoyer toutes les options d'un coup, on appelle des méthodes précises : ajouterFarine(), ajouterChocolat(), etc.

Variations de produits : On peut avoir plusieurs builders qui suivent la même interface (ex: un PatissierChocolat et un PatissierFruits). Ils utilisent les mêmes étapes mais produisent des résultats différents.

Le Directeur (Optionnel) : C'est une classe qui connaît des "recettes" toutes prêtes. On lui donne un builder, et il exécute les étapes dans le bon ordre pour sortir un gâteau spécifique (ex: une Forêt Noire).

Le produit final n'est récupéré qu'à la toute fin, une fois que toutes les étapes souhaitées sont terminées.

## 🏗 Structure (rôles des classes)

- Interface du Builder : Déclare les étapes de fabrication communes à tous les types de produits.

- Builder Concrets : Implémentent les étapes de fabrication et conservent le produit en cours de création. Ils possèdent une méthode pour livrer le résultat final.

- Produit : L'objet complexe que l'on souhaite construire. Les produits créés par différents builders n'ont pas forcément besoin d'une interface commune.

- Directeur : Définit l'ordre des étapes pour créer des configurations précise. Il est optionnel.

## 📈 Avantages

- Construction contrôlée : Tu peux construire l'objet étape par étape, voire de manière récursive ou différée.

- Réutilisation du code : Tu utilises le même processus de construction pour créer des produits différents (ex: un gâteau réel et sa recette papier).

- Principe de Responsabilité Unique (SRP) : La logique de construction complexe est isolée de la logique métier du gâteau.

- Lisibilité : On évite les constructeurs avec 10 paramètres anonymes.

## ⚠️ Inconvénients

- Complexité accrue : Nécessite la création de plusieurs nouvelles classes (Interface, Builders Concrets, Directeur).

- Couplage : Le builder doit être lié au produit qu'il construit pour pouvoir en modifier les propriétés internes.

## 🧩 Cas d’usage réel possible

Pour illustrer ce design pattern, prenons l'exemple d'une usine de gâteaux.

<a href="./example.php">Exemple de l'usine de gâteaux</a>