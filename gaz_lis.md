#Problème

ErrorException Tentative d'accès à l'offset du tableau sur une valeur de type null [fermé]

#Solution
La version PHP est en effet le problème. Sur l'hôte précédent, c'était PHP 7.3, mais le nouveau exécute 7.4, ce qui a causé le problème.

Maintenant, j'ai rétrogradé à P.H.P. 7.3.1 et l'application fonctionne maintenant correctement.

Merci beaucoup.