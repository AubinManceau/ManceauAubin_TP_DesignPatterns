# 📌 Composite

## 🎯 Problème qu’il résout

Le design pattern Composite résout le problème de la manipulation de structures hiérarchiques en forme d'arborescence.

Imaginons que l'on doit calculer la taille totale occupée par des données sur un disque dur. On a deux types d'objets :

- Des Fichiers (objets simples).

- Des Dossiers (objets complexes qui contiennent des fichiers ou d'autres dossiers).

Sans le Composite, on devrait vérifier à chaque étape : "Est-ce un fichier ? Si oui, je prends la taille. Est-ce un dossier ? Si oui, je dois ouvrir le dossier et regarder ce qu'il y a dedans." Cela crée des boucles et des conditions complexes qui se répètent à chaque niveau d'imbrication.

Le Composite permet de traiter un objet simple et un groupe d'objets de la même manière.

## 🧠 Principe de fonctionnement

Le secret du Composite est de faire en sorte que les objets simples et les conteneurs partagent la même interface.

- L'interface Composant : Elle définit les opérations communes (ex: getTaille()).

- La Feuille : C'est l'objet simple qui ne contient rien d'autre (ex: le fichier). Elle exécute le travail réel.

- Le Composite : C'est un objet qui contient une liste d'enfants (Feuilles ou autres Composites). Lorsqu'on lui demande sa taille, il parcourt ses enfants, additionne leurs tailles respectives, et renvoie le total.

Grâce à la récursivité, l'appel descend tout seul dans l'arbre jusqu'à atteindre les feuilles, sans que le client n'ait à se soucier de la structure.

## 🏗 Structure (rôles des classes)

- Composant : Interface commune à tous les éléments de l'arbre.

- Feuille : Représente les objets finaux. Elle ne peut pas avoir d'enfants.

- Composite : Stocke des composants enfants et implémente les méthodes de l'interface en déléguant le travail à ses enfants.

- Client : Manipule tous les éléments via l'interface Composant, ignorant s'il s'adresse à un objet simple ou à une structure complexe.

## 📈 Avantages

- Polymorphisme et Récursivité : Simplifie le code en traitant les structures complexes comme des objets uniques.

- Open/Closed Principle : Possibilité d'ajouter de nouveaux types d'éléments (en implémentant la même interface) sans modifier le code qui parcourt l'arbre.

- Flexibilité : Le client peut composer des structures d'objets à la volée.

## ⚠️ Inconvénients

- Interface trop générique : Parfois, il est difficile de trouver des méthodes communes qui font sens à la fois pour la feuille et le conteneur.

- Manque de restriction : Il est difficile d'empêcher un Composite de recevoir certains types d'enfants spécifiques via l'interface commune.

## 🧩 Cas d’usage réel possible

L'exemple le plus parlant est le Système de Fichiers. Qu'il s'agisse d'un fichier ou d'un dossier (contenant lui-même des fichiers et des sous-dossiers), on peut obtenir la taille totale.

Le bouton "Propriétés" sur lequel on clique pour afficher la taille est le Client. Il appelle calculerTaille() sur l'élément sélectionné. Si c'est un dossier, le dossier demande à ses enfants, et ainsi de suite. Le client ne voit qu'un seul chiffre à la fin.

<a href="./example.php">Exemple du système de fichiers</a>