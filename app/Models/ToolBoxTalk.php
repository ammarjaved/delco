<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolBoxTalk extends Model
{
    use HasFactory;
    protected $table = 'tbl_toolbox_talk';

    protected $fillable = [
        'lokasi',
        'pe_nama',
        'tarikh',
        'cfs',
        'skop_kerja',
        'ppd_safety_helment',
        'ppd_safety_vest',
        'ppd_safety_shoes',
        'ppd_safety',
        'equipment_condition',
        'equipment_kit_condition',
        'vehicle_fire_extinguisher',
        'vehicle_condition',
        'traffic_safety_kon',
        'traffic_sign_board',
        'traffic_chargeman',
        'team_ap_tnp',
        'team_cp_tnb',
        'niosh_staff_ntsp',
        'niosh_special_permit',
        'picture_during_toolbox',
        'toolbox_image1',
        'toolbox_image2',
        'created_by',
        'updated_by',
        'site_survey_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function siteSurvey()
    {
        return $this->belongsTo(SiteSurvey::class, 'site_survey_id');
    }


}
