<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';

    protected $fillable = ['name', 'email', 'body' , 'status'];

    protected $attributes = ['status' => 0];

    public function  article()
    {
        return $this->belongsTo(Article::class);
    }

}
