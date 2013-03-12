<?php

function reverse($chars) {
    if( !is_array($chars) ) {
        return false;
    }

    $decrementor = count($chars)-1;

    for( $i=0; $i < $decrementor; $i++ ) {
        $back =  $chars[$decrementor];
        $chars[$decrementor] = $chars[$i];
        $chars[$i] = $back;

        $decrementor--;
    }

    return $chars;
}

$charset = str_split('hello over there this is my place');
$reversed = reverse($charset);

print_r($reversed);
