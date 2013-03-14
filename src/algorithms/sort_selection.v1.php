<?php
/**
 * Selection Sort
 *
 * Iterate through and find the smallest value, then insert it to the first position 
 * and then repeat to fill in the second position and so on.
 *
 * Suggested pseudocode:
 *
 *      for i = 1:n,
 *          k = i
 *          for j = i+1:n, if a[j] < a[k], k = j
 *           -> invariant: a[k] smallest of a[i..n]
 *          swap a[i,k]
 *           -> invariant: a[1..i] in final position
 *      end
 *
 * Reference:
 * http://www.sorting-algorithms.com/selection-sort
 */

function selectionSort($array)
{
    if( !is_array($array) ) {
        return false;
    }

    $length = sizeof($array);

    for($i=0; $i<$length; $i++) {
        $position = $i;
        for($j=$i+1; $j<$length; $j++) {
            if($array[$j] < $array[$position]) {
                $position = $j;
            }
        }
        $smallest = $array[$position];

        $array[$position] = $array[$i];
        $array[$i] = $smallest;
    }

    return $array;
}

$input = str_split('849150173213');
selectionSort($input);
