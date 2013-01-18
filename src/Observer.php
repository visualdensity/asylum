<?php
/**
 * The observer pattern
 *
 * The observer pattern gives you another way to avoid tight coupling between 
 * components. This pattern is simple: One object makes itself observable by adding 
 * a method that allows another object, the observer, to register itself. When the 
 * observable object changes, it sends a message to the registered observers. What 
 * those observers do with that information isn't relevant or important to the 
 * observable object. The result is a way for objects to talk with each other 
 * without necessarily understanding why.
 *
 * A simple example is a list of users in a system. The code in Listing 4 shows a 
 * user list that sends out a message when users are added. This list is watched by 
 * a logging observer that puts out a message when a user is added.
 *
 * http://www.ibm.com/developerworks/library/os-php-designptrns/
 */

interface IObserver
{
    function onChanged($sender, $args);
}

interface IObservable
{
    function addObserver($observer);
}

class UserList implements IObservable
{
    private $observers = array();

    public function addCustomer($name)
    {
        foreach( $this->observers as $observer ) {
            $observer->onChanged($this, $name);
        }
    }

    public function addObserver($observer)
    {
        $this->observers[] = $observer;
    }
}

class UserListLogger implements IObserver
{
    public function onChanged($sender, $args)
    {
        echo 'New user added: ' . $args;
        echo "\n";
    }
}

class DecorateUser implements IObserver
{
    public function onChanged($sender, $args)
    {
        echo 'Decorated: Mr ' . $args . ', Bsc, MBA';
        echo "\n";
    }
}

$ul = new UserList();
$ul->addObserver( new UserListLogger() );
$ul->addObserver( new DecorateUser() );

$ul->addCustomer('Sheldon Cooper');
$ul->addCustomer('Rick Grimes');
