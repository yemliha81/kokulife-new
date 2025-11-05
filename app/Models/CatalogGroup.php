<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatalogGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'catalog_group';

    protected $fillable = [
        'catalog_group_id',
        'brand_id',
        'lang',
        'title',
        'seo_url',
        'bg_image',
        'alt',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'sort',
    ];

    protected $dates = [
        'created_at',
        'deleted_at',
    ];

    public $timestamps = false;

    public function catalogs()
    {
        return $this->hasMany(Catalog::class, 'catalog_group_id');
    }
}
