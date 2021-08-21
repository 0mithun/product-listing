<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Candidate\Entities\CandidateSocialLink;

class Candidate extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    public function social_link()
    {
        return $this->hasOne(CandidateSocialLink::class);
    }
}
