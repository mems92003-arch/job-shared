<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resume extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'resumes';

    protected $KeyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'filename',
        'fileUrl',
        'contactDetails',
        'education',
        'summary',
        'skills',
        'experience',
        'userId'
    ];

    protected $casts = [
        'contactDetails' => 'array',
        'skills' => 'array',
        'experience' => 'array',
        'education' => 'array',
    ];

    protected function casts(): array
    {
        return [
            'contactDetails' => 'array',
            'deleted_at' => 'datetime',
        ];
    }

    protected $dates = [
        'deleted_at' => 'datetime'
    ];

    public function user()
    {

        return $this->belongsTo(User::class, 'userId', 'id');

    }

    public function jobApplications()
    {

        return $this->hasMany(JobApplication::class, 'resumeId', 'id');

    }
}
