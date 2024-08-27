<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreCabling extends Model
{
    use HasFactory;

    protected $table = 'tbl_precabl_piw';

    protected $fillable = ['kontraktor_piw', 'kontraktor_rtu', 'pe_name', 'tarikh', 'lokasi_efi', 'lokasi_rcb', 'connection_rcb', 'lokasi_battary', 'plate_battary', 'lokasi_rtu', 'connection_rtu', 'plate_rtu', 'laluan_cable_piw', 'laluan_cable', 'site_survey_id', 'created_by', 'updated_by'];
    public function SiteSurvey()
    {
        return $this->belongsTo(SiteSurvey::class, 'site_survey_id');
    }
}
