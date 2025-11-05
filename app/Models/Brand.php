<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BrandSlider1;
use App\Models\BrandSlider2;
use App\Models\BrandGallery;

class Brand extends Model
{
    protected $table = 'brand';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'brand_id',
        'sector_ids',
        'lang',
        'up_title',
        'title',
        'url',
        'title_1',
        'description',
        'bg_image',
        'image',
        'banner_image',
        'alt',
        'seo_url',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'sort',
    ];

    // If you want to automatically cast created_at as datetime
    protected $dates = [
        'created_at',
        'deleted_at',
    ];

    // Define relationship with BrandSlider1 model
    public function slider1()
    {
        // where lang = current locale
        return $this->hasMany(BrandSlider1::class, 'brand_id', 'brand_id')->where('lang', app()->getLocale());
    }

    // Define relationship with BrandSlider2 model
    public function slider2()
    {
        // where lang = current locale
        return $this->hasMany(BrandSlider2::class, 'brand_id', 'brand_id')->where('lang', app()->getLocale());
    }

    // Define relationship with BrandGallery model
    public function gallery()
    {
        // Get gallery items with same brand_id and lang
        return $this->hasMany(BrandGallery::class, 'brand_id', 'brand_id')->where('lang', app()->getLocale());
        //return $this->hasMany(BrandGallery::class, 'brand_id', 'lang');
    }

}
