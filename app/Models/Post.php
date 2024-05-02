<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    function getCreatedAt()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    

}
