<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreCablingImages extends Model
{
    use HasFactory;
    protected $table = 'tbl_precabl_images';

    protected $fillable = [
        'image_name',
        'image_url',
        'file_path',
        'site_survey_id',
        'created_by',
        'updated_by',
        'project',
        'area',
        'image_desc',
    ];
}
