<?php
class Guarantee {
    public function __construct() 
    {
        //Here you can initialise any resources
        //that needs to be managed automatically
        print "Constructed!\n";
    }

    public function __destruct()
    {
        //Here you perform your clean up that
        //is required. This method will execute
        //even if exceptions are thrown in its
        //caller.
        print "Destructed!\n";
    }
}
