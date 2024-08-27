<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth; // To get the authenticated user ID

class ImageShutdown extends Model
{
    use HasFactory;

    protected $table = 'tbl_shutdown_images';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image_name',
        'image_url',
        'image_type',
        'created_by',
        'updated_by',
        'site_survey_id',
    ];

    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::id(); // Set created_by to the ID of the authenticated user
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::id(); // Set updated_by to the ID of the authenticated user
        });
    }

    public function siteSurvey()
    {
        return $this->belongsTo(SiteSurvey::class, 'site_survey_id');
    }
}
