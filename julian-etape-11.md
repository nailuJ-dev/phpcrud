## 1. Mise à jour du UserController, je modifie la méthode list() pour faire :

- instance du UserManager
- appel de findAll() pour récupérer tous les users dans User
- on passe User dans une variable pour pouvoir l'utiliser dans le phtml


## 2. Mise à jour de l'affichage des utilisateurs via list.phtml

- on crée du html pour afficher les données
- on check si la variable avec les suers n'est pas vide
- on fait un foreach pour appliquer les infos de chaque utilisateur au html : chaque user = un élément
- pour chaque user on utilise les getters

## 3. Test de l'opération