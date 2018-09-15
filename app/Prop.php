<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prop extends Model
{
    protected $fillable = ['name', 'value', 'component_id'];
}
