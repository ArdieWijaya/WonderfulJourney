<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'category_id', 'title', 'description', 'image',
    ];

    public function User(){
        return $this->hasOne('User::class', 'user_id');
    }

    public function Category(){
        return $this->hasOne('Category::class', 'user_id');
    }
}
