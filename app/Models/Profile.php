<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The name of table profiles
     *
     */
    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'image',
        'cover',
        'redbubble',
        'teepublic'
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
