<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $primaryKey = 'ProposalID';

    protected $fillable = [
        'OwnerID',
        'title',
        'proposal_content',
        'hosd_approval',
        'coordinator_approval',
        'dean_approval'
    ];
}
