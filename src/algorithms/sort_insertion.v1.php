<?php
/**
 * Insertion sort
 *
 * Pick the second value, then move left incrementally and compare - if left is 
 * bigger, move the item right. Repeat. 
 *
 * Step through is available here (very useful):
 * http://algorithms.openmymind.net/sort/insertionsort.html
 *
 * Pseudo code:
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
print_r(insertionSort($input));
