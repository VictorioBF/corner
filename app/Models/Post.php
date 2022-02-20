<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // pega a subject de um post
    public function subject()
    {
        // UM POST TEM UM SUBJECT: 1:1
        return $this->belongsTo(Subject::class, foreignKey: "subject_id", ownerKey: "id");
    }

    // pega os comentários de um post
    public function comments()
    {
        // UM POST TEM VÁRIOS COMMENTS: 1:N
        return $this->hasMany(Comment::class, foreignKey: "post_id", localKey: "id");
    }

    // pega o autor de um post
    public function user()
    {
        // UM POST PERTENCE A UM USER (AUTOR): 1:1
        return $this->belongsTo(User::class, foreignKey: "user_id", ownerKey: "id");
    }

    public $timestamps = false;    
}
