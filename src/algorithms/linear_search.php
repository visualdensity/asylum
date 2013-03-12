<?php
// basic linear search


function search($needle, $haystack)
{
    foreach($haystack as $index => $potential) {
        if($needle == $potential) {
            return $index;
        }
    }
}

$chars = str_split('this is a very long string');
$index = search('l', $chars); 

print $index; //15
