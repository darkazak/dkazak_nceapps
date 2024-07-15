<?php
/*
*   App Core Class
*   creates url & loads core controller
*   URL Format - /controller/method/parameter
*/

class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {


        $url = $this->getUrl();


        // Look in Controllers for frist value

        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // if exists, set as controller
            $this->currentController = ucwords($url[0]);
            //unset zero index
            unset($url[0]);
        }

        // Require the Controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate Controller class
        $this->currentController = new $this->currentController;

        //Check for 2nd part of url
        if (isset($url[1])) {
            //Check if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                //unset 1 index
                unset($url[1]);
            }
        }

        // get params
        $this->params = $url ? array_values($url) : [];

        // call a callback with aray of parameters
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl() {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $full_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        //if (isset($_GET['url'])) {
            $url = rtrim($full_url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url_arr = explode('/', $url);
        //} else {
        //    $url_arr = [''];
       // }
        return $url_arr;
    }

}