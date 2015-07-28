<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 3/30/2015
 * Time: 9:49 AM
 */

namespace lib;
use lib\view\ViewException as ViewException;

/**
 * Class Config
 * @package lib
 */
class Config
{
    /**
     * ini file
     * @var string
     */
    protected $iniFile;

    /**
     * parsed ini file
     * @var mixed
     */
    protected $parseIni;

    /**
     * environment for config
     * @var string
     */
    protected $environment;

    /**
     * initialize ini file and parse it
     * @param $filename string
     * @param $environment string
     * @throws ViewException
     */
    function __construct($filename, $environment = 'production')
    {
        $this->iniFile = $filename;
        $this->environment = $environment;
        $this->_parseIniFile();
    }

    /**
     * getting option by key and environment
     * @param $key string
     * @return mixed
     */
    public function __get ($key) {
        return (isset($this->parseIni[$this->environment][$key])) ? $this->parseIni[$this->environment][$key] : null;
    }

    /**
     * setting option by key
     * @param $key string
     * @param $value string
     */
    public function __set($key,$value) {
        $this->parseIni[$key] = $value;
    }

    /**
     * parse ini file
     * @throws Exception
     * @throws ViewException
     */
    private function _parseIniFile()
    {
        if (!file_exists($this->iniFile)) {
            throw new ViewException("File {$this->iniFile} is not found", 404);
        }
        $this->parseIni = parse_ini_file($this->iniFile, true);
        foreach ($this->parseIni as $section => $contents) {
            // process sections contents
            $this->_processSection($section, $contents);
        }
    }

    /**
     * Process contents of the specified section
     * @param $section string
     * @param $contents array
     * @throws Exception
     */
    private function _processSection($section, array $contents)
    {
        // the section does not extend another section
        if (stripos($section, ':') === false) {
            $this->parseIni[$section] = $this->__processSectionContents($contents);
            // section extends another section
            return false;
        }
        // extract section names
        list($target, $source) = explode(':', $section);
        $target = trim($target);
        $source = trim($source);

        // check if the extended section exists
        if (!isset($this->parseIni[$source])) {
            throw new Exception('Unable to extend section ' . $source . ', section not found');
        }

        // process section contents
        $contents = $this->__processSectionContents($contents);

        // merge the new section with the existing section values
        $this->parseIni[$target] = $this->_arrayMergeRecursive($this->parseIni[$source], $contents);
    }


    /**
     * Process contents of a section
     * @param $contents array
     * @return array
     */
    private function __processSectionContents($contents)
    {
        $result = array();
        foreach ($contents as $path => $value) {
            // convert all a.b.c.d to multi-dimensional arrays
            $process = $this->_processContentEntry($path, $value);

            // merge the current line with all previous ones
            $result = $this->_arrayMergeRecursive($result, $process);
        }
        return $result;
    }

    /**
     * Convert a.b.c.d paths to multi-dimensional arrays
     * @param $path string
     * @param $value string
     * @return array
     */
    private function _processContentEntry($path, $value)
    {
        $pos = strpos($path, '.');

        if ($pos === false) {
            return array($path => $value);
        }

        $key = substr($path, 0, $pos);
        $path = substr($path, $pos + 1);

        $result = array($key => $this->_processContentEntry($path, $value));

        return $result;
    }

    /**
     * Merge two arrays recursively overwriting the keys in the first array
     * if such key already exists
     * @param $a array
     * @param $b array
     * @return array
     */
    private function _arrayMergeRecursive($a, $b)
    {
        // merge arrays if both variables are arrays
        if (is_array($a) && is_array($b)) {
            // loop through each right array's entry and merge it into $a
            foreach ($b as $key => $value) {
                if (isset($a[$key])) {
                    $a[$key] = $this->_arrayMergeRecursive($a[$key], $value);
                } else {
                    if($key === 0) {
                        $a = array(0 => $this->_arrayMergeRecursive($a, $value));
                    } else {
                        $a[$key] = $value;
                    }
                }
            }
        } else {
            // one of values is not an array
            $a = $b;
        }

        return $a;
    }
}