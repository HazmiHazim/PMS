<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $primaryKey = 'ReportID';

    protected $fillable = [
        'OwnerID',
        'title',
        'report_content',
        'hosd_approval',
        'coordinator_approval',
        'dean_approval'
    ];
}
