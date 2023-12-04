<?php

namespace App\Models;

use App\Http\Controllers\PtkActivityController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PtkActivityModel extends Model
{
    protected $table = 'ptk_activities';
    protected $primaryKey = 'id';
    protected $dates = [
        'ACTIVITY_STARTDATE',
        'ACTIVITY_ENDDATE',
        'ACTIVITY_STARTTIME',
        'ACTIVITY_ENDTIME'
    ];


    protected $fillable = ['ACTIVITY_ID', 'PTK_ID', 'STD_ID', 'LEC_ID', 'D_ID', 'CDN_ID', 'HSD_ID', 'CLUB_NAME', 'ADVISOR_CLUB_NAME', 'ORGANIZER'
    , 'ACTIVITY_NAME', 'APPLICATION_TYPE', 'ACTIVITY_TYPE', 'PARTICIPANT_NUM', 'VENUE', 'ACTIVITY_STARTDATE', 'ACTIVITY_ENDDATE', 'ACTIVITY_STARTTIME'
    , 'ACTIVITY_ENDTIME', 'BUDGET'];
}
