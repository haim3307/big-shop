<?php

namespace App;

class Contact extends MainModel
{
    protected $fillable = ['name','email','comment','phone'];
    protected $table = 'contact_form';
}
