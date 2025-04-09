<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ← WAJIB


class Category extends Model
{
    use HasFactory; // ← INI YANG BELUM ADA

    protected $fillable = [
        'name',
        'user_id',
    ];

    // Relasi ke Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
