<?php
/**
 * Déclaration de variable
 */
$resultat = NULL;
$operateur = array(
    "somme" => "+",
    "moins" => "-",
    "divide" => "&divide;",
    "multiple" => "x"
);
$element1 = NULL;
$element2 = NULL;

/**
 * Déclaration de function
 */
function somme($x, $y) {
    $res = $x + $y;
    return $res;
}
function divide($x, $y){
    if($y != 0){
        $resultat = $x / $y;
        return $resultat;
    }
    return '&infin;';
}
function multiple($x, $y){
    return $x * $y;
}
function moins($x, $y){
    return $x - $y;
}
if (isset($_POST['egal']) && $_POST['egal'] == "submit") {
    $element1 = $_POST['element1'];
    $element2 = $_POST['element2'];
    if(function_exists($_POST['operateur'])){
        $resultat = $_POST['operateur']($element1, $element2);
    }   
}