<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public function getRouteKeyName()
    {
        return 'slug';
    }

    //Add relationship to posts
    public function posts()
    {	/* Si no usas el id, tienes que pasarle el dato de como nombraste tu foreignKey y el dato del campo al que
    	hace referencia respectivamente, en ambos modelos*/
        return $this->hasMany(Post::class, 'category_slug', 'slug');
    }
}
