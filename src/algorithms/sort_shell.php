<?php
/**
 * Shell sort
 *
 * Ripped from somewhere - forgotten where exactly. Needs to re-examine this 
 * sometime in the near future
 */

function shellSort($arr)
{
    $inc = round(count($arr)/2);
    while($inc > 0)
    {
        for($i = $inc; $i < count($arr);$i++){
            $temp = $arr[$i];
            $j = $i;
            while($j >= $inc && $arr[$j-$inc] > $temp)
            {
                $arr[$j] = $arr[$j - $inc];
                $j -= $inc;
            }
            $arr[$j] = $temp;
        }
        $inc = round($inc/2.2);
    }
    return $arr;
}

print_r( shellSort(str_split('8847948282771')) );
