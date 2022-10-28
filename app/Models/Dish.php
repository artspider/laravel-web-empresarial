<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'servtime',
        'yield',
        'cuisine',
        'price',
        'cost',
        'costpriceratio',
        'mc',
        'profit',
        'deliverycharge',
        'instock',
        'rating',
        'slug',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'servtime' => 'integer',
        'yield' => 'integer',
        'price' => 'decimal:2',
        'cost' => 'decimal:2',
        'costpriceratio' => 'decimal:2',
        'mc' => 'decimal:2',
        'profit' => 'decimal:2',
        'deliverycharge' => 'decimal:2',
        'instock' => 'boolean',
        'rating' => 'integer',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
