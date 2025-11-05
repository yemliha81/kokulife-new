<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    protected $table = 'career';

    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'lang',
        'title',
        'upper_title',
        'title_1',
        'description',
        'image',
        'alt',
        'button_text',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];


}
