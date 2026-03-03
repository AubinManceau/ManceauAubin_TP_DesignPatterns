# 📌 Abstract Factory

## 🎯 Problème qu’il résout

Le design pattern Abstract Factory résout le problème de la cohérence entre des objets liés. Dans une application, on a souvent besoin de manipuler des "familles" de produits qui son quasiment identique et doivent aller ensemble. Sans ce pattern, le code client doit instancier manuellement chaque objet concret.

On retient 2 risques majeurs :

- L'erreur d'assemblage : Mélanger différentes variantes de produits.

- Le couplage fort : Plus le produit à des variantes différentes, plus le code client dépend de classes concrètes, rendant l'ajout d'une nouvelle variante plus compliqué (augmentation du risque d'erreur).

## 🧠 Principe de fonctionnement

Pour mettre en place une Abstract Factory, l'idée est de créer une "usine" qui ne fabrique rien elle-même, mais définit ce qui doit être fabriqué.

- Interfaces de produits : On définit une interface pour chaque type de produit (ex: T-shirt, Chemise, Pull).

- L'Interface de la Fabrique Abstraite : Elle liste les méthodes de création de tous les produits (ex: creerT-shirt(), creerChemise(), creerPull()) et elle renvoie des types abstraits (les interfaces), jamais des classes concrètes.

- Les Fabriques Concrètes : Pour chaque variante (S, M, XL), on crée une classe "usine" spécifique. Cette "usine" sait créer tous les produits mais uniquement de la variante (ex: T-shirt S, Chemise S et Pull S).

Avec ce fonctionnement, le code client manipule une fabrique sans savoir laquelle elle est. S'il demande un Pull à une fabrique, il reçoit un Pull de la même taille (S, M ou XL) que le reste des produits pour garder une cohérence.

## 🏗 Structure (rôles des classes)

On peut diviser la structure en quatre types d'acteurs :

- Produits Abstraits : Les interfaces pour chaque type de produit (Pull, T-shirt, Chemise).

- Produits Concrets : Les versions spécifiques des produits (Pull S, Pull M, Pull XL).

- Fabrique Abstraite : L'interface globale qui déclare les méthodes de création.

- Fabriques Concrètes : Les classes qui implémentent la création des produits pour une variante précise.

## 📈 Avantages

- Compatibilité : Tous les produits créés par une fabrique fonctionnent ensemble, car elle fabrique tous les produits d'une même variante.

- Découplage total : Le code client ne connaît pas les classes concrètes (T-shirt XL ou Pull XL), il utilise uniquement les interfaces des produits (T-shirt, Pull) à travers l'interface de la Fabrique.

- Open/Closed Principle : On peut ajouter une nouvelle variante (ex: taille XS ) simplement en créant une nouvelle fabrique, sans toucher au code existant.

- Single Responsibility Principle : La logique de création est centralisée dans les fabriques.

## ⚠️ Inconvénients

- Complexité structurelle : Le nombre de classes et d'interfaces grimpe très vite (il faut une classe par produit ET par variante).

- Rigidité de la famille : Si on veut ajouter un nouveau type de produit (ex: un Pantalon ), il faut modifier l'interface de la Fabrique Abstraite et donc, par conséquences, toutes les Fabriques Concrètes déjà existantes.

## 🧩 Cas d’usage réel possible

Pour illustrer ce design pattern, prenons l'exemple d'une usine de fabrication de vêtement. Si dans cette usine, on avait une seule ligne de production qui fabrique tous les produits avec toutes ses variantes, on pourrait avoir des erreurs. Avec l'Abstract Factory, on ouvre une ligne par variante, qui sait créer tous les produits. Plus d'erreur, on sait qu'a la sortie de ses lignes on retrouve seulement les prdouits de la variante.

<a href="./example.php">Exemple de l'usine de vêtement'</a>