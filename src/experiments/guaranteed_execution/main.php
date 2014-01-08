<?php
include 'Guarantee.php';

function testRun($exception=false)
{
    $lock = new Guarantee();

    // Initialising the Guarantee object automatically
    // creates resources that needs to be exception safe
    // A typical one would be a lock - which needs to be
    // guaranteed release despite exceptions being thrown
    if($exception) throw new \Exception('Excepted');
    sleep(1);
}

echo "No Exception:\n";
testRun();

echo "With Exception:\n";
testRun(true);
