<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMaterial extends Model
{
    use HasFactory;
    protected $table = 'project_material';

    protected $fillable = ['material_id', 'quantity'];

public function material()
{
    return $this->belongsTo(material::class);
}

}
