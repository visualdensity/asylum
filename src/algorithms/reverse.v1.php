<?php
// Reverse a string

function reverse($chars) {

    $charsSize   = count($chars);
    $charsToSwap = floor($charsSize/2);
    $decrementor = $charsSize-1;

    for($incrementor=0; $incrementor < $charsToSwap; $incrementor++) {

        $front = $chars[$incrementor];

        //in place swap
        $chars[$incrementor] = $chars[$decrementor];
        $chars[$decrementor] = $front;

        $decrementor--;
    }

    return $chars;
}

//example
$string = 'twinkle twinkle little star, how I wonder what you are, up above the world so high, like a diamond in the sky';
$reversed = reverse(str_split($string));

print implode($reversed) . PHP_EOL;
