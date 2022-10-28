<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recipe_id',
        'calories',
        'carbohydrate',
        'cholesterol',
        'fat',
        'transfat',
        'saturatedfat',
        'unsaturatedfat',
        'fiber',
        'sodium',
        'sugar',
        'servingsize',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'recipe_id' => 'integer',
        'calories' => 'integer',
        'carbohydrate' => 'integer',
        'cholesterol' => 'integer',
        'fat' => 'integer',
        'transfat' => 'integer',
        'saturatedfat' => 'integer',
        'unsaturatedfat' => 'integer',
        'fiber' => 'integer',
        'sodium' => 'integer',
        'sugar' => 'integer',
        'servingsize' => 'integer',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
