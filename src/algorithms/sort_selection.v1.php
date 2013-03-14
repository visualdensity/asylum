<?php
/**
 * Selection Sort
 *
 * Iterate through and find the smallest value, then insert it to the first position 
 * and then repeat to fill in the second position and so on.
 *
 * Key point here is to use the array index to seek out the position of the smallest 
 * value on each pass, then swap it in place.
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

    $time_start = microtime(true);
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

    $time_end = microtime(true);
    $time = $time_end - $time_start;

    print 'Selection v1: ' . $time . PHP_EOL;

    return $array;
}

$input = str_split('838346001647836430379360675769902010508712039856017490823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036297013748659018383460016478364303793606757699020105087120398560174908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362970137486590183834600164783643037936067576990201050871203985601749082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629701374865901838346001647836430379360675769902010508712039856017490823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036297013748659018383460016478364303793606757699020105087120398560174908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362970137486590183834600164783643037936067576990201050871203985601749082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629701374865901222222838346001647836430379360675769902010508712039856017490823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036297013748659012');
selectionSort($input);
