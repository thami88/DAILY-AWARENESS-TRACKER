<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'score_id', 'work_hours', 'quality_score', 'note'];

    // protected $with = ['score'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function score()
    {
        return $this->belongsTo(Score::class);
    }
}
