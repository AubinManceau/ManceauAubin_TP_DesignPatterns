# 📌 Façade

## 🎯 Problème qu’il résout

Le design pattern Façade résout le problème de la complexité excessive et du couplage fort avec des systèmes sophistiqués.

Souvent, pour accomplir une tâche simple, on se retrouve face à un écosystème de dizaines de classes interdépendantes (une librairie de traitement d'image, un framework de paiement, etc.). Pour que cela fonctionne, le code client doit :

- Initialiser 10 objets dans le bon ordre.

- Gérer les dépendances entre eux.

- Appeler les méthodes dans une séquence précise.

Cela rend le code client illisible, difficile à maintenir, et totalement dépendant des détails techniques du sous-système.

## 🧠 Principe de fonctionnement

L'idée est de placer un accès simple devant un système complexe :

- Le Sous-système : C'est un ensemble de classes complexes qui effectuent le travail technique.

- La Façade : C'est une classe unique qui offre des méthodes simplifiées. Elle connaît les rouages internes du système et s'occupe de coordonner tous les petits objets à la place du client.

## 🏗 Structure (rôles des classes)

- Façade : Procure un accès simplifié aux fonctionnalités du sous-système. Elle sait quel objet appeler pour chaque requête.

- Classes du Sous-système : Les classes complexes (souvent issues d'un framework externe). Elles ne savent pas que la Façade existe et travaillent directement entre elles.

- Client : Utilise uniquement la Façade pour interagir avec le système.

## 📈 Avantages

- Isolation : Le code de l'application est protégé de la complexité et des changements futurs du sous-système.

- Simplicité : Offre une interface "clés en main" pour les cas d'utilisation les plus fréquents.

- Découplage : Réduit le nombre de dépendances entre le code et les classes externes.

## ⚠️ Inconvénients

- Risque d'illibilité : La Façade peut devenir une classe gigantesque qui finit par être couplée à absolument tout si on n'y prend pas garde. On peut créer des facades additionnels pour contrer ce problème.

## 🧩 Cas d’usage réel possible

Imaginons un système de Maison Connectée, pour lancer un "Mode Cinéma", il faudrait normalement :

- Allumer la TV.

- Régler l'ampli sur la source HDMI 2.

- Baisser les volets roulants.

- Éteindre les lumières du salon.

Sans Façade, l'application doit connaître les classes TV, Ampli, Volet et Eclairage. Avec une Façade HomeCinema, elle appelle juste la méthode activerModeCinema().

<a href="./example.php">Exemple du système domotique</a>