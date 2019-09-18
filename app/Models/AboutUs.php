<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['text'];
    protected $fillable = ['photo'];
}
