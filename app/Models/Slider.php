<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['text', 'title'];
    protected $fillable = ['photo'];
}
