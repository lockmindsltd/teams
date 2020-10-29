<?php

namespace Lockminds\Teams\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Lockminds\Teams\Models\LockmindsTeamMembers;


class MyController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $pageData;

    protected function __construct(){
        $this->pageData =  array();
    }

    protected function setUser(Request $request){
        $this->pageData['user'] = $request->user();
    }

    protected function isMyTeam($team, $member){
        $model = new LockmindsTeamMembers();
        return $model::where('team_member_id',$member)->where("team_id",$team)->get()->count();
    }
}
