<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageShutdownAttachments extends Model
{
    use HasFactory;

    protected $table = 'image_shutdown_files';

    protected $fillable = [
        'file_name',
        'description',
        'file_path',
        'site_survey_id',
        'created_by',
        'updated_by', 
    ];
}
