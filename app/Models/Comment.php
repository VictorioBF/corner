<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    public function user()
    {
        // UM COMENTÁRIO PERTENCE A UM USER (AUTOR): 1:1
        return $this->belongsTo(User::class, foreignKey: "user_id", ownerKey: "id");
    }
    
    public $timestamps = false;
}
