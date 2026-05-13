<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPrice extends Model
{
    protected$fillable = ['tour_id','people','price'];

     public function tour(){
        return $this->belongsTo(Tour::class);
    }
}
