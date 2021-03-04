<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class BlogComment extends Authenticatable
{
    protected $table = 'blog_comment';
    public function getSender()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
