<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'date_of_birth',
        'gender',
        'nationality',
        'location',
        'address',
        'job_title',
        'industry',
        'bio',
        'experience',
        'education',
        'profile_picture',
        'skills',
        'languages_known',
        'company_name',
        'company_job_title',
        'start_date',
        'end_date',
        'job_description',
        'resume',
        'portfolio_link',
        'step'
    ];

    protected $casts = [
        'skills' => 'array',
        'languages_known' => 'array',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
