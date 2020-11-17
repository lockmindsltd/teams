<?php

namespace Lockminds\Teams\Http\Controllers\Team;

use App\Category;
use App\Freelancer;
use App\FreelancerSpecialSkill;
use App\FreelancerSubcats;
use App\SubCategory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Lockminds\Teams\Http\Controllers\MyController;
use Lockminds\Teams\Models\LockmindsInvitations;
use Lockminds\Teams\Models\LockmindsTeams;
use Lockminds\Teams\Models\LockmindsTeamMembers;
use Lockminds\Teams\Models\LockmindsTeamTasks;
use Lockminds\Teams\Teams;


class TeamController extends MyController
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
        $this->pageData['page_title'] = "Teams";
        $this->pageData['page_description'] = "Team Dashboard";

        $this->setUser($request);

        if ($request->isMethod('post')) {

            if ($request->hasFile('team_icon')) {
                if ($request->file('team_icon')->isValid()) {
                    if($icon = $this->uploadTeamIcon($request)){
                        $this->teamModel->team_icon = $icon;
                    }
                }
            }

            $this->teamModel->team_owner = Auth::user()->id;
            $this->teamModel->team_name = $request->team_name;
            $this->teamModel->team_description = $request->team_description;
            if($this->teamModel->save()){
                $model = new LockmindsTeamMembers();
                $model->team_member_owner = Auth::user()->id;
                $model->team_member_id = Auth::user()->id;
                $model->team_id = $this->teamModel->id;
                $model->team_member_enabled = true;
                $model->team_welcome_message = "team creation";
                $model->save();

                $this->pageData['action_status'] = true;
                $this->pageData['action_message'] = "You have successfully created a TEAM ".$request->team_name;

                   return redirect()->route('lmteams-team-details', ['id' => $this->teamModel->id])->with($this->pageData);
            }else{
                $this->pageData['action_status'] = false;
                $this->pageData['action_message'] = $this->teamModel->errors();
            }
        }

        return view('teams::pages.team.team_dashboard')->with($this->pageData);
    }

    public function create(Request $request)
    {

        if ($request->isMethod('post')) {

            if ($request->hasFile('team_icon')) {
                if ($request->file('team_icon')->isValid()) {
                    if($icon = $this->uploadTeamIcon($request)){
                        $this->teamModel->team_icon = $icon;
                    }
                }
            }

            $this->teamModel->team_owner = Auth::user()->id;
            $this->teamModel->team_name = $request->team_name;
            $this->teamModel->team_description = $request->team_description;
            if($status = $this->teamModel->save()){
                $this->pageData['action_status'] = true;
                $this->pageData['action_message'] = "You have successfully created a TEAM ".$request->team_name;
                return view('teams::pages.team.team_create')->with($this->pageData);
            }else{
                $this->pageData['action_status'] = false;
                $this->pageData['action_message'] = $this->teamModel->errors();
            }
        }

        return view('teams::pages.team.team_create')->with($this->pageData);
    }

    public function details(Request $request, $id){

        $this->setUser($request);

        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        if ($request->isMethod('post')) {

            $allmembers = [];
            foreach($request->members as $item){
                $model = new LockmindsTeamMembers();
                $model->team_member_owner = Auth::user()->id;
                $model->team_member_id = $item;
                $model->team_id = $id;
                $model->team_member_enabled = true;
                $model->team_welcome_message = $request->welcome_message;
                $allmembers[] = $model->attributesToArray();
            }

            $status = LockmindsTeamMembers::insert($allmembers);

            if($status){
                $this->pageData['action_status'] = true;
                $this->pageData['action_message'] = "You have successfully added ".count($allmembers).' member(s)';
            }else{
                $this->pageData['action_status'] = false;
                $this->pageData['action_message'] = $this->teamModel->errors();
            }
        }

        $team = $this->teamModel::find($id);
        $this->pageData['members'] = $this->teamMembersModel::where("team_id",$id)->leftJoin('users', 'lockminds_team_members.team_member_id', '=', 'users.id')->get();
        $this->pageData['team'] = $team;

        $team = $this->teamModel::find($id);
        $this->pageData['team'] = $team;
        $this->pageData['page_description'] = "Details | ".strtoupper($team['team_name']);
        return view('teams::pages.team.team_details')->with($this->pageData);
    }

    public function detailsred(Request $request){

        $id =  $request->team;
        $this->setUser($request);

        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        if ($request->isMethod('post')) {

            $allmembers = [];
            foreach($request->members as $item){
                $model = new LockmindsTeamMembers();
                $model->team_member_owner = Auth::user()->id;
                $model->team_member_id = $item;
                $model->team_id = $id;
                $model->team_member_enabled = true;
                $model->team_welcome_message = $request->welcome_message;
                $allmembers[] = $model->attributesToArray();
            }

            $status = LockmindsTeamMembers::insert($allmembers);

            if($status){
                $this->pageData['action_status'] = true;
                $this->pageData['action_message'] = "You have successfully added ".count($allmembers).' member(s)';
            }else{
                $this->pageData['action_status'] = false;
                $this->pageData['action_message'] = $this->teamModel->errors();
            }
        }

        $team = $this->teamModel::find($id);
        $this->pageData['members'] = $this->teamMembersModel::where("team_id",$id)->leftJoin('users', 'lockminds_team_members.team_member_id', '=', 'users.id')->get();
        $this->pageData['team'] = $team;

        $team = $this->teamModel::find($id);
        $this->pageData['team'] = $team;
        $this->pageData['page_description'] = "Details | ".strtoupper($team['team_name']);
        return view('teams::pages.team.team_details')->with($this->pageData);
    }

    public function members(Request $request, $id){

        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        $this->setUser($request);

        if ($request->isMethod('post')) {

            $allmembers = [];
//            foreach($request->members as $item){
//                $model = new LockmindsTeamMembers();
//                $model->team_member_owner = Auth::user()->id;
//                $model->team_member_id = $item;
//                $model->team_id = $id;
//                $model->team_member_enabled = true;
//                $model->team_welcome_message = $request->welcome_message;
//                $allmembers[] = $model->attributesToArray();
//            }

            foreach($request->members as $item){
                $model = new LockmindsInvitations();
                $model->invitation_status = 0;
                $model->invitation_invitor = $request->user()->id;
                $model->invitation_member = $item;
                $model->invitation_team = $id;
                $model->invitation_message = $request->welcome_message;
                $allmembers[] = $model->attributesToArray();
            }

            $status = LockmindsInvitations::insert($allmembers);

            if($status){
                $this->pageData['action_status'] = true;
                $this->pageData['action_message'] = "You have successfully invited ".count($allmembers).' member(s)';
                return redirect()->back();
            }else{
                $this->pageData['action_status'] = false;
                $this->pageData['action_message'] = $this->teamModel->errors();
            }
        }

        $team = $this->teamModel::find($id);
        $this->pageData['members'] = $this->teamMembersModel::where("team_id",$id)->leftJoin('users', 'lockminds_team_members.team_member_id', '=', 'users.id')->get();
        $this->pageData['team'] = $team;
        $this->pageData['page_description'] = "Details | ".strtoupper($team['team_name']);
        return view('teams::pages.team.team_details_members')->with($this->pageData);
    }

    public function members_invitations(Request $request, $id){

        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        $this->setUser($request);

        $team = $this->teamModel::find($id);
        $this->pageData['members'] = $this->teamMembersModel::where("team_id",$id)->leftJoin('users', 'lockminds_team_members.team_member_id', '=', 'users.id')->get();
        $this->pageData['team'] = $team;
        $this->pageData['page_description'] = "Details | ".strtoupper($team['team_name']);
        return view('teams::pages.team.team_details_members_invitations')->with($this->pageData);
    }

    public function members_invite(Request $request, $id){

        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        $this->setUser($request);


        if($request->invite != null && $request->invite > 0){

            if(Teams::isInvited($id,$request->invite) == false){
                $name = User::find($request->invite);
                $model = new LockmindsInvitations();
                $model->invitation_status = 0;
                $model->invitation_invitor = $request->user()->id;
                $model->invitation_member = $request->invite;
                $model->invitation_team = $id;
                $model->invitation_message = "Hi ".$name->first_name."; I noticed your profile and would like to invite  you to collaborate on my project.We can discuss any details over chat.";
                $status = $model->save();

                if($status){
                    $this->pageData['action_status'] = true;
                    $this->pageData['action_message'] = "You have successfully invited ".$name->first_name;
                }else{
                    $this->pageData['action_status'] = false;
                    $this->pageData['action_message'] = $this->teamModel->errors();
                }
            }
        }

        $search_key=$request->input('srch-term');
        $search_country=$request->input('country');
        $search_skill=$request->input('skill');
        $sub_categories=0;

        $sub_cat_key=$request->input('sub_cat');

        $freelancers=Freelancer::where('onBoardStatus',1)->where('approval_status', 1)->inRandomOrder()->get();

        if(!empty($search_key))
            $freelancers=Freelancer::where('onBoardStatus',1)->where('approval_status', 1)->inRandomOrder()->get();

        if(!empty($search_country))
            $freelancers=Freelancer::where('country',$search_country)->where('onBoardStatus',1)->where('approval_status', 1)->inRandomOrder()->get();

        if(!empty($search_skill)){
            //$freelancers=Freelancer::where('country',$search_country)->get();
            $freelancer_skill_ids=FreelancerSpecialSkill::where('id',$search_skill)->get(['freelancer_id']);
            $freelancers=Freelancer::whereIn('id',$freelancer_skill_ids)->where('onBoardStatus',1)->where('approval_status', 1)->inRandomOrder()->get();
        }

        $categories=Category::all();

        $countries=Freelancer::where('id','>',0)->distinct()->get(['country']);

        $skills=FreelancerSpecialSkill::distinct('skill')->get();;


        if(!empty($request->input('category'))){

            $freelancers=Freelancer::where('top_skill_id',$request->input('category'))->where('approval_status', 1)->where('onBoardStatus',1)->inRandomOrder()->get();

            $categories=Category::where('category','!=',Category::where('id',$request->input('category'))->first()->category)->get();

            $sub_categories=SubCategory::where('cat_id',$request->input('category'))->get();

        }


        if(!empty($sub_cat_key))
        {

            $freelancer_ids=FreelancerSubcats::where('sub_cat',$sub_cat_key)->get(['freelancer_id']);

            $cat_id=SubCategory::where('id',$sub_cat_key)->first()->cat_id;


            $sub_categories=SubCategory::where('cat_id',$cat_id)->get();


            $freelancers=Freelancer::whereIn('id',$freelancer_ids)->where('onBoardStatus',1)->where('approval_status', 1)->distinct()->inRandomOrder()->get();

        }

        $this->pageData['countries'] = $countries;
        $this->pageData['freelancers']= $freelancers;
        $this->pageData['categories'] = $categories;
        $this->pageData['skills'] =  $skills;
        $this->pageData['sub_categories'] = $sub_categories;
        $this->pageData['request'] = $request;

        $team = $this->teamModel::find($id);
        $this->pageData['members'] = $this->teamMembersModel::where("team_id",$id)->leftJoin('users', 'lockminds_team_members.team_member_id', '=', 'users.id')->get();
        $this->pageData['team'] = $team;
        $this->pageData['page_description'] = "Details | ".strtoupper($team['team_name']);
        return view('teams::pages.team.team_details_members_invite')->with($this->pageData);
    }


    public function tasks(Request $request, $id){
        $this->setUser($request);

        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        $team = $this->teamModel::find($id);

        $this->pageData['team'] = $team;
        $this->pageData['active_link'] = "all";
        $this->pageData['members'] = $this->teamMembersModel::where("team_id",$id)->leftJoin('users', 'lockminds_team_members.team_member_id', '=', 'users.id')->get();
        $this->pageData['tasks'] = $this->teamTasksModel::where("task_team",$id)->get();
        $this->pageData['page_description'] = "Details | ".strtoupper($team['team_name']);
        $this->createtask($request,$id);
        return view('teams::pages.team.team_details_tasks')->with($this->pageData);
    }

    public function newtasks(Request $request, $id){

        $this->setUser($request);

        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        $team = $this->teamModel::find($id);

        $this->pageData['active_link'] = "new";
        $this->pageData['team'] = $team;
        $this->pageData['members'] = $this->teamMembersModel::where("team_id",$id)->leftJoin('users', 'lockminds_team_members.team_member_id', '=', 'users.id')->get();
        $this->pageData['tasks'] = $this->teamTasksModel::where("task_team",$id)->where("task_status","new")->get();
        $this->pageData['page_description'] = "Details | ".strtoupper($team['team_name']);

        $this->createtask($request,$id);
        return view('teams::pages.team.team_details_tasks')->with($this->pageData);
    }

    public function progress(Request $request, $id){

        $this->setUser($request);

        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        $team = $this->teamModel::find($id);

        $this->createtask($request,$id);
        $this->pageData['active_link'] = "progress";
        $this->pageData['team'] = $team;
        $this->pageData['members'] = $this->teamMembersModel::where("team_id",$id)->leftJoin('users', 'lockminds_team_members.team_member_id', '=', 'users.id')->get();
        $this->pageData['tasks'] = $this->teamTasksModel::where("task_team",$id)->where("task_status","on progress")->get();
        $this->pageData['page_description'] = "Details | ".strtoupper($team['team_name']);
        return view('teams::pages.team.team_details_tasks')->with($this->pageData);
    }

    public function finished(Request $request, $id){
        $this->setUser($request);

        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        $team = $this->teamModel::find($id);
        $this->createtask($request,$id);
        $this->pageData['active_link'] = "finished";
        $this->pageData['team'] = $team;
        $this->pageData['members'] = $this->teamMembersModel::where("team_id",$id)->leftJoin('users', 'lockminds_team_members.team_member_id', '=', 'users.id')->get();
        $this->pageData['tasks'] = $this->teamTasksModel::where("task_team",$id)->where("task_status","completed")->get();
        $this->pageData['page_description'] = "Details | ".strtoupper($team['team_name']);
        return view('teams::pages.team.team_details_tasks')->with($this->pageData);
    }

    public function mytasks(Request $request, $id){
        $this->setUser($request);


        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        $team = $this->teamModel::find($id);

        $this->createtask($request,$id);
        $this->pageData['active_link'] = "mytasks";
        $this->pageData['team'] = $team;
        $this->pageData['members'] = $this->teamMembersModel::where("team_id",$id)->leftJoin('users', 'lockminds_team_members.team_member_id', '=', 'users.id')->get();
        $this->pageData['tasks'] = $this->teamTasksModel::where("task_team",$id)->orWhere("task_responsible",Auth::user()->id)->orWhere("task_creator",Auth::user()->id)->get();
        $this->pageData['page_description'] = "Details | ".strtoupper($team['team_name']);
        return view('teams::pages.team.team_details_tasks')->with($this->pageData);
    }

    public function chattingroom(Request $request, $id,$member){
        $this->setUser($request);

        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        $this->setUser($request);

        $team = $this->teamModel::find($id);
        $this->pageData['members'] = $this->teamMembersModel::where("team_id",$id)->leftJoin('users', 'lockminds_team_members.team_member_id', '=', 'users.id')->get();
        $this->pageData['team'] = $team;
        $this->pageData['member'] = User::find($member);
        $this->pageData['page_description'] = "Details | ".strtoupper($team['team_name']);
        return view('teams::pages.team.team_details_chattingroom')->with($this->pageData);
    }

    public function chatroom(Request $request, $id){

        $this->setUser($request);

        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        $this->setUser($request);
        $team = $this->teamModel::find($id);

        $this->pageData['team'] = $team;
        $this->pageData['page_description'] = "Details | ".strtoupper($team['team_name']);
        return view('teams::pages.team.team_details_chatroom')->with($this->pageData);
    }

    public function videoroom(Request $request, $id){
        $this->setUser($request);

        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        $team = $this->teamModel::find($id);
        $this->pageData['team'] = $team;
        $this->pageData['page_description'] = "Details | ".strtoupper($team['team_name']);
        return view('teams::pages.team.team_details_videoroom')->with($this->pageData);
    }

    private function createtask(Request $request, $id){
        $this->setUser($request);

        if(!Teams::isTeaMember($id,$request->user()->id))
            abort(404);

        if($request->isMethod("post")){
            $this->teamTasksModel->task_creator = Auth::user()->id;
            $this->teamTasksModel->task_title = $request->task_title;
            $this->teamTasksModel->task_description = $request->task_description;
            $this->teamTasksModel->task_status = $request->task_status;
            $this->teamTasksModel->task_responsible = $request->task_responsible;
            $this->teamTasksModel->task_team = $id;
            $this->teamTasksModel->task_start = date("Y-m-d H:i:s", strtotime($request->task_start));
            $this->teamTasksModel->task_end = date("Y-m-d H:i:s", strtotime($request->task_end));

            $status = $this->teamTasksModel->save();
            if($status){
                $this->pageData['action_status'] = true;
                $this->pageData['action_message'] = "You have successfully created task";
                return redirect()->route('lmteams-team-details', ['id' => $id])->withInput();
            }else{
                $this->pageData['action_status'] = false;
                $this->pageData['action_message'] = $this->teamModel->errors();
            }
        }
    }

    public function uploadTeamIcon(Request $request){

        $time = Carbon::now();
        // Requesting the file from the form
        $icon = $request->file('team_icon');
        // Getting the extension of the file
        $extension = $icon->getClientOriginalExtension();
        // Creating the directory, for example, if the date = 18/10/2017, the directory will be 2017/10/
        $directory = date_format($time, 'Y') . '/' . date_format($time, 'm');
        // Creating the file name: random string followed by the day, random number and the hour
        $filename = random_int(0,5).date_format($time,'d').rand(1,9).date_format($time,'h').".".$extension;
        // This is our upload main function, storing the image in the storage that named 'public'
        $upload_success = $icon->storeAs($directory, $filename, 'public');
        // If the upload is successful, return the name of directory/filename of the upload.

        if ($upload_success) {
            $icon->move(public_path(config("taskmanager.uploads_folder")),$filename);
            return $filename;
        }

        return false;

    }


}
