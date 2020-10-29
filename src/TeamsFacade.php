<?php

namespace Lockminds\Teams;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Lockminds\Teams\Skeleton\SkeletonClass
 */
class TeamsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'teams';
    }
}
