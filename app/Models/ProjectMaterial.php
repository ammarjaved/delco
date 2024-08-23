<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ProjectMaterial extends Model
{
    use HasFactory;
    protected $table = 'project_material';

    protected $fillable = ['material_id', 'quantity'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });
    }

public function material()
{
    return $this->belongsTo(material::class);
}

}
