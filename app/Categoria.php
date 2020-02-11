<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->hasMany('App\Post');
    }



}
