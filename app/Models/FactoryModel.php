<?php

require '../../config.php';
include_once 'IndexModel.php';

class FactoryModel{
    public static function create($type){
        if(empty($type)){
            throw new \InvalidArgumentException($type . " must be a valid Model type");
        }
        else{
            $full_classname = $type . 'Model';
            echo $full_classname;

            if(class_exists('IndexModel')){
                return new $full_classname('courses');
            }
            else{
                throw new \Exception("Class type: " . $type . " not found ");
            }
        }
    }
}

//FactoryModel::create("Index");