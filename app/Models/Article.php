<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    use HasFactory;

    /**
     * The name of table articles
     *
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'image',
        'description',
        'collection',
        'likes'
    ];

    /**
     * Eloquent Model Relantionships
     * The ralationship belongsTo
     * Articles belongs to User
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
