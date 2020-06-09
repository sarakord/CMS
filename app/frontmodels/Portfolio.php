<?php

namespace App\frontmodels;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';

    protected $fillable = ['name', 'description', 'image', 'link', 'tag'];
}
