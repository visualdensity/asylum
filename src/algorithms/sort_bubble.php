<?php
/**
 * Classic bubble sort
 *
 * Pseudo code:
 *
 *   func bubblesort( var a as array )
 *     for i from 1 to N
 *         for j from 0 to N - 1
 *            if a[j] > a[j + 1]
 *               swap( a[j], a[j + 1] )
 *   end func
 *
 * Reference:
 * http://www.algorithmist.com/index.php/Bubble_sort
 */

function bubbleSort($array) {

    if( !is_array($array) ) {
        return false;
    }

    $count = sizeof($array);
    for( $c=0; $c < $count-1; $c++ ) {
        for( $i=0; $i < $count-1; $i++) {
            if($array[$i] > $array[$i+1]) {
                $temp = $array[$i+1];

                $array[$i+1] = $array[$i];
                $array[$i]   = $temp;
            }
        }
    }

    return $array;
}

$input = str_split('3748659012');
print_r(bubbleSort($input));
