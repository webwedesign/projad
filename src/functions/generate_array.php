<?php
function generateArray($debut, $fin){
    $array = array();
    for ($i = (int)$debut; $i <= $fin; $i++){
        $array[$i] = $i;
    }
    return $array;
}