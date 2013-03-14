<?php
/**
 * Bubble Sort v4
 *
 * Even further optimization with boundary contraction. Consider 
 * the following pseudo code:
 *
 */

function bubbleSort($array)
{
    if( !is_array($array) ) {
        return false;
    }

    $time_start = microtime(true);
    $count = sizeof($array);

    for($i=0; $i<$count-1; $i++) {
        for($j=0; $j<$count-($i+1); $j++) {
            if($array[$j] > $array[$j+1]) {
                $left = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $left;
            }
        }
    }

    $time_end = microtime(true);
    $time = $time_end - $time_start;

    print 'v4 Time: ' . $time . PHP_EOL;

    return $array;
}

$input = str_split('838346001647836430379360675769902010508712039856017490823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036297013748659018383460016478364303793606757699020105087120398560174908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362970137486590183834600164783643037936067576990201050871203985601749082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629701374865901838346001647836430379360675769902010508712039856017490823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036297013748659018383460016478364303793606757699020105087120398560174908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362970137486590183834600164783643037936067576990201050871203985601749082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629701374865901222222838346001647836430379360675769902010508712039856017490823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036290823467940174510362908234679401745103629082346794017451036297013748659012');
bubbleSort($input);
