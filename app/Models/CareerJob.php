<?php
/*
table: career_jobs

columns:
id, integer, autoincrement
lang, varchar 10, not null
title, varchar 100, not null
short_description, varchar 255, not null
description, text, not null
outer_url, varchar 255,
button_text, varchar 50
seo_title, varchar 255
seo_description, varchar 255
seo_keywords, varchar 255
created_at, datetime, default current timestamp
softdeletes
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CareerJob extends Model
{
    protected $table = 'career_jobs';

    protected $fillable = [
        'lang',
        'job_id',
        'title',
        'seo_url',
        'short_description',
        'description',
        'outer_url',
        'button_text',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $dates = [
        'created_at',
        'deleted_at',
    ];

    public $timestamps = false;
}
