<?php

namespace Modules\Taskmanager\Policies;

use Modules\Taskmanager\Entities\TeamModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the TeamModel can view any models.
     *
     * @param  TeamModel  $team
     * @return mixed
     */
    public function viewAny(TeamModel $team)
    {
        //
    }

    /**
     * Determine whether the TeamModel can view the model.
     *
     * @param  TeamModel  $team
     * @param  TeamModel  $model
     * @return mixed
     */
    public function view(TeamModel $team, TeamModel $model)
    {
        //
    }

    /**
     * Determine whether the TeamModel can create models.
     *
     * @param  TeamModel  $team
     * @return mixed
     */
    public function create(TeamModel $team)
    {
        //
    }

    /**
     * Determine whether the TeamModel can update the model.
     *
     * @param  TeamModel  $team
     * @param  TeamModel  $model
     * @return mixed
     */
    public function update(TeamModel $team, TeamModel $model)
    {
        //
    }

    /**
     * Determine whether the TeamModel can delete the model.
     *
     * @param  TeamModel  $team
     * @param  TeamModel  $model
     * @return mixed
     */
    public function delete(TeamModel $team, TeamModel $model)
    {
        //
    }

    /**
     * Determine whether the TeamModel can restore the model.
     *
     * @param  TeamModel  $team
     * @param  TeamModel  $model
     * @return mixed
     */
    public function restore(TeamModel $team, TeamModel $model)
    {
        //
    }

    /**
     * Determine whether the TeamModel can permanently delete the model.
     *
     * @param  TeamModel  $team
     * @param  TeamModel  $model
     * @return mixed
     */
    public function forceDelete(TeamModel $team, TeamModel $model)
    {
        //
    }
}
