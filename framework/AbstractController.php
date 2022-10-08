<?php

abstract class AbstractController{

    //The view object the controller will call on to display data on the registered HTML page
    protected $view = null;

    //The model object the controller will call on to manipulate data in the database
    protected $model = null;

    //The method that has to be implemented in order to create the model for the controller
    public function setModel(Model $m){
        $this -> model = $m;
    }

    //The method that has to be implented for each controller in order for it to have a view
    public function setView(View $v){
        $this  -> view = $v;
    }

    //public abstract factorymedel create

    //The method used to execute the controller
    abstract public function run();

    //functions for testing purposes
    public function getModel(){
        return $this -> model;
    }

    public function getView(){
        return $this -> view;
    }
}