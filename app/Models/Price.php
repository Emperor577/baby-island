<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title', 'price'];
    protected $fillable = ['photo'];
}
