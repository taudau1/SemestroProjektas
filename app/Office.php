<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['name', 'district', 'price', 'area', 'workers', 'heating', 'lng', 'lat'];
    
}
