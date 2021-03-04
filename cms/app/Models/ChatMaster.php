<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ChatMaster extends Authenticatable
{
    protected $table = 'chat_master';
    public function getSender()
    {
        return $this->belongsTo('App\User', 'sender_id', 'id');
    }
    public function getReceiver()
    {
        return $this->belongsTo('App\User', 'receiver_id', 'id');
    }
    public function getLastMsg()
    {
        return $this->hasMany('App\Models\ChatIndividual', 'chat_id', 'id')->orderby('updated_at','desc');
    }

    public function getUnreadCount()
    {
        return $this->hasMany('App\Models\ChatIndividual', 'chat_id', 'id')->where('read_status',0);
    }
    // public function getSender()
    // {
    //     return $this->hasOne('App\User', 'id', 'sender_id');
    // }
    // public function getReceiver()
    // {
    //     return $this->hasOne('App\User', 'id', 'receiver_id');
    // }
}
