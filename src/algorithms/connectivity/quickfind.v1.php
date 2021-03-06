<?php
/**
 * Quick find
 */


class UF
{
    private $ids = array();

    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function find($a)
    {
        $id = $this->ids[$a];
        $found = array();

        foreach($this->ids as $i=>$v) {
            if($v == $id) {
                $found[] = $i;
            }
        }

        return $found;
    }

    public function getId($a)
    {
        return $this->ids[$a];
    }

    public function union($a, $b)
    {
        if( static::connected($a, $b) ) {
            return true;
        }

        $target = static::getId($b);
        $set    = static::find($a);

        foreach($set as $i) {
            $this->ids[$i] = $target;
        }
    }

    public function connected($a, $b) 
    {
        return ($this->ids[$a] == $this->ids[$b]);
    }


    /**** Util ****/

    public function dump()
    {
        print_r($this->ids);
    }
}

$sets = array(
    1 => 1,
    2 => 2,
    3 => 3,
    4 => 4,
    5 => 5,
    6 => 6,
    7 => 7,
    8 => 8,
    9 => 9,
);

$uf = new UF($sets);
$uf->dump();

$uf->union(4,9);
$uf->union(4,3);
$uf->dump();

print '4,3: ' . $uf->connected(4,3) . "\n";
print '4,1: ' . $uf->connected(4,1) . "\n";
print '9,3: ' . $uf->connected(9,3) . "\n";
