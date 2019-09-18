<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description'];
}
