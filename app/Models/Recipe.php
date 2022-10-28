<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recipecategory_id',
        'unit_id',
        'name',
        'description',
        'preptime',
        'cooktime',
        'totaltime',
        'recipeyield',
        'diet',
        'cuisine',
        'price',
        'cost',
        'costpriceratio',
        'mc',
        'profit',
        'deliverycharge',
        'instock',
        'slug',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'recipecategory_id' => 'integer',
        'unit_id' => 'integer',
        'preptime' => 'integer',
        'cooktime' => 'integer',
        'totaltime' => 'integer',
        'price' => 'decimal:2',
        'cost' => 'decimal:2',
        'costpriceratio' => 'decimal:2',
        'mc' => 'decimal:2',
        'profit' => 'decimal:2',
        'deliverycharge' => 'decimal:2',
        'instock' => 'boolean',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function recipecategory()
    {
        return $this->belongsTo(Recipecategory::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
