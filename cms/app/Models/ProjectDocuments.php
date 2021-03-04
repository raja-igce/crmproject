<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ProjectDocuments extends Authenticatable
{
    protected $table = 'project_file';
}
