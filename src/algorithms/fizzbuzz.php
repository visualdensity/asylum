<?php
/**
 * FizzBuzz Test
 *
 * Came across an article that discussed the difficulty
 * of FizzBuzz test and how this would help eliminate 95%
 * of the programmer who can't program.
 *
 * This is just me being highly curious and interested
 * in finding out just how hard it is, but it seem like I've
 * found a temporary solution.
 *
 * http://c2.com/cgi/wiki?FizzBuzzTest
 */

for( $i=0; $i<101; $i++ ) {
    $fizz   = false;
    $buzz   = false;

    $output = $i;

    if($i % 3 == 0) {
        $fizz = true;
        $output = $i . ' fizz';
    } 
    
    if ($i % 5 == 0) {
        $buzz = true;
        $output = $i . ' buzz';
    } 
    
    if($fizz && $buzz) {
        $output = $i . ' fizzbuzz';
    } 

    print $output . PHP_EOL;
}
