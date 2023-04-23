<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $primaryKey = ['name','userid'];
    public $incrementing = false;

    protected $fillable = [
        'name',
        'value',
        'userid'
    ];

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('name', '=', $this->getAttribute('name'))
            ->where('userid', '=', $this->getAttribute('userid'));
        return $query;
    }
}
