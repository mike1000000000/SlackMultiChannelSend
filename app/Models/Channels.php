<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channels extends Model
{
    use HasFactory;

    protected $primaryKey = 'slack_channelid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'slack_channelid',
        'userid',
        'name',
        'description',
        'tokens',
        'settings',
    ];

    protected $attributes = [
        'tokens' => '{}'
    ];

    public function getRouteKeyName()
    {
        return 'slack_channelid';
    }
}
