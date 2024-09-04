<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SATAttachments extends Model
{
    use HasFactory;

    protected $table = 'sat_files';

    protected $fillable = [
        'file_name',
        'description',
        'file_path',
        'site_survey_id',
        'created_by',
        'updated_by', 
    ];
}
