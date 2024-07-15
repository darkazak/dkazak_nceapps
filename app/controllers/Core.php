<?php
/*
*   App Core Class
*   creates url & loads core controller
*   URL Format - /controller/method/parameter
*/

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url_array = $this->getUrl();
        

        // Look in Controllers for frist value

        if (file_exists('../app/controllers/' . ucwords($url_array[0]) . '.php')) {
            // if exists, set as controller
            $this->currentController = ucwords($url_array[0]);
            //unset zero index
            unset($url_array[0]);
        }

        // Require the Controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate Controller class
        $this->currentController = new $this->currentController;

        //Check for 2nd part of url
        if (isset($url_array[1])) {
            //Check if method exists in controller
            if (method_exists($this->currentController, $url_array[1])) {
                $this->currentMethod = $url_array[1];
                //unset 1 index
                unset($url_array[1]);
            }
        }

        // get params
        $this->params = $url_array ? array_values($url_array) : [];

        // call a callback with aray of parameters
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


}