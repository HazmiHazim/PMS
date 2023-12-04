<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $primaryKey = 'candidate_id';

    protected $fillable = [
        'id',
        'petakom_approval'
    ];

    public function candidate_detail()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function votes()
    {
        return $this->hasMany(Election::class, 'candidate_id');
    }
}
