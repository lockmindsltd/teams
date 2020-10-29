<?php

namespace Lockminds\Teams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LockmindsTeamTaskComments extends Model
{
    use SoftDeletes;
    protected $fillable = ['task_comment_creator','task_comment_task_id','task_comment_team_id','task_comment_description','task_comment_date'];

}
