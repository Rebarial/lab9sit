<?php

namespace model;

class car
{
    private $id;
    private $mark;
    private $model;

    function __construct()
    {
    }

    public function setId($id){
        $this->id=$id;
    }
    public function setMark($mark){
        $this->mark=$mark;
    }
    public function setModel($model){
        $this->model=$model;
    }

    public function getId(){
        return($this->id);
    }
    public function getMark(){
        return($this->mark);
    }
    public function getModel(){
        return($this->model);
    }

}