<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ProjectMaterial extends Model
{
    use HasFactory;
    protected $table = 'project_material';

    protected $fillable = ['quantity','material_id','site_survey_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::user()->name;
        });
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

}
