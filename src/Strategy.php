<?php
/**
 * The strategy pattern
 *
 * In this pattern algorithms are extracted from complex classes so they can be 
 * replaced easily. For example, the strategy pattern is an option if you want to 
 * change the way pages are ranked in a search engine. Think about a search engine 
 * in several parts -- one that iterates through the pages, one that ranks each 
 * page, and another that orders the results based on the rank. In a complex example, 
 * all those parts would be in the same class. Using the strategy pattern, you 
 * take the ranking portion and put it into another class so you can change how 
 * pages are ranked without interfering with the rest of the search engine code.
 *
 * As a simpler example, the following shows a user list class that provides a method 
 * for finding a set of users based on a plug-and-play set of strategies.
 *
 * http://www.ibm.com/developerworks/library/os-php-designptrns/
 */

interface IStrategy
{
    function filter( $record );
}

class FindAfterStrategy implements IStrategy
{
    private $_name;

    public function __construct( $name ) 
    {
        $this->_name = $name;
    }

    public function filter( $record )
    {
        return strcmp( $this->_name, $record ) <= 0;
    }
}//FindAfterStrategy

class RandomStrategy implements IStrategy
{
    public function filter( $record ) 
    {
        return rand(0,1) >= 0.5;
    }
}//RandomStrategy


/**
 * Concrete Class
 */
class UserList
{
    private $_list;

    public function __construct( $names ) 
    {
        if( $names != null ) {
            foreach( $names as $name ) {
                $this->_list[] = $name;
            }
        }
    }//__construct

    public function add($name)
    {
        $this->_list[] = $name;
    }//add

    public function find( $filter ) 
    {
        $recs = array();
        foreach( $this->_list as $user ) {
            if( $filter->filter( $user ) ) {
                $recs[] = $user;
            }
        }

        return $recs;
    }//find

}//UserList


$ul = new UserList( array('Lori', 'Karl', 'Rick', 'Andrea', 'Shane', 'Daryl', 'Maggie') );

$f1 = $ul->find( new FindAfterStrategy("K") );
print_r($f1);

$f2 = $ul->find( new RandomStrategy() );
print_r($f2);
