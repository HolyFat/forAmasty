<?php
function mixed(){
    $sting = 'red, blue, green, yellow, lime, magenta, black, gold, gray, tomato';
    $pieces = explode(", ", $sting);
    shuffle($pieces);
    $pieces = array_chunk($pieces, 5);
    for($i=0; $i<5; $i++){

        $rand_keys = array_rand($pieces[0]);
        $rand_keys2 = array_rand($pieces[1]);
        print_r($pieces[0][$rand_keys]."|".$pieces[1][$rand_keys2]);
        print_r(" ");

    }
}

for($i=0; $i<5; $i++){
    mixed();
    print_r("<br>");
}

?>