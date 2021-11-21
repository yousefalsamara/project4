<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{

    public $timestamps = false;
    protected $table="node";
    protected $fillable=['title','Message'];

}
