<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'user_id',
        'body'
    ];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}