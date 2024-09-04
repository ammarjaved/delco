<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSurvey extends Model
{
    use HasFactory;

    protected $table = 'tbl_site_survey';
    
    protected $fillable = [
        'nama_pe', 'kawasan', 'fl', 'jenis', 'peparit', 'jenis_kompaun',
        'jenis_perkakasuis', 'konfigurasi', 'jenama_alatsuis', 'jenis_model',
        'tahun_pembinaan', 'siri_alatsuis', 'suis_no1', 'suis_label1',
        'kabel_jenis1', 'kabel_saiz1', 'suis_no2', 'suis_label2', 'kabel_jenis2',
        'kabel_saiz2', 'suis_no3', 'suis_label3', 'kabel_jenis3', 'kabel_saiz3',
        'suis_no4', 'suis_label4', 'kabel_jenis4', 'kabel_saiz4', 'suis_no5',
        'suis_label5', 'kabel_jenis5', 'kabel_saiz5', 'fius_saiz',
        'ct_saiz_protection', 'ct_saiz_metering', 'scada_status', 'bekalan_lv',
        'bacaan_beban', 'genset', 'jenis_lvdb', 'keperluan_khas_kerja', 'susun',
        'geom', 'created_by', 'updated_by','project','area'
    ];

    protected $casts = [
        'tahun_pembinaan' => 'date',
    ];

    public function fileUploads()
    {
        return $this->hasMany(FileUpload::class);
    }



    public function PreCabling() {
        return $this->hasOne(PreCabling::class, 'site_survey_id');
    }

    public function PreCablingShutDown() {
        return $this->hasOne(PreCablingShutDown::class, 'site_survey_id');
    }

    public function ToolBoxTalk() {
        return $this->hasOne(ToolBoxTalk::class, 'site_survey_id')->where('skop_kerja', 'CABLING');
    }

    public function ToolBoxTalkOutage() {
        return $this->hasOne(ToolBoxTalk::class, 'site_survey_id')->where('skop_kerja', 'OUTAGE');
    }


    public function ToolBoxTalkSAT() {
        return $this->hasOne(ToolBoxTalk::class, 'site_survey_id')->where('skop_kerja', 'SAT');
    }



    public function imageShutdown()
    {
        return $this->hasMany(ImageShutdown::class, 'site_survey_id');
    }

    public function SATs()
{
    return $this->hasMany(SAT::class, 'site_survey_id');
}


//PreCablingStatus', 'ShutDownStatus','SATStatus


public function PreCablingStatus()
{

    return $this->hasOne(PreCabling::class, 'site_survey_id');


}


public function ShutDownStatus()
{
    return $this->hasMany(ImageShutdown::class, 'site_survey_id');
}


public function SATStatus()
{
    return $this->hasMany(SAT::class, 'site_survey_id');

}



}
