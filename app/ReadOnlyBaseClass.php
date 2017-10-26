<?php

namespace App;

class ReadOnlyBaseClass 
{
    protected $title = [];

    public function getAll(){
        return $this->title;
    }

    public function get($id){
        return $this->title[$id];
    }
}
