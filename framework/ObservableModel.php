<?php

abstract class ObservableModel extends Model implements ObservableInterface{
    protected $observers = [];

    protected $updateddata = [];

    public function attach(ObserverInterface $o){
        $this -> observers[] = $o;
    }

    public function detach(ObserverInterface $o){
        $this -> observers = array_filter($this -> observers, function ($a) use ($o) {
                                                                    return (!($a === $o));
                                                                                    });
    }

    public function notify(){
        foreach ($this -> observers as $o){
            //print_r ($this);
            $o -> update($this);

        }
    }

    public function giveUpdate(){
        return $this ->updateddata;
    }

    public function updateTheChangedData(array $data){
        $this -> updateddata = $data;
    }


}