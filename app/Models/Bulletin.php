<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;

    protected $primaryKey = 'bulletin_id';

    protected $fillable = [
        'bulletin_category',
        'bulletin_title',
        'bulletin_message',
        'bulletin_url_reference',
        'bulletin_duration',
        'bulletin_expired_at',
        'posted_by'
    ];

}
