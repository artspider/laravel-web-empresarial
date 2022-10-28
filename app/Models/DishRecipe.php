<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishRecipe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dish_id',
        'recipe_id',
        'qty',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dish_id' => 'integer',
        'recipe_id' => 'integer',
        'qty' => 'decimal:2',
    ];

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
