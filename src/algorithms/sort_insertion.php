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
        print 'i: ' . $i . PHP_EOL;
        $key = $array[$i];
        $j = $i-1;
        print 'key: ' . $key . PHP_EOL;
        print 'j: ' . $j . PHP_EOL;

        while( $j >= 0 && $array[$j] > $key ) {
            print "\tarray[j+1](" . $array[$j] . ') > key ('.$key . ')'. PHP_EOL;
            print "\tarray[j]: " . $array[$j];
            $array[$j+1] = $array[$j];
            $j = $j - 1;
            print "\tswaped j: " . $j . PHP_EOL;
            print "\tarray: ".implode($array) . PHP_EOL . PHP_EOL;
        }

        $array[$j+1] = $key;
        print "array[j]: " . $array[$j+1] . PHP_EOL;
        print "array: " . implode($array) . PHP_EOL . PHP_EOL;
    }

    return $array;
}

print '==== START ====' . PHP_EOL;
$input = str_split('83834600164783');
insertionSort($input);
//print_r(insertionSort($input));
print '==== END ====' . PHP_EOL;
