<?php
namespace Meta\Helpers;

// Exit if accessed directly
if (!defined('ABSPATH')) exit;
/**
 * @package Meta Boilerplate Theme
 *
 * @license GNU General Public License v2 or later
 * @author Metanoia Wear
 */
class Util
{
    /**
     * @static
     * @param string $partial file name to open
     * @param string $data data to pass to file
     * @return string HTML output after data is passed in
     */
    public static function getPartial($partial, $data = null)
    {
        $data ? extract($data) : null;
        ob_start();
        include(META_ROOT . 'global-templates/meta'. DIRECTORY_SEPARATOR . $partial);
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    /**
     * Retrieves JSON data from data folder
     * as an array or object
     *
     * @static
     * @param string $file file name to locate in data folder
     * @param boolean $as_object whether to return data as array or object, defaults to array
     * @return mixed JSON data as array or object
     */
    public static function getData($file, $as_array = true)
    {
        if(file_exists(META_DATA . $file)){
            return json_decode(file_get_contents(META_DATA . $file), $as_array);
        }
        return false;
    }
}