<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    // pega os posts de um subject
    public function posts()
    {
        return $this->hasMany(Post::class, foreignKey: "user_id", localKey: "id");
    }

    public $timestamps = false;
}
