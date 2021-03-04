<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ChatGroupMember extends Authenticatable
{
    protected $table = 'chat_group_member';
    public function getMembers()
    {
        return $this->hasMany('App\User','id','user_id');
    }
}
