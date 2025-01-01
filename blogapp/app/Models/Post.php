<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable,HasFactory;

    protected $fillable = [
        'title',
        'image',
        'slug',
        'subtitle',
        'content',
        'user_id',
        'status'
    ];


    public function user() {
        return  $this->hasOne(User::class,'id','user_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
