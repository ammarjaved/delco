<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreCablingShutDown extends Model
{
    use HasFactory;

    protected $table = 'tbl_precabl_shutdown';

    protected $fillable = ['substation_name', 'visit_date', 'state', 'rcb_telah', 'rcb_setiap', 'rcb_modifikasi', 'rcb_ujian', 'rcb_pemasangan', 'rtu_rcb', 'rtu_setiap', 'rtu_ujian', 'rtu_pemasangan', 'cable_laluan', 'cable_kabel', 'cable_pemasangan', 'cable_kawasan', 'created_by', 'updated_by' ,'site_survey_id'];

    public function SiteSurvey()
    {
        return $this->belongsTo(SiteSurvey::class, 'site_survey_id');
    }
}
