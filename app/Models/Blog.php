<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Tetap menggunakan 'id'
    public $incrementing = false; // Matikan auto-increment
    protected $keyType = 'string'; // UUID adalah string

    protected $guarded = [];

    function comments(){
        return $this->hasMany(Comment::class, 'user_id');
    }

    function user(){
        return $this->hasMany(User::class, 'id');
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'blog_user_likes')->withTimestamps();
    }

    public function activities()
    {
        return $this->hasMany(Activities::class, 'blog_id', 'id');
    }

    function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }


        

    

}
