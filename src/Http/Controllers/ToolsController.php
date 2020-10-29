<?php

namespace Lockminds\Teams\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Lockminds\Teams\Models\LockmindsInvitations;
use Lockminds\Teams\Models\LockmindsTeams;
use Lockminds\Teams\Models\LockmindsTeamMembers;
use Lockminds\Teams\Models\LockmindsTeamTasks;
use Spatie\Permission\Models\Role;
use App\User;


class ToolsController extends MyController
{

    protected $teamModel,$teamMembersModel,$teamTasksModel;

    public function __construct()
    {
        $this->teamModel = new LockmindsTeams();
        $this->teamMembersModel = new LockmindsTeamMembers();
        $this->teamTasksModel =  new LockmindsTeamTasks();
    }

    public function index(Request $request)
    {
        $this->pageData['page_title'] = "Tasks";
        $this->setUser($request);

        return view('teams::pages.tools.invitations')->with($this->pageData);
    }

    public function messages(Request $request)
    {
        $this->pageData['page_title'] = "Messages";
        $this->setUser($request);

        return view('teams::pages.tools.messages')->with($this->pageData);
    }
    public function invitations(Request $request)
    {
        $this->pageData['page_title'] = "Tasks";
        $this->setUser($request);

        return view('teams::pages.tools.invitations')->with($this->pageData);
    }

    public function accept_invitation(Request $request, $team = "", $member =""){
        if(empty($request->team) || empty($request->member)){
            $output['status'] = false;
            $output['message'] = "We could not get information to enable";
        }else{
                $team = LockmindsTeams::find($request->team);
                $model = new LockmindsTeamMembers();
                $model->team_member_owner = $team->team_owner;
                $model->team_member_id = $request->member;
                $model->team_id = $request->team;
                $model->team_member_enabled = true;
                $model->team_welcome_message = "";

            if($model->save()){
                $delete =  LockmindsInvitations::Where("invitation_member",$request->member)->Where('invitation_team',$request->team)->first();
                $delete->delete();
                $output['status'] = true;
                $output['message'] = "You have successfully accepted invitation";
            }else{
                $output['status'] = true;
                $output['message'] = $model->errors();
            }

        }

        print \GuzzleHttp\json_encode($output,JSON_PRETTY_PRINT);

    }

    public function decline_invitation(Request $request, $team = "", $member =""){
        if(empty($request->team) || empty($request->member)){
            $output['status'] = false;
            $output['message'] = "We could not get information to enable";
        }else{
            $delete =  LockmindsInvitations::Where("invitation_member",$request->member)->Where('invitation_team',$request->team)->first();
            if($delete->delete()){
                $output['status'] = true;
                $output['message'] = "You have successfully declined invitation";
            }else{
                $output['status'] = true;
                $output['message'] = $delete->errors();
            }

        }

        print \GuzzleHttp\json_encode($output,JSON_PRETTY_PRINT);

    }


    public function syncPermissions(Request $request, $type,$role){
        $users = User::Where("user_type",$type)->get();
        $role = Role::findByName($role);
        if($role->exists && $users->count()>0){
            foreach ($users as $user){
                $user->syncRoles($role);
            }
            return "Done";
        }else{
            abort(404);
        }

    }

}
