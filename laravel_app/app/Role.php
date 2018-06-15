<?php

namespace App;

class Role extends MainModel
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
