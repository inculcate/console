<?php
/**
 * @author      Amit Roy <amit@softflies.com>
 * @copyright   Copyright (c), 2021 Amit Roy
 * @license     MIT public license
 */
namespace Inculcate\Console;

/**
 * Class Colors.
 */
trait Colors
{   
    /**
     * To store the text colors 
     * @var array
     * @return Inculcate\Routing\Console\text_colors
     */
    private $text_colors = [];
    /**
     * To store the text background colors
     * @var array
     * @return Inculcate\Routing\Console\text_bg_colors
     */
    private $text_bg_colors = [];

    /**
     * To set the shell colors 
     * @param null
     * @method startEngine
     * @return \Inculcate\Foundation\Console\__construct
     */
    public function __construct() {
        
        $this->text_colors['black'] = '0;30';
        $this->text_colors['dark_gray'] = '1;30';
        $this->text_colors['blue'] = '0;34';
        $this->text_colors['light_blue'] = '1;34';
        $this->text_colors['green'] = '0;32';
        $this->text_colors['light_green'] = '1;32';
        $this->text_colors['cyan'] = '0;36';
        $this->text_colors['light_cyan'] = '1;36';
        $this->text_colors['red'] = '0;31';
        $this->text_colors['light_red'] = '1;31';
        $this->text_colors['purple'] = '0;35';
        $this->text_colors['light_purple'] = '1;35';
        $this->text_colors['brown'] = '0;33';
        $this->text_colors['yellow'] = '1;33';
        $this->text_colors['light_gray'] = '0;37';
        $this->text_colors['white'] = '1;37';

        $this->text_bg_colors['black'] = '40';
        $this->text_bg_colors['red'] = '41';
        $this->text_bg_colors['green'] = '42';
        $this->text_bg_colors['yellow'] = '43';
        $this->text_bg_colors['blue'] = '44';
        $this->text_bg_colors['magenta'] = '45';
        $this->text_bg_colors['cyan'] = '46';
        $this->text_bg_colors['light_gray'] = '47';
    }

    /**
     * @param null
     * @method startEngine
     * @return \Inculcate\Foundation\Console\startEngine
     */
    public function ColoredString($string, $text_colors = null, $text_bg_colors = null) {
        $colored_string = "";

        // Check if given foreground color found
        if (isset($this->text_colors[$text_colors])) {
            $colored_string .= "\033[" . $this->text_colors[$text_colors] . "m";
        }
        // Check if given background color found
        if (isset($this->text_bg_colors[$text_bg_colors])) {
            $colored_string .= "\033[" . $this->text_bg_colors[$text_bg_colors] . "m";
        }

        // Add string and end coloring
        $colored_string .=  $string . "\033[0m";

        return $colored_string;
    }

} 