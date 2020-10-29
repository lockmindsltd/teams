<?php

namespace Lockminds\Teams;

use Lockminds\Teams\Models\LockmindsTeamMembers;

class Teams
{
    // Build your next great package.

    public static function isTeaMember($team,$member){
        $model = new LockmindsTeamMembers();
        $row = $model::where('team_member_id',$member)->where("team_id",$team)->get()->count();
        if($row > 0)
            return true;
        else
            return false;
    }

}
