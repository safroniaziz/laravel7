<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // public function scopeLatestFirst(){
    //     return $this->latest()->first();
    // }

    // public function scopeLatestPost(){
    //     return $this->latest()->get();
    // }

    protected $fillable = [
        'title','slug','body','category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
