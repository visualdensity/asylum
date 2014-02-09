<?php

class QU
{
    private $ids;

    public function __construct(Array $data)
    {
        $this->ids = $data;
    }

    public function union($a, $b)
    {
        $this->ids[$b] = $a;
    }

    public function find($node)
    {
        $parent = $this->ids[$node];

        if($parent  == $node ) {
            return $node;
        } else {
            return static::find($parent);
        }
    }

    public function connected($a, $b)
    {
        return static::find($a) == static::find($b);
    }


    /** Util **/
    public function dump($title=false)
    {
        if($title) {
            echo $title . ":\n";
        }
        print_r($this->ids);
        echo "\n";
    }
}


$set = array( 0,1,2,3,4,5,6,7,8,9 );

$q = new QU($set);
print 'Base set: ';
$q->dump();
print "\n";

print 'Union 4,9: ';
$q->union(4,9);
$q->dump();
print "\n";

print 'Union 3,4: ';
$q->union(3,4);
$q->dump();
print "\n";

print "Parent of 9: " . $q->find(9) . "\n";
print "9,3 Connected? " . $q->connected(9,3) . "\n";
