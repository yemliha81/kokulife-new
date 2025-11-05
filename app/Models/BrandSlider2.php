<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Brand;

class BrandSlider2 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'brand_slider_2';

    protected $fillable = [
        'slider_id',
        'brand_id',
        'lang',
        'title',
        'title_2',
        'description',
        'image',
        'alt',
        'sort'
    ];

    public $timestamps = false;

    protected $dates = [
        'created_at',
        'deleted_at',
    ];

    // Define relationship with Club model
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }

}
