<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'quality_score', 'description'];

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
