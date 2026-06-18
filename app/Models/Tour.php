<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use Sluggable;

    protected $fillable = [
        'author_id',
        'category',
        'title',
        'slug',
        'description',
        'breadcrumb_img_tour',
        'overview',
        'itinerary',
        'tags',
        'meta_keywords',
        'meta_description',
        'visibility',
        'is_notified'
    ];

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /* ---RELATIONSHIPS START --- */

    public function author(){
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function tour_category(){
        return $this->hasOne(Category::class, 'id', 'category');
    }

    public function tourPrices(){
        return $this->hasMany(TourPrice::class, 'tour_id');
    }


    public function costItems(){
        return $this->hasMany(TourCostItem::class);
    }


    /* ---RELATIONSHIPS END --- */



    public function scopeSearch($query, $term){
        $term = "%$term%";
        $query->where(function($query) use($term){
            $query->where('title', 'like', $term);
        });
    }


protected $casts = [
    'itinerary' => 'array',
];


}
