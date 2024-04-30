<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    function getCreatedAt()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
