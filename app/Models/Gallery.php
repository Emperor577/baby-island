<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title'];
    protected $fillable = ['photo'];
}
