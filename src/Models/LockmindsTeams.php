<?php

namespace Lockminds\Teams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LockmindsTeams extends Model
{

    use SoftDeletes;

    protected $fillable = ['id','team_name','team_description','team_owner','team_icon','team_enabled','team_firebase_uid'];

}
