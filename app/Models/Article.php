<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    // protected $table = 'posts';

    protected $fillable = ['title', 'content'];

    // auther_id
    public function auther(){
        // IDno
        // auther_id
        return $this->belongsTo('App\Models\User', 'user_id'); // App\Models\User::class
    }

    protected static function booted()
    {
        static::created(function ($user) {
            
        });

        // static::deleting(function ($user) {
            
        // });
    }

    // public function getRouteKeyName()
    // {
    //     return 'title';
    // }
}
