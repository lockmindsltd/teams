<?php

namespace Lockminds\Teams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LockmindsTeamTaskProgress extends Model
{
    use SoftDeletes;
    protected $fillable = ['task_progress_creator','task_progress_task_id','task_progress_team_id','task_progress_description','task_progress_date','task_progress_percent'];

}
