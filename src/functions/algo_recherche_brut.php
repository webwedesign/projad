<?php 
$iterateBrut = 0;
$timerBrut = 0;
if(isset($_POST['search']) && $_POST['search'] == 'submit'){
    //déclarations et initialisation
    $timerStart = microtime_float();
    $debut = $_POST['rangeLeft'];
    $fin = $_POST['rangeRight'];
    $val = $_POST['number'];
    $t = generateArray($debut, $fin);
    $trouve = FALSE;
    for ($i = $debut; $i <= $fin && $trouve == FALSE; $i++){
        $iterateBrut++;
        if($t[$i] == $val){
            $trouve = TRUE;
        }
    }
    $timerEnd = microtime_float();
    $timerBrut = $timerEnd - $timerStart;
}