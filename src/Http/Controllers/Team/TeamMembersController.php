<?php

namespace Lockminds\Teams\Http\Controllers\Team;

use Illuminate\Http\Request;
use Lockminds\Teams\Http\Controllers\MyController;
use Lockminds\Teams\Models\LockmindsTeams;
use Lockminds\Teams\Models\LockmindsTeamMembers;
use Auth;

class TeamMembersController extends MyController
{

    public $teamModel,$teamMemberModel;

    public function __construct()
    {
        $this->teamModel = new LockmindsTeams();
        $this->teamMemberModel =  new LockmindsTeamMembers();
    }

    public function enable(Request $request, $team = "", $member =""){
        if(empty($team) || empty($member)){
            $output['status'] = false;
            $output['message'] = "We could not get information to enable";
        }else{
            $isMember = $this->teamMemberModel::where("team_member_owner", Auth::user()->id)->where("team_id",$team)->where("team_member_id", $member)->first();
            if(empty($isMember)){
                $output['status'] = false;
                $output['message'] = "We could not get information to enable";
            }else{
                $isMember->team_member_enabled = true;
                if($isMember->save()){
                    $output['status'] = true;
                    $output['message'] = "You have successfully enable a Member";
                }else{
                    $output['status'] = true;
                    $output['message'] = $isMember->errors();
                }
            }
        }

        print \GuzzleHttp\json_encode($output,JSON_PRETTY_PRINT);

    }

    public function block(Request $request, $team = "", $member =""){
        if(empty($team) || empty($member)){
            $output['status'] = false;
            $output['message'] = "We could not get information to enable";
        }else{
            $isMember = $this->teamMemberModel::where("team_member_owner", Auth::user()->id)->where("team_id",$team)->where("team_member_id", $member)->first();
            if(empty($isMember)){
                $output['status'] = false;
                $output['message'] = "We could not get information to enable";
            }else{
                $isMember->team_member_enabled = false;
                if($isMember->save()){
                    $output['status'] = true;
                    $output['message'] = "You have successfully enable a Member";
                }else{
                    $output['status'] = true;
                    $output['message'] = $isMember->errors();
                }
            }
        }

        print \GuzzleHttp\json_encode($output,JSON_PRETTY_PRINT);

    }

    public function remove(Request $request, $team = "", $member =""){

        if(empty($team) || empty($member)){
            $output['status'] = false;
            $output['message'] = "We could not get member to remove";
        }else{
            $isMember = $this->teamMemberModel::where("team_member_owner", $request->user()->id)->where("team_id",$team)->where("team_member_id", $member)->first();
            if(empty($isMember)){
                $output['status'] = false;
                $output['message'] = "You do not have right to remove member";
            }else{
                if($isMember->delete()){
                    $output['status'] = true;
                    $output['message'] = "You have successfully removed Member";
                }else{
                    $output['status'] = true;
                    $output['message'] = $isMember->errors();
                }
            }
        }

        print \GuzzleHttp\json_encode($output,JSON_PRETTY_PRINT);

    }

}
