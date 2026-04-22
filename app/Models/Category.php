<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;

    protected $fillable = [
        'name',
        'breadcrumb-img',
        'category_desc',
        'slug',
        'parent',
        'ordering'
    ];



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    // Relationships
     public function parent_category()
    {
        // return $this->hasOne(ParentCategory::class, 'id', 'parent');
        return $this->belongsTo(ParentCategory::class, 'parent', 'id');
    }

    public function tours(){
        return $this->hasMany(Tour::class, 'category');
    }

}
