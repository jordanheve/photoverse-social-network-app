<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model 
{   
  
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png', 'image/gif']);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

    public function comments()
    {   
        return $this->hasMany(Comment::class);
    }

    public function likes() 
    {
        return $this->hasMany(Like::class);
    }

    public function checkLike()
    {
        return $this->likes->contains('user_id', auth()->id());
    }
}
