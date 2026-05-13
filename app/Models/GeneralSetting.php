<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
      protected $fillable = [
        'site_title',
        'site_email',
        'site_phone',
        'site_meta_keywords',
        'site_meta_description',
        'site_light_mode_logo',
        'site_dark_mode_logo',
        'site_favicon'
    ];
}
