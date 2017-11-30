<?php

namespace Botble\Blog\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryPost extends Eloquent
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_category';

    protected $primaryKey = 'id';

    
    public function posts() {
    	return $this->belongsTo(Post::class, 'id');
    }
    
    public function categories() {
    	return $this->belongsTo(Category::class, 'id');
    }
}
