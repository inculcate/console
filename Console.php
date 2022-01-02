<?php
/**
 * @author      Amit Roy <amit@softflies.com>
 * @copyright   Copyright (c), 2021 Amit Roy
 * @license     MIT public license
 */
namespace Inculcate\Console;

use Inculcate\Console\ConsoleStarter;
use Inculcate\Routing\Console\ControllerCommand;

/**
 * Class Console.
 */
trait Console
{   
    use ControllerCommand,ConsoleStarter;

    /**
     * @param null
     * @method invokeConsoleEngine
     * @return \Inculcate\Console\invokeConsoleEngine
     */
    public function invokeConsoleEngine(){

       // we make sure that the cosole has requested the correct signatures
       if (array_key_exists($this->getRequestedConsole(), $this->signatures)) {
           
           $console = $this->signatures[$this->getRequestedConsole()];
           $this->$console();

       }
       // esle we say command not found
       else{
          exit("\e[0;31;40mcommand does not exist!\e[0m\n");
       }


    }

} 