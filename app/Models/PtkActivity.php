<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PtkActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'CLUB_NAME',
        'ADVISOR_CLUB_NAME',
        'ACTIVITY_NAME',
        'ACTIVITY_TYPE',
        'PARTICIPANT_NUM',
        'VENUE',
        'ACTIVITY_STARTDATE',
        'ACTIVITY_ENDDATE',
        'ACTIVITY_STARTTIME',
        'ACTIVITY_ENDTIME',
        'BUDGET',
    ];
}
