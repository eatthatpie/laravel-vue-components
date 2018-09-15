<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name'];

    public function components()
    {
        return $this->hasMany('App\Component')->orderBy('order', 'ASC');
    }
}
