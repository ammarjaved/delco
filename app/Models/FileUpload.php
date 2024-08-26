<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;

    protected $table = 'sitesurvey_files';

    protected $fillable = [
        'file_name',
        'description',
        'file_path',
        'site_survey_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Optionally, you can define any relationships if needed
}
