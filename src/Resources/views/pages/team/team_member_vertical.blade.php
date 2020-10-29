
    @if(!empty($members))
        <ul class="navi navi-hover navi-active">
            @foreach($members as $team)
                @if($team['team_member_id'] != $user->id && $team['team_member_id'] != $member['id'])
                    <li class="navi-item">
                        <a class="navi-link" href="{{route("lmteams-chatting",['team'=>$team['team_id'],'member'=>$team['team_member_id']])}}">
                            <div class="symbol mr-3 align-self-start align-self-xxl-center">
                                <div class="symbol-label" style="background-image:url({{config("app.url").'/'.config("taskmanager.uploads_folder").$team['team_icon']}})"></div>
                            </div>
                            <div class="navi-text">
                                <span class="d-block text-muted font-weight-bold">{{$team['first_name'].' '.$team['last_name']}}</span>
                                <span class="text-muted">{{$team['created_at']}}</span>
                            </div>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    @endif



