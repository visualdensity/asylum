<?php
/**
 * Bubble Sort v4
 *
 * Even further optimization with boundary contraction. Consider 
 * the following pseudo code:
 *
 *     func bubblesort4( var a as array )
 *         bound = N-1
 *         for i from 1 to N
 *             newbound = 0
 *             for j from 0 to bound
 *             if a[j] > a[j + 1]
 *                 swap( a[j], a[j + 1] )
 *                 newbound = j - 1
 *             bound = newbound
 *     end func
 */

function bubbleSort($array)
{
    if( !is_array($array) ) {
        return false;
    }

    $count    = sizeof($array);
    $bound    = $count-1;

    for( $i=1; $i<$count; $i++ ) {
        $newBound = 0;
        for( $j=0; $j<$bound; $j++ ) {
            if( $array[$j] > $array[$j+1] ) {
                $left = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $left;

                $newBound = $j-1;
            }

            $bound = $newBound;
            print $bound . PHP_EOL;
        }
    }

    return $array;
}

$input = str_split('83834600164783');
print_r(bubbleSort($input));
