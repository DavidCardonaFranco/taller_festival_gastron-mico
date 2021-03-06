<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'comment',
        'score',
        'restaurant_id'
    ];

    public function restaurant()
    {
        return $this->hasMany(Restaurant::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class ,'user_id');
    }

}
