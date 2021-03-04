<?php

namespace App\Helper;

use App\Models\VolunteerPermission;
use App\User;

/**
 * 
 */
class AccessHelper
{
    public static function isAccessAble($userid, $type)
    {
        //0 =  admin 1= volunteer 2=organization
        $fieldname = $type;
        $userDetails = User::where('id', $userid)->first();
        if ($userDetails->role_id == 0) {
            return 'authorized';
        } elseif ($userDetails->role_id == 1) {
            $getData = VolunteerPermission::where('user_id', $userid)->first();
            if ($getData) {
                return $getData->$fieldname;
            } else {
                return 'denied';
            }
        } elseif ($userDetails->role_id == 2) {
            $getData = VolunteerPermission::where('user_id', $userid)->first();
            if ($getData) {
                return $getData->$fieldname;
            } else {
                return 'denied';
            }
        } else {
        }
    }
}
