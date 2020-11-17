        <ul class="navi navi-hover navi-active">
                <li class="navi-item">
                    <a class="navi-link" href="{{route("lmteams-team-members",['id'=>$team['id']])}}">
                        <div class="symbol mr-3">
                            <span class="symbol-label"><i class="flaticon-users-1 icon-lg"></i></span>
                        </div>
                        <div class="navi-text">
                            <span class="d-block font-weight-bold">Members</span>
                            <span class="text-muted">View, Add, Block team members</span>
                        </div>
                    </a>
                </li>
            <li class="navi-item">
                <a class="navi-link" href="{{route("lmteams-team-tasks",['id'=>$team['id']])}}">
                    <div class="symbol mr-3">
                        <span class="symbol-label"><i class="flaticon2-hourglass-1 icon-lg"></i></span>
                    </div>
                    <div class="navi-text">
                        <span class="d-block font-weight-bold">Tasks</span>
                        <span class="text-muted">View, Assign, Approve team tasks</span>
                    </div>
                </a>
            </li>
            <li class="navi-item">
                <a class="navi-link" href="{{route("lmteams-team-chatroom",['id'=>$team['id']])}}">
                    <div class="symbol mr-3">
                        <span class="symbol-label"><i class="flaticon2-chat icon-lg"></i></span>
                    </div>
                    <div class="navi-text">
                        <span class="d-block font-weight-bold">Chat Room</span>
                        <span class="text-muted">Group chat with team members</span>
                    </div>
                </a>
            </li>
            @can('edit teams')
            <li class="navi-item">
                <a class="navi-link" href="{{route("lmteams-team-members-invitations",['id'=>$team['id']])}}">
                    <div class="symbol mr-3">
                        <span class="symbol-label"><i class="flaticon2-bell icon-lg"></i></span>
                    </div>
                    <div class="navi-text">
                        <span class="d-block font-weight-bold">Invitations</span>
                        <span class="text-muted">View Pending Invitations</span>
                    </div>
                </a>
            </li>
            @endcan
{{--            <li class="navi-item">--}}
{{--                <a class="navi-link" href="{{route("lmteams-team-videoroom",['id'=>$team['id']])}}">--}}
{{--                    <div class="symbol mr-3">--}}
{{--                        <span class="symbol-label"><i class="flaticon-photo-camera icon-lg"></i></span>--}}
{{--                    </div>--}}
{{--                    <div class="navi-text">--}}
{{--                        <span class="d-block font-weight-bold">Video Conference</span>--}}
{{--                        <span class="text-muted">Video call with team members</span>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="navi-item"><br/>
                <a class=" btn btn-block btn-warning navi-link" href="{{route("lmteams-team")}}">
                    Back to Teams
                </a>
            </li>
        </ul>




