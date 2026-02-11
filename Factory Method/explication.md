# 📌 Factory Method

## 🎯 Problème qu’il résout

Le design pattern Singleton résout deux problèmes importants.

D'abord, avec une classe standard, à chaque fois qu'elle est instanciée, un nouvel objet est créé. Il peut donc y avoir plusieurs objets différents, initiés avec la même classe à différents endroits et différents moments. L'avantage du Singleton, c'est que l'on peut maîtriser le nombre d'instances d'une classe dans toute son application.

Ensuite, alors qu'avec une classe standard un objet peut être instancié n'importe où, n'importe quand et par n'importe qui, le Singleton ferme l'accès à la création. On ne peut créer une instance que depuis la classe elle-même.

## 🧠 Principe de fonctionnement

Pour mettre en place un Singleton, il faut suivre une logique précise :

- Il faut commencer par déclarer le constructeur comme private. Cela bloque l'accès à la création d'une instance depuis l'extérieur de la classe (le mot-clé new ... ne fonctionne plus ailleurs).

- On doit créer un attribut (souvent nommé instance) qui contiendra l'unique objet de la classe. Celui-ci doit être statique (pour que notre méthode d'initialisation puisse y accéder) et privé (afin d'empêcher sa modification).

- Il faut créer une porte d'entrée contrôlée pour pouvoir instancier et utiliser cette classe. On crée donc une méthode statique et publique (pour y avoir accès n'importe où, et sans objet encore instancié).

La logique de la méthode est simple : elle vérifie si l'attribut instance est null. Si c'est le cas, elle crée une nouvelle instance de la classe, sinon, elle retourne l'instance déjà existante stockée dans l'attribut.

Grâce à ce design pattern, on répond aux deux problématiques : on gère le nombre d'instances d'une classe tout en la rendant accessible globalement, sans risquer que l'instance soit écrasée par erreur.

## 🏗 Structure (rôles des classes)

Le Singleton est très simple d'un point de vue struturelle, il ne comporte qu'une seule classe. Cependant, cette classe gère à la fois son travail métier mais aussi la gestion de son cycle de vie.

On peut donc découper la structure en deux acteurs principaux, la gestion du cycle de vie, détaillé au dessus et la logique métier qui va varier en fonction de la classe.

## 📈 Avantages

- Contrôle de l'instance : On est certain d'avoir uniquement une seule instance de cette classe.

- Point d'accès : L'instance est accessible de n'importe où dans le code via une méthode sécurisée.

- Initialisation : Le singleton est initialisé une seule fois seulement si l'on en a besoin.

## ⚠️ Inconvénients

- Principe de Responsabilité Unique (SRP) : le singleton doit gérer deux choses : sa logique métier et son cycle de vie. C'est un manquement aux bonnes pratiques "SOLID".

- Couplage : Si la conception n'est pas bonne, il peut y avoir un fort couplage entre le singleton et les autres classes. Cela pourrait entraîner des effets de bord si l'instance du singleton est modifié.

- Tests : À cause du constructeur privé et de la méthode statique, c'est plus compliqué de faire un mock du Singleton. Les tests sont donc plus difficiles à mettre en place.

## 🧩 Cas d’usage réel possible

Pour illustrer ce design pattern, prenons l'exemple d'un aeroport avec plusieurs pistes. Si on avait plusieurs tours de controle (le singleton), alors l'un pourrait autoriser le décolage tandis que l'autre pourrais le refuser.

<a href="./example.php">Exemple de la tour de contrôle</a>