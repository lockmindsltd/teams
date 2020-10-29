<?php


    if (! function_exists('env')) {
        function isTeamMember($team,$member)  {
            $model = new \Lockminds\Teams\Models\LockmindsTeamMembers();
             $count = $model::where('team_member_id',$member)->where("team_id",$team)->get()->count();
             if($count > 0){
                 return  true;
             }else{
                 return false;
             }
        }
    }
