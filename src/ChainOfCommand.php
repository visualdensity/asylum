<?php
/**
 * Chain of Command
 * 
 * Building on the loose-coupling theme, the chain-of-command pattern routes a 
 * message, command, request, or whatever you like through a set of handlers. Each 
 * handler decides for itself whether it can handle the request. If it can, the 
 * request is handled, and the process stops. You can add or remove handlers from 
 * the system without influencing other handlers. Listing 5 shows an example of this 
 * pattern.
 *
 * http://www.ibm.com/developerworks/library/os-php-designptrns/
 */

interface ICommand
{
    function onCommand($name, $args);
}

/**
 * Concrete Command handler clas
 */
class CommandChain
{
    private $commands = array();

    public function addCommand($cmd) 
    {
        $this->commands[] = $cmd;
    }

    public function runCommand($name, $args)
    {
        foreach( $this->commands as $command ) {
            if( $command->onCommand($name, $args) ) {
                return;
            }
        }
    }

}//CommandChain


/**
 * Concrete ICommands
 */

class UserCommand implements ICommand
{
    public function onCommand($name, $args) 
    {
        if($name != 'addUser') {
            return false;
        }

        echo 'Adding user ' . $args . ' to system...';
        echo "done!\n";

        return true;
    }
}

class MailCommand implements ICommand
{
    public function onCommand($name, $args) 
    {
        if($name != 'mailUser') {
            return false;
        }

        echo 'Emailing user ' . $args . ' to system...';
        echo "done!\n";

        return true;
    }
}

$cc = new CommandChain();
$cc->addCommand( new UserCommand() );
$cc->addCommand( new MailCommand() );
$cc->runCommand('mailUser', 'Wee Keat');
$cc->runCommand('addUser' , 'George');

