<?php
/**
 * @author      Amit Roy <amit@softflies.com>
 * @copyright   Copyright (c), 2021 Amit Roy
 * @license     MIT public license
 */
namespace Inculcate\Console;

/**
 * Class Input.
 */
trait ConsoleStarter
{   
    
    /**
     * The list of the signatures of the application 
     * @var array
     * @return Inculcate\Console\ConsoleStarter\signatures
     */
    protected array $signatures = [
       "help"=>"help",
       "version"=>"version",
       "controller"=>"makeNormalController",
    ];
    
    /**
     * The list of the signatures of the application 
     * @var array
     * @return Inculcate\Console\ConsoleStarter\signatures
     */
    private array $signatures_descriptions = [
       "help"=>" To list all the commands of the softflies framework",
       "version"=> "",
       "controller"=>"To create the normal controller",
    ];
    /**
    * @param null
    * @method getRequestedConsole
    * @return Inculcate\Console\ConsoleStarter\getRequestedConsole
    */
    public function getRequestedArgvInput() : array {
        // we return all the cosole value of the requested signature
    	return array_key_exists("argv", is_array($_SERVER)?$_SERVER:[])?$_SERVER["argv"]:[];
    }

    /**
    * @param null
    * @method getRequestedConsole
    * @return Inculcate\Console\ConsoleStarter\getRequestedConsole
    */
    public function getRequestedConsole() : string {
        // we get requested signature from the user's terminal
        // based on the signature, we return the string 
    	$cosole = $this->getRequestedArgvInput();
    	return array_key_exists(1, is_array($cosole)?$cosole:[])?$cosole[1]:"";
    }

    /**
    * @param $value_key | int , the cosole vaule of the signature
    * @method getRequestedConsoleValue()
    * @return Inculcate\Console\ConsoleStarter\getRequestedConsoleValue 
    */
    public function getRequestedConsoleValue( int $value_key) : string {
      // we return the console value, according to the gievn value key
      // of the signatures' values
      $console = $this->getRequestedArgvInput();
      return array_key_exists($value_key, $console)? $console[$value_key] : "";

    }
    /**
    * Get all the signature of the framework
    * @param null
    * @method geSigantures
    * @return Inculcate\Console\ConsoleStarter\geSigantures
    */
    public function geSigantures() : array { 
        
        $this->signatures_descriptions["version"]=app()::VERSION;
        return $this->signatures_descriptions;
    } 
    /**
    * Print all the signature on the termianl 
    * @param null
    * @method help
    * @return Inculcate\Console\ConsoleStarter\help
    */
    public function help() : string {
    
        foreach ($this->geSigantures() as $key => $value) {
           echo $key."\t\t"."-".$value."\r\n";
        }
        exit;
    }

    /**
    * print the version of the application
    * @param null
    * @method version
    * @return Inculcate\Console\ConsoleStarter\version
    */
    public function version() : string {
       exit("Softflies version : ".app()::VERSION);
    } 


} 