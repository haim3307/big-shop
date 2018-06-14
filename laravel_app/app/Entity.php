<?php

namespace App;

class Entity extends MainModel
{
 protected $table = 'entities';
 static public function getCustomTable($name){
    return self::from($name)->get();
 }
}
