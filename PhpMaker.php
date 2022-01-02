<?php
/**
 * @author      Amit Roy <amit@softflies.com>
 * @copyright   Copyright (c), 2021 Amit Roy
 * @license     MIT public license
 */
namespace Inculcate\Console;

/**
 * Class PhpMaker.
 */
class PhpMaker
{   
    
    /**
     * To set the contents of the file
     * @var array
     * @return Inculcate\Console\PhpMaker\contents
     */
    private static array $contents = [];
    /**
     * To set the scripts of the file
     * @var array
     * @return Inculcate\Console\PhpMaker\scripts
     */
    private static array $scripts = []; 

    /**
     * To set the path of the file
     * @var string
     * @return Inculcate\Console\PhpMaker\path
     */
    private static string $path;
    /**
    * To set the scripts of the file has to be created
    * @param string | $scripts
    * @method setScripts
    * @return \Inculcate\Foundation\Console\PhpMaker\setScripts
    */
    public static function setScripts( array $scripts) : object {
       
       self::$scripts=$scripts;
       return new static;

    }

    /**
    * To set the path of the scripts of the file has to be created
    * @param string | $path
    * @method setScriptsPath
    * @return \Inculcate\Foundation\Console\PhpMaker\setScriptsPath
    */
    public static function setScriptsPath( string $path) : object {
       
       self::$path=$path;
       return new static;

    }
    
    /**
    * To the scripts of the file
    * @param null
    * @method getFileReady
    * @return \Inculcate\Foundation\Console\PhpMaker\getFileReady
    */
    private static function getFileReady() : bool {
        
        if (!file_exists(self::$path)) {
            
            foreach (self::$scripts as $value) {
                file_put_contents(self::$path, $value.PHP_EOL, FILE_APPEND);
            }
            return TRUE;
        }
        return FALSE;
    }

    /**
    * We make file
    * @param null
    * @method MakeFile
    * @return \Inculcate\Foundation\Console\PhpMaker\MakeFile
    */
    public static function MakeFile() : bool {

        return self::getFileReady();

    }
    /**
    * @param string $text | the original text
    * @param string $replace | the text has to be kept
    * @method textReplace
    * @return \Inculcate\Foundation\Console\PhpMaker\textReplace
    */
    public static function textReplace( string $text, string $replace) : object {

        foreach (self::$contents as $key => $value) {
            if (strpos($value, $text) !== false) {
                self::$contents[$key]=str_replace($text,$replace,$value);
            }
        }

        return new static;
    }
    /**
    * We content from the file file
    * @param null
    * @method get
    * @return \Inculcate\Foundation\Console\PhpMaker\get
    */
    public static function get() : array {
        
        return self::$contents;

    }

    /**
    * We content from the file file
    * @param string | $path
    * @method setFileContent
    * @return \Inculcate\Foundation\Console\PhpMaker\setFileContent
    */
    public static function setFileContent(string $path,$option=NULL) : object {
        
        if (file_exists($path)) {
            
            if ($option!==NULL) {
                self::$contents = file( $path, $option );
            }
            else{
                self::$contents = file( $path );
            }
        }

        return new static;

    }

} 