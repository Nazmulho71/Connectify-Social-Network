<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likeable';

    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type'
    ];

    public function likeable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
