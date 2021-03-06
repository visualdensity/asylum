<?php
/**
 * Quick Union v4
 *
 * Even further improvement, we introduce the concept of 
 * path compression
 */

class QU
{
    private $ids;
    private $size;

    public function __construct(Array $data, Array $size)
    {
        $this->ids  = $data;
        $this->size = $size;
    }

    public function union($a, $b)
    {
        $i = static::find($a);
        $j = static::find($b);

        if( $i == $j ) {
            return true;
        }

        if($this->size[$i] < $this->size[$j] ) {
            $this->ids[$i] = $j;
            $this->size[$j] += $this->size[$i];
        } else {
            $this->ids[$j] = $i;
            $this->size[$i] += $this->size[$j];
        }
    }

    public function find($node)
    {
        $start_node = $node;

        while( $this->ids[$node] != $node ) {
            $node = $this->ids[$node];
        }
        $this->ids[$start_node] = $node;

        return $node;
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


$set  = array( 0,1,2,3,4,5,6,7,8,9 );
$size = array( 1,1,1,1,1,1,1,1,1,1 );

$q = new QU($set, $size);
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

