<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/* Enables mass assignment for all the model Service */
	protected $guarded = [];
    //Add relationship to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Add relationship to category
    public function category()
    {
        /* Si no usas el id, tienes que pasarle el dato de como nombraste tu foreignKey y el dato del campo al que hace referencia respectivamente*/
        return $this->belongsTo(Category::class, 'category_slug', 'slug');
    }
}
