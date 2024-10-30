<?php
/**
 * Calendar Translation Wordpress plugin.
 *
 * Translates date/time functions (the_time, get_the_time, the_date and
 * get_the_date). Uses configuration.php to get your custom configuration 
 * (locale, charset, date and time formats).
 *
 * PHP version 5
 *
 * @category Wordpress_Plugin
 * @package  Date_Time
 * @author   Willian Gustavo Veiga <willian@simplemix.com.br>
 * @license  http://www.gnu.org/licenses/lgpl-3.0.txt LGPL 3.0
 * @link     http://www.simplemix.com.br/extends/wordpress/calendar-translation/
 */

/**
 * Plugin Name: Calendar Translation
 * Plugin URI: http://www.simplemix.com.br/extends/wordpress/calendar-translation/
 * Description: Replaces the_time, get_the_time, the_date and get_the_date functions to translate date and time.
 * Version: 0.2
 * Author: Willian Gustavo Veiga
 * Author URI: http://www.simplemix.com.br/
 * License: LGPL 3.0 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 */

/**
 * Calendar Translation class
 *
 * @category Wordpress_Plugin
 * @package  Date_Time
 * @author   Willian Gustavo Veiga <willian@simplemix.com.br>
 * @license  http://www.gnu.org/licenses/lgpl-3.0.txt LGPL 3.0
 * @link     http://www.simplemix.com.br/extends/wordpress/calendar-translation/
 */
class Calendar_Translation
{
    /**
     * Configuration values.
     * @var array
     */
    private $_configuration;

    /**
     * Adds actions and loads the configuration file.
     */
    public function __construct()
    {
        add_action('get_the_time', array($this, 'getTheTime'));
        add_action('the_time', array($this, 'theTime'));
        add_action('get_the_date', array($this, 'getTheDate'));
        add_action('the_date', array('theDate'));

        $this->_configuration = include_once dirname(__FILE__)
            .DIRECTORY_SEPARATOR.'configuration.php';
    }

    /**
     * Returns a localized date/time string formatted by $format argument.
     *
     * @param string $format date/time format.
     *
     * @return string localized formatted date/time.
     */
    private function _getDateTime($format)
    {
        global $post;

        $timestamp = strtotime($post->post_date);
        $locale = $this->_configuration['locale'].'.'
            .$this->_configuration['charset'];

        setlocale(LC_TIME, $locale);
        $time = strftime($format, $timestamp);
        setlocale(LC_TIME, get_locale());

        return $time;
    }

    /**
     * Replaces get_the_time function. Arguments will be ignored.
     *
     * @return string formatted date/time.
     */
    public function getTheTime()
    {
        return $this->_getDateTime($this->_configuration['time_format']);
    }

    /**
     * Replaces the_time function. Arguments will be ignored.
     *
     * @return void
     */
    public function theTime()
    {
        echo $this->getTheTime();
    }

    /**
     * Replaces get_the_date function
     *
     * @return string formatted date.
     */
    public function getTheDate()
    {
        return $this->_getDateTime($this->_configuration['date_format']);
    }

    /**
     * Replaces the_date function.
     *
     * @return void
     */
    public function theDate()
    {
        echo $this->getTheDate();
    }
}

$calendarTranslation = new Calendar_Translation();
?>
