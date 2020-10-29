<?php

namespace Lockminds\Teams\Http\Controllers\Team;

use Illuminate\Http\Request;
use Lockminds\Teams\Http\Controllers\MyController;
use Lockminds\Teams\Models\LockmindsTeamTasks;
use Lockminds\Teams\Models\LockmindsTeamTaskProgress;
use Lockminds\Teams\Models\LockmindsTeamTaskComments;


class TeamTasksController extends MyController
{

    public $teamTaskModel,$teamTaskProgressModel;


    public function __construct()
    {
        $this->teamTaskModel = new LockmindsTeamTasks();
        $this->teamTaskProgressModel = new LockmindsTeamTaskProgress();
    }

    public function details(Request $request, $team, $task){
        $this->setUser($request);
        $this->pageData['task'] = $this->teamTaskModel::where("id",$task)->where("task_team",$team)->first();

        if(empty($this->pageData['task'])){
            return  "Not allowed";
        }

        $this->pageData['progress'] = $this->teamTaskModel::where("task_team",$team)->orderBy('created_at','desc')->find($task)->progresses;
        $this->pageData['comments'] = $this->teamTaskModel::where("task_team",$team)->orderBy('created_at','desc')->find($task)->comments;

        if(!empty($totalProgress = $this->teamTaskProgressModel::where("task_progress_task_id",$task)->latest()->first())){
            $this->pageData['total_progress'] = $totalProgress->task_progress_percent;
        }else{
            $this->pageData['total_progress'] = 0;
        }

        $this->pageData['page_title'] = "Task Details";
        return view("teams::pages.team.team_details_task_details")->with($this->pageData);
    }

    public function addprogress(Request $request){
        $this->setUser($request);
        if(empty($request->team) || empty($request->task)){
            $output['status'] = false;
            $output['message'] = "We couldn\'t perform your task at the moment try after some time";
        }else{
            $this->teamTaskProgressModel->task_progress_creator = $request->user()->id;
            $this->teamTaskProgressModel->task_progress_task_id = $request->task;
            $this->teamTaskProgressModel->task_progress_team_id = $request->team;
            $this->teamTaskProgressModel->task_progress_description = $request->progress_description;
            $this->teamTaskProgressModel->task_progress_percent = $request->progress_done;
            $this->teamTaskProgressModel->task_progress_date = date("Y-m-d H:i:s",strtotime($request->progress_time));
            if($this->teamTaskProgressModel->save()){
                $task = $this->teamTaskModel::find($request->task);
                $task->task_progress = $request->progress_done;
                if($request->progress_done >= 100){
                    $task->task_status = "completed";
                }else{
                    $task->task_status = "on progress";
                }
                $task->task_progress = $request->progress_done;
                $task->save();
                $output['status'] = true;
                $output['message'] = "You have successfully added progress";
            }else{
                $output['status'] = true;
                $output['message'] = $this->teamTaskProgressModel->errors();
            }
        }

        print \GuzzleHttp\json_encode($output,JSON_PRETTY_PRINT);

    }

    public function addcomments(Request $request){
        if(empty($request->team) || empty($request->task)){
            $output['status'] = false;
            $output['message'] = "We couldn\'t perform your task at the moment try after some time";
        }else{
            $comments = new LockmindsTeamTaskComments();
            $comments->task_comment_creator = $request->user()->id;
            $comments->task_comment_task_id = $request->task;
            $comments->task_comment_team_id = $request->team;
            $comments->task_comment_description = $request->comment_description;
            $comments->task_comment_date = date("Y-m-d H:i:s",strtotime($request->comment_time));
            if($comments->save()){
                $output['status'] = true;
                $output['message'] = "You have successfully added comment";
            }else{
                $output['status'] = true;
                $output['message'] = $comments->errors();
            }
        }

        print \GuzzleHttp\json_encode($output,JSON_PRETTY_PRINT);

    }

}
