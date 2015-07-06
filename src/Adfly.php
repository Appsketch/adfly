<?php
/**
 * Created by PhpStorm.
 * User: maartenpaauw
 * Date: 06-07-15
 * Time: 18:01
 */

namespace M44rt3np44uw\Adfly;

use Illuminate\Support\Facades\Config;

/**
 * Class Adfly
 *
 * @package M44rt3np44uw\Adfly
 */
class Adfly {

    /**
     * Base url.
     */
    const BASE_URL = "http://api.adf.ly/api.php";

    /**
     * @var
     */
    protected $options;

    /**
     * @var
     */
    protected $url;

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @param $options
     */
    public function mergeOptions($options)
    {
        if(isset($options) && !empty($options))
        {
            $this->setOptions(array_merge($this->getOptions(), $options));
        }
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     *
     */
    public function __construct()
    {
        $this->initOptions();
    }

    /**
     * @param       $url
     * @param array $options
     */
    public function create($url, $options = array())
    {
        // Options.
        $options = array_merge($options, ['url' => $url]);

        // Push options.
        $this->mergeOptions($options);

        dd($this->getAdflyUrl());
    }

    /**
     * Initialize the options array.
     */
    private function initOptions()
    {
        // Get the config options.
        $config_options = Config::get('adfly');

        // Push the config options to the options array.
        $this->setOptions($config_options);
    }

    /**
     * @return string
     */
    private function getApiUrl()
    {
        // Query string
        $query_string = http_build_query($this->getOptions());

        // API url
        $api_url = Adfly::BASE_URL . '?' . $query_string;

        // Return api url.
        return $api_url;
    }

    /**
     * @return string
     */
    private function getAdflyUrl()
    {
       return file_get_contents($this->getApiUrl());
    }
}