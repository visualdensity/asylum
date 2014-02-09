<?php
/**
 * Quick Union v1
 *
 * The first verion that was written immediately
 * after the demonstraion of quick union operations
 */

class QU
{
    private $ids;

    public function __construct(Array $data)
    {
        $this->ids = $data;
    }

    public function union($a, $b)
    {
        $root_b = static::find($b);
        $root_a = static::find($a);

        $this->ids[$root_a] = $root_b;
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

print 'Union 4,3: ';
$q->union(4,3);
$q->dump();
print "\n";

print 'Union 3,8: ';
$q->union(3,8);
$q->dump();
print "\n";


print 'Union 6,5: ';
$q->union(6,5);
$q->dump();
print "\n";

print 'Union 9,4: ';
$q->union(9,4);
$q->dump();
print "\n";

print 'Union 2,1: ';
$q->union(2,1);
$q->dump();
print "\n";


print "8,9 Connected? " . $q->connected(8,9) . "\n";
print "8,9 Connected? " . $q->connected(5,4) . "\n";

print 'Union 5,0: ';
$q->union(5,0);
$q->dump();

print 'Union 7,2: ';
$q->union(7,2);
$q->dump();
print "\n";

print 'Union 6,1: ';
$q->union(6,1);
$q->dump();
print "\n";

print 'Union 7,3: ';
$q->union(7,3);
$q->dump();
print "\n";


