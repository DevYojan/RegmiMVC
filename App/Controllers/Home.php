<?php

class Home extends Controller{
    private $model;
    public function __construct(){
        // $this->model = $this->model('Home');
    }

    public function index(){

        // $saman = $this->model->getSaman();
        // $count = $this->model->count();

        $data = [
            'title' => 'RegmiMVC',
            'description'=> 'A simple PHP MVC framework by Yojan Regmi.'
        ];
        // $this->model('Home');
        $this->view('index', $data);
    }

    public function add(){
        echo "This is add method.";
    }
}