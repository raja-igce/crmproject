<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ChatGroup extends Authenticatable
{
    protected $table = 'chat_group';
    public function getMembers()
    {
        return $this->hasMany('App\Models\ChatGroupMember','group_id','id');
    }
    public function getMessages()
    {
        return $this->hasMany('App\Models\ChatGroupMessages','group_id','id')->orderby('id','desc');
    }
}
