<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'catalog'; // Explicitly set table name

    protected $fillable = [
        'catalog_group_id',
        'catalog_id',
        'lang',
        'title',
        'sort',
    ];

    protected $dates = [
        'created_at',
        'deleted_at',
    ];

    //timestamps false
    public $timestamps = false;

    /**
     * Relationships
     */

    // A catalog belongs to a catalog group
    public function group()
    {
        return $this->belongsTo(CatalogGroup::class, 'catalog_group_id');
    }

    // A catalog can have many files
    public function files()
    {
        return $this->hasMany(CatalogFile::class, 'catalog_id');
    }
}
