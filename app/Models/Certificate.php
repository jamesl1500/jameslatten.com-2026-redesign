<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'name',
        'issuer',
        'credential_id',
        'credential_url',
        'issue_date',
        'expiry_date',
        'description',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'expiry_date' => 'date',
    ];
}
