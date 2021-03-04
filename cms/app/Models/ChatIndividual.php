<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ChatIndividual extends Authenticatable
{
    protected $table = 'chat_individual';
    public function getSender()
    {
        return $this->hasOne('App\User', 'id', 'sender_id');
    }
    public function getReceiver()
    {
        return $this->hasOne('App\User', 'id', 'receiver_id');
    }
}
