<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'price_name', 'price_count'];
}
