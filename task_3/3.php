<?php

function incomeFilter($piece){

    if(preg_match("/[^\w-]|[a-z]|-0|\./i", $piece)){
        return false;
    }
    return true;

}

$result = array_filter($argv, "incomeFilter");
$result = array_unique($result);
sort($result);
echo implode(" ", $result)."\n";
