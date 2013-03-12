<?php
/**
 * Insertion sort
 *
 *  for i from 1 to N
 *      key = a[i]
 *      j = i - 1
 *      while j >= 0 and a[j] > key
 *          a[j+1] = a[j]
 *          j = j - 1
 *      a[j+1] = key 
 */


function insertionSort($array)
{
    if( !is_array($array) ) {
        return false;
    }

    $count = sizeof($array);

    for( $i=1; $i<$count; $i++ ) {
        $key = $array[$i];
        $j = $i-1;

        while( $j >= 0 && $array[$j] > $key ) {
            $array[$j+1] = $array[$j];
            $j = $j - 1;
        }

        $array[$j+1] = $key;
    }

    return $array;
}

$input = str_split('83834600164783');
insertionSort($input);
//print_r(insertionSort($input));
