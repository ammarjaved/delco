<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitePicture extends Model
{
    use HasFactory;

    protected $table = 'tbl_site_pictures';

    protected $fillable = [
        'substation_fl',
        'substation_fl_image1',
        'substation_fl_image2',
        'existing_switchgear',
        'existing_switchgear_image1',
        'existing_switchgear_image2',
        'switchgear_nameplate',
        'switchgear_nameplate_image1',
        'switchgear_nameplate_image2',
        'distribution_board',
        'distribution_board_image1',
        'distribution_board_image2',
        'battery_charger',
        'battery_charger_image1',
        'battery_charger_image2',
        'battery_charger_nameplate',
        'battery_charger_nameplate_image1',
        'battery_charger_nameplate_image2',
        'ceiling_tray',
        'ceiling_tray_image1',
        'ceiling_tray_image2',
        'civil_location',
        'civil_location_image1',
        'civil_location_image2',
        'substation_entrance',
        'substation_entrance_image1',
        'substation_entrance_image2',
        'cable_route',
        'cable_route_image1',
        'cable_route_image2',
        'genset_location',
        'genset_location_image1',
        'genset_location_image2',
        'feeder_tx',
        'feeder_tx_image1',
        'feeder_tx_image2',
        'trench_view',
        'trench_view_image1',
        'trench_view_image2',
        'rtu',
        'rtu_image1',
        'rtu_image2',
        'rcb',
        'rcb_image1',
        'rcb_image2',
        'efi',
        'efi_image1',
        'efi_image2',
        'other',
        'other_image1',
        'other_image2',
        'other_image3',
        'other_image4',
        'created_by',
        'updated_by',
        'site_survey_id',
        'project',
        'area'

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