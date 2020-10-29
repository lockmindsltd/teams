<?php

namespace Lockminds\Teams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LockmindsInvitations extends Model
{

    use SoftDeletes;

    protected $fillable = ['id','invitation_team','invitation_member','invitation_member','invitation_status'];

}
