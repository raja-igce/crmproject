<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class BlogStory extends Authenticatable
{
    protected $table = 'blog_story';
}
