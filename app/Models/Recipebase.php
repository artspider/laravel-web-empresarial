<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipebase extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recipe_id',
        'qty',
        'qtyleft',
        'waste',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'recipe_id' => 'integer',
        'qty' => 'decimal:2',
        'qtyleft' => 'decimal:2',
        'waste' => 'integer',
        'status' => 'integer',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
