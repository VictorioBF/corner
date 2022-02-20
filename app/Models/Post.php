<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function subject()
    {
        // UM POST TEM UM SUBJECT: 1:1
        return $this->belongsTo(Subject::class, foreignKey: "subject_id", ownerKey: "id");
    }

    public function comments()
    {
        // UM POST TEM VÁRIOS COMMENTS: 1:N
        return $this->hasMany(Comment::class, foreignKey: "post_id", localKey: "id");
    }

    public function user()
    {
        // UM POST PERTENCE A UM USER (AUTOR): 1:1
        return $this->belongsTo(User::class, foreignKey: "user_id", ownerKey: "id");
    }

    public $timestamps = false;    
}
