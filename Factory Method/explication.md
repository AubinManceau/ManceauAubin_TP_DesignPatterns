# 📌 Factory Method

## 🎯 Problème qu’il résout

Le design pattern Factory Method résout un problème majeur de couplage fort.

Dans une application classique, on retrouve souvent des instanciations directe d'objets (l'utilisation de "new"). Dans ce cas, l'application dépend directement d'une classe précise, le jour où on doit remplacer cette classe ou en ajouter une nouvelle, on risque d'avoir de nombreux effets de bord.

Le problème est qu'ici, on mélange la création et l'utilisation de l'objet. Pour une simple évolution, on se retrouve obligé de faire des modifications à plusieurs endroits, ce qui ne respecte pas le "Open/Closed Principle" des bonnes pratiques "SOLID".

## 🧠 Principe de fonctionnement

Pour mettre en place une Factory Method, il faut laisser la création des objets à une méthode spéciale :

- Une interface commune : On commence par définir une interface (ou une classe abstraite) que tous les objets créés devront respecter. Cela permet au reste du code de manipuler ces objets sans savoir ce qu'ils sont vraiment, tant qu'ils respectent le contrat.

- Le Créateur (Factory) : On crée une classe qui contient une méthode de fabrication. Cette méthode a pour seul but d'initier et retourner un objet. On déclare cette méthode comme statique pour ne pas à avoir à instancier le factory avant.

- Les classes : On crée autant de classe que l'on souhaite auxquels on assigne l'interface commune. Désormais, ces classes sont instanciables grâce au factory. 

Ainsi, ces classes ne se soucient plus de comment elles seront instanciés mais uniquement de leur logique métier.

## 🏗 Structure (rôles des classes)

Le Factory Method est plus complexe structurellement car il implique une hiérarchie de classes.

On peut découper la structure en deux familles d'acteurs :

1. Le Créateur (Factory) : C'est la classe qui déclare la méthode de fabrication. Elle ne sait pas quel produit précis elle va manipuler, elle sait juste qu'il respecte l'interface.

2. L'interface : C'est l'interface qui définit ce que les objets fabriqués ont en commun.

3. Les classes concretes : Ce sont les classes qui implémentent l'interface.

## 📈 Avantages

- Découplage : Le factory et les classes concretes sont indépendants. On peut ajouter de nouvelles classes sans casser le code existant. C'est une des bonnes pratiques "SOLID", le Open/Close Principle.

- Principe de Responsabilité Unique (SRP) : Le code de création et la logique métier sont séparés, rendant le code plus propre.

- Centralisation : Le mot-clé new n'apparaît qu'à un seul endroit (dans la Factory). Si la logique de création change, on ne modifie qu'un seul fichier.

## ⚠️ Inconvénients

- Complexité du code : Le nombre de classes peut augmenter rapidement. Pour chaque nouvelle interface, on va devoir créer une nouvelle factory correspondante.

- Suroptimisation : Parfois, utiliser une simple instanciation suffit. Mettre en place toute la structure du Factory Method peut être excessif pour des petits projets.

## 🧩 Cas d’usage réel possible

Pour illustrer ce design pattern, prenons l'exemple d'un module de notifications. Au départ, l'application envoie uniquement des Emails.

Plus tard, on veut ajouter l'envoi de SMS. Grâce au Factory Method et à notre interface, il nous reste plus qu'à créer la classe SMS avec ses différentes méthodes.

<a href="./example.php">Exemple du système de notifications</a>