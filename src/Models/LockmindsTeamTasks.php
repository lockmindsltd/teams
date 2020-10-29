<?php

namespace Lockminds\Teams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LockmindsTeamTasks extends Model
{

    use softDeletes;

    protected $fillable = ['task_title','task_description','task_creator','task_responsible','task_team','task_status','task_start','task_end'];

    public function progresses(){
       return $this->hasMany('Lockminds\Teams\Models\LockmindsTeamTaskProgress','task_progress_task_id','id');
    }

    public function comments(){
        return $this->hasMany('Lockminds\Teams\Models\LockmindsTeamTaskComments','task_comment_task_id','id');
    }

}
