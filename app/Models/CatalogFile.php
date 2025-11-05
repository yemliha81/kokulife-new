<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CatalogFile extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'catalog_file'; // Explicitly set table name

    protected $fillable = [
        'file_id',
        'catalog_id',
        'lang',
        'title',
        'description',
        'image',
        'file',
        'alt',
        'sort',
    ];

    protected $dates = [
        'created_at',
        'deleted_at',
    ];

    /**
     * Relationships
     */

    // set timestamps false
    public $timestamps = false;

    // A catalog file belongs to a catalog
    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }
}
