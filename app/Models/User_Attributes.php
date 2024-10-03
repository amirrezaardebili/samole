<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Attributes extends Model
{
    use HasFactory;
    protected $table = "user_attributes";
    protected $fillable = ['user_id', 'attributes'];
    protected $casts = ['attributes' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
