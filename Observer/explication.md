# 📌 Observer

## 🎯 Problème qu’il résout

Le design pattern Observer répond à un besoin : synchroniser l'état de plusieurs objets sans les rendre totalement dépendants les uns des autres.

Dans une application, il arrive souvent qu'un objet principal modifie son état et que d'autres objets doivent réagir en conséquence. Sans ce design pattern, l'objet principal devrait connaître et appeler explicitement tous les autres objets, créant un couplage fort et rigide. 
De plus, si l'on souhaite ajouter de nouveaux objets à notifier, il faudrait modifier le code de l'objet principal, ce qui ne respecte pas le principe Ouvert/Fermé (Open/Closed Principle).

Une autre mauvaise approche serait que les objets dépendants vérifient en boucle l'état de l'objet principal, ce qui gaspille des ressources inutilement.

## 🧠 Principe de fonctionnement

Le principe repose sur un mécanisme d'abonnement.

- Un Diffuseur (Publisher) : C'est ce qui détient l'état important. Il maintient une liste d'observateurs abonnés.

- Des Abonnés (Subscriber) : Ce sont ceux qui veulent être tenus au courant des changements du Diffuseur.

- Inscription : Les abonnés peuvent s'inscrire ou se désinscrire dynamiquement auprès du Diffuseur via une méthode publique.

- Notification : Dès que le Diffuseur change d'état, il parcourt sa liste d'abonnés et appelle une méthode de mise à jour spécifique sur chacun d'eux.

Ainsi, le Diffuseur ne connaît pas la classe concrète de ses abonnés, il sait juste qu'ils implémentent une interface commune de notification.

## 🏗 Structure (rôles des classes)

1. L'interface de diffusion (Publisher) : Interface ou classe abstraite qui définit les méthodes pour ajouter, supprimer et notifier des abonnés.

2. Le diffuseur (Publisher) : Classe qui implémente les méthodes de l'interface de diffusion. Il notifie ses abonnés quand son état change.

3. L'interface d'abonnement (Subscriber) : Interface qui déclare la méthode de mise à jour (ex: `update()`) que le diffuseur appellera.

4. Les abonnés (Subscriber) : Classe qui implémente l'interface d'abonnement afin de maintenir son état en cohérence avec le diffuseur.

## 📈 Avantages

- Couplage faible : Le diffuseur et les abonnés peuvent varier indépendamment tant qu'ils respectent leurs interfaces.

- Relations dynamiques : On peut ajouter ou supprimer des abonnés au moment de l'exécution.

- Principe Open/Closed : On peut introduire de nouvelles classes d'abonnés sans avoir à modifier le code du diffuseur.

## ⚠️ Inconvénients

- Ordre de notification : L'ordre dans lequel les abonnés sont notifiés est généralement aléatoire ou indéfini, il ne faut donc pas compter dessus.

- Fuites de mémoire : Si les abonnés ne se désinscrivent pas correctement, ils peuvent rester en mémoire inutilement (le diffuseur gardant une référence vers eux).

- Mises à jour en cascade : Une modification peut déclencher une série de mises à jour complexes et coûteuses si les abonnés modifient eux-mêmes d'autres abonnés.

## 🧩 Cas d’usage réel possible

Un exemple classique est celui des données boursières.

Une place de marché (le diffuseur) reçoit continuellement de nouvelles valeurs pour différentes actions.

Plusieurs entités (les abonnés) ont besoin de ces informations en temps réel mais pour des raisons différentes :

Grâce au design pattern Observer, la place de marché n'a pas besoin de savoir qui consomme ses données, elle diffuse juste l'information à tous ceux qui se sont abonnés.

<a href="./example.php">Exemple du marché boursier</a>