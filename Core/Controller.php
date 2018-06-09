<?php

/*
* This is the base controller class.
* Loads models and views
*/

class Controller {
    // Loads the passed model
    public function model($model){
        require_once APP_URL . "/Models/" . $model . ".php";

        $mod = "Models\\$model";
        return new $mod;
    }

    // Loads the passed view
    public function view($view, $data = []){
        if(file_exists(APP_URL . "/Views/" . $view . ".php")){
            require_once APP_URL . "/Views/" . $view . ".php";
        } else {
            die("View does not exist.");
        }
    }
}