<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'category_id'
    ];

    /**
     * Devolver relación muchos a uno
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // protected $table = 'posts';

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }


    /**
     * Devolver relación muchos a uno
     */
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
