<?php
$tab=NULL;
$valeur=NULL;
$deb=NULL;
$fin=NULL;


function dichotomie($tab, $valeur, $deb, $fin)
{
   if($deb <= $fin){
        $milieu = (int)($deb+$fin)/2;
        if($tab[$milieu] == $valeur) return $milieu;
    else if($tab[$milieu] < $valeur) return dichotomie($tab, $valeur, $milieu+1, $fin);
    else if($tab[$milieu] > $valeur) return dichotomie($tab, $valeur, $deb, $milieu-1);}
   else return -1;
}
   
$tableau = array(1,2,3,4,5,6,7,8,9);
echo dichotomie($tableau,3,0,9);
?>