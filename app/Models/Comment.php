<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('replies');
    }

    // Hitung jumlah total balasan (termasuk nested)
    public function getTotalRepliesCountAttribute()
    {
        return $this->replies->sum(function ($reply) {
            return 1 + $reply->total_replies_count; // 1 untuk reply saat ini + balasan dari reply
        });
    }
}
