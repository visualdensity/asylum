<?php

function reverse($chars) {
    if( !is_array($chars) ) {
        return false;
    }

    $decrementor = count($chars)-1;

    for( $i=0; $i < $decrementor; $i++ ) {
        //Faster way of swaping values?
        list($chars[$decrementor], $chars[$i]) = array( $chars[$i], $chars[$decrementor] );
        $decrementor--;
    }

    return $chars;
}

$charset = str_split('hello over there this is my places');
$reversed = reverse($charset);

print implode($reversed) . PHP_EOL;
