<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['id','name'];


    public function stories()
    {
        return $this->belongsToMany(Story::class,'story_tag');
    }
}
