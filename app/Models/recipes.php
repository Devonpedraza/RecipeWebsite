<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipes extends Model
{
    protected $fillable = ['Title', 'Description', 'Diffuculty', 'Cook_Time', 'Prep_Time', 'Image', 'Ingredients', 'Instructions'];
    /** @use HasFactory<\Database\Factories\RecipesFactory> */
    use HasFactory;

    public function favoritedBy()
    {
        return $this->belongsToMany(\App\Models\User::class, 'favorite_recipes', 'recipe_id', 'user_id');
    }
}
