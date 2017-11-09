<?php

namespace Botble\Comment\Models;
use Botble\ACL\Models\User;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Botble\Comment\Models\Comment
 *
 * @mixin \Eloquent
 */
class Comment extends Eloquent
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'laravellikecomment_comments';

    protected $fillable = ['user_id', 'parent_id', 'item_id', 'comment'];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
}

