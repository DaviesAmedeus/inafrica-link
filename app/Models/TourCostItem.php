<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourCostItem extends Model
{
    protected$fillable = ['tour_id','type','item'];
}
