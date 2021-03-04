<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ChatGroupMessages extends Authenticatable
{
    protected $table = 'chat_group_messages';
    public function getSender()
    {
        return $this->hasOne('App\User','id','sender_id')->select('id','first_name','last_name','profile_pic');
    }
}
