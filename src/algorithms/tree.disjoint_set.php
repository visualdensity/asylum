<?php
/**
 * Disjoint sets using hashtable. This is a test of tags
 */

class Disjoint {

    private $items = array( 'a', 'b', 'c', 'd', 'e' );
    private $parent;

    public function __construct()
    {
        foreach($this->items as $item) {
            $this->parent[$item] = $item;
        }

        $this->parent['d'] = 'b';
    }

    public function find($needle)
    {
        if($this->parent[$needle] == $needle) {
            return $needle;
        } else {
            return static::find($this->parent[$needle]);
        }
    }

    public function union($set_a, $set_b)
    {
        $this->parent[$set_a] = $set_b;
    }

    public function dump()
    {
        print_r($this->parent);
    }
}

$d = new Disjoint();
$d->dump();

$d->union('a','b');
$d->dump();

print_r($d->find('a'));

$d->union('b', 'e');
$d->dump();

print 'Parent for a - ';
print_r($d->find('a'));
print "\n";
