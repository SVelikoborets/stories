<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['title', 'content', 'status'];


    public function tags()
    {
        return $this->belongsToMany(Tag::class,'story_tag');
    }
}
