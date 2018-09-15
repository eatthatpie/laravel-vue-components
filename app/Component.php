<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = ['name', 'codename', 'page_id'];

    public function props()
    {
        return $this->hasMany('App\Prop');
    }
}
