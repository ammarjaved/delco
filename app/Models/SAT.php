<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SAT extends Model
{
    use HasFactory;

    protected $table = 'tbl_sat'; // Specify the table name

    protected $fillable = [
        'image_name',
        'image_url',
        'image_type',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'site_survey_id',
        'area',
        'project'
    ];

    // Define the relationship with SiteSurvey model
    public function siteSurvey()
    {
        return $this->belongsTo(SiteSurvey::class, 'site_survey_id');
    }
}
