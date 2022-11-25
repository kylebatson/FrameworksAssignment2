<?php

abstract class AbstractController{

    //The view object the controller will call on to display data on the registered HTML page
    protected $view = null;

    //The model object the controller will call on to manipulate data in the database
    protected $model = null;

    //The method that has to be implemented in order to create the model for the controller
    abstract protected function makeModel(): Model;

    //The method that has to be implented for each controller in order for it to have a view
    abstract protected function makeView(): View;

    //The method used to execute the controller
    abstract public function start();
}