<?php

/*
* Main Router class which does url routing to their respective controllers and actions
*/

class Router{
    protected $currentController = 'Home';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->getUrl();

        /*
        * If the url is not empty the first element in the array is controller
        * The second element is the method {default is index}
        */

        if(!empty($url)){
            if(file_exists(dirname(__DIR__) . "/App/Controllers/" . ucwords($url[0] . ".php"))){
                $this->currentController = ucwords($url[0]);
            }
        }
        require_once dirname(__DIR__) . "/App/Controllers/" . $this->currentController . ".php";

        $controller = $this->currentController;

        $this->currentController = new $controller;
        unset($url[0]);

        // Check to see if method exists in the controller {default is index}
        if(isset($url[1])){
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // If there are any params in the url get them
        $this->params = $url ? array_values($url) : [];

        // Now pass the params in to the respective method as callback
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = trim($_GET['url']);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}