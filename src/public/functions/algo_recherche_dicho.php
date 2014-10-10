<?php
$iterateDicho = 0;
$timerDicho = 0;
if(isset($_POST['search']) && $_POST['search'] == 'submit'){
    //déclarations et initialisation
    $timerStart = microtime_float();    
    $debut = $_POST['rangeLeft'];
    $fin = $_POST['rangeRight'];
    $val = $_POST['number'];
    $t = generateArray($debut, $fin);
    $trouve = FALSE;
    do {
        $iterateDicho++;
        $mil = floor(($debut + $fin)/2);
        if($t[$mil] == $val){
            $trouve = TRUE;
        } elseif ($val > $t[$mil]) {
            $debut = ++$mil;
        } else {
            $fin = --$mil;
        }
    } while ($trouve == FALSE && $debut <= $fin);
    $timerEnd = microtime_float();
    $timerDicho = $timerEnd - $timerStart;
}


/*
//Boucle de recherche
  Répéter
   mil ← partie entière((début + fin) / 2)
   Si t[mil] = val alors
     trouvé ← vrai
   Sinon
     Si val > t[mil] Alors
       début ← mil+1
    
     Sinon
       fin ← mil-1
    
     FinSi
    FinSi
Tant que trouvé = faux ET début ≤ fin
*/



//Affichage du résultat
/*Si trouvé Alors
Afficher "La valeur ", val , " est au rang ", mil
Sinon
Afficher "La valeur ", val , " n'est pas dans le tableau"
FinSi
*/