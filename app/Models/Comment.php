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
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function scopeOwned($query, $restaurant)
    {
        return $query->where('restaurant_id', '=', $restaurant);
    }
}
