<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [ 'name', 'phone', 'description'];
}
