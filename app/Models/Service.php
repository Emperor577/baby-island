<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['text', 'title'];
    protected $fillable = ['photo'];
}
