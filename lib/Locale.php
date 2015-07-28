<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 5/27/2015
 * Time: 3:29 PM
 */

namespace lib;

/**
 * Class Locale
 * @package lib
 */
class Locale
{

    /**
     * list of domains
     * @var array
     */
    private $domains = array();

    /**
     * list of locales
     * @var array
     */
    private $locales = array("en" => "en",
                            "en_us" => "en_US",
                            "fr" => "fr_FR",
                            "fr_ca" => "fr_CA",
                            "de" => "de_DE",
                            "uk" => "uk_UA",
                            "ru" => "ru_RU",
                            "it" => "it_IT",
                            "pl" => "pl"
    );

    /**
     * checking correct locales
     * @param $languages array
     * @throws \Exception
     */
    function __construct($languages = array())
    {
        if (!empty($languages)) {
            foreach($languages as $language) {
                if (!array_key_exists(trim($language), $this->locales)) {
                    throw new \Exception("{$language} is incorrect locale");
                }
            }
        }
    }

    /**
     * adding domain
     * @param $domain string
     */
    public function addDomain($domain)
    {
        $domains [] = $domain;
    }

    /**
     * getting domains
     * @return array
     */
    public function getDomains()
    {
        return $this->domains;
    }

} 