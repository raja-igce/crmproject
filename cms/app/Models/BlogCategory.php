<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class BlogCategory extends Authenticatable
{
    protected $table = 'blog_category';
}
