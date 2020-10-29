@php
    $teamModel = new \Lockminds\Teams\Models\LockmindsTeams();
    $teams = $teamModel::all();
@endphp

    @if(!empty($teams))
        <ul class="navi navi-hover navi-active">
            @foreach($teams as $team)
                @can('view teams')
                     @if(\Lockminds\Teams\Teams::isTeaMember($team['id'],$user->id) > 0)
                        <li class="navi-item">
                        <a class="navi-link" href="{{route("lmteams-team-details",['id'=>$team['id']])}}">
                            <div class="symbol mr-3 align-self-start align-self-xxl-center">
                                <div class="symbol-label" style="background-image:url({{config("app.url").'/'.config("taskmanager.uploads_folder").$team['team_icon']}})"></div>
                            </div>
                            <div class="navi-text">
                                <span class="d-block font-weight-bold">{{$team['team_name']}}</span>
                                <span class="text-muted">{{mb_strimwidth($team['team_description'], 0, 30, "...")}}</span>
                            </div>
                        </a>
                    </li>
                    @endif
                @endcan
            @endforeach
        </ul>
    @endif



