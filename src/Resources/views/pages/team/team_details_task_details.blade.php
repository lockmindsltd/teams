@php
    switch (strtolower($task['task_status'])){
            case "new":
                $colorClass = "danger";
                break;
            case "on progress":
            $colorClass = "primary";
            break;
            case "completed":
            $colorClass = "success";
            break;
            default:
                $colorClass = "success";
                break;
    }

$creator = \Illuminate\Foundation\Auth\User::find($task['task_creator']);
$responsible =  \Illuminate\Foundation\Auth\User::find($task['task_responsible']);
@endphp
<div class="card card-custom">
    <div class="card-header">
        <div class="card-toolbar">
            <ul class="nav nav-light-{{$colorClass}} nav-bold nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#details">
                        <span class="nav-icon"><i class="flaticon2-files-and-folders"></i></span>
                        <span class="nav-text">Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#progress">
                        <span class="nav-icon"><i class="flaticon2-hourglass-1"></i></span>
                        <span class="nav-text">Progress History</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#comments">
                        <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                        <span class="nav-text">Comments</span>
                    </a>
                </li>
{{--                $task['task_creator'] == $user->id &&--}}
            @if($task['task_creator'] == $user->id && strtolower($task['task_status']) == "new")
                    <li class="nav-item">
                        <a class="nav-link"  href="javascript:deleteTask({{$task['id']}});">
                            <span class="nav-icon"><i class="flaticon2-trash"></i></span>
                            <span class="nav-text">Delete</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details">
                <h5>Title</h5>
                <span class="text-dark">{{$task['task_title']}}</span>
                <table class=" gutter-t table table-condensed table-bordered table-light-{{$colorClass}}">
                    <thead>
                    <tr>
                        <th>Creator</th>
                        <th>Responsible</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$creator->first_name.' '.$creator->last_name}}</td>
                        <td>{{$responsible->first_name.' '.$responsible->last_name}}</td>
                    </tr>
                    </tbody>
                </table>
                <table class=" gutter-t table table-condensed table-bordered table-light-{{$colorClass}}">
                    <thead>
                    <tr>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{date("l, d-M-Y h:i:s a",strtotime($task['task_start']))}}</td>
                        <td>{{date("l, d-M-Y h:i:s a",strtotime($task['task_end']))}}</td>
                    </tr>
                    </tbody>
                </table>
                <h5 class="gutter-t">Description</h5>
                <span class="text-dark">@php echo nl2br($task['task_description'])@endphp</span>


            </div>
            <div class="tab-pane fade" id="progress" role="tabpanel" aria-labelledby="progress">
                <div class="row">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                        {{--                @if($task['task_responsible'] == Auth::user()->id)--}}
                        @if($task['task_progress'] < 100 && $task['task_responsible'] == $user->id)
                            <a  class=" gutter-b btn btn-block btn-{{$colorClass}} shadow-lgx fade show"  href="#add-task-progress" data-toggle="modal" data-backdrop="false" data-task="{{$task['id']}}" data-team="{{$task['task_team']}}" data-colorclass="{{$colorClass}}" data-progress="{{$total_progress}}">
                                <span class="nav-text text-uppercase">Add Progress <b>{{$total_progress}}%</b></span>
                            </a>
                        @endif
                        {{--                @endif--}}
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-{{$colorClass}}" role="progressbar" style="width: {{$total_progress}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="gutter-t">
                    <div class="timeline timeline-3">
                        <div class="timeline-items">
                            @if(count($progress)>0)
                                @foreach($progress as $pro)
                                    <div class="timeline-item">
                                        <div class="timeline-media">
                                            <img alt="Pic" src="{{asset(config("taskmanager.layout.assets_folder").'/media/users/300_25.jpg')}}"/>
                                        </div>
                                        <div class="timeline-content">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div class="mr-2">
                                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">
                                                        {{$pro['name']}}
                                                    </a>

                                                    <span class="text-muted ml-2"></span>
                                                    <span class="label label-light-{{$colorClass}} font-weight-bolder label-inline ml-2">{{(new \Moment\Moment(date('Y-m-d H:i:s',strtotime($pro['task_progress_date'])), 'CET'))->calendar()}}</span>
                                                    <span class="label label-light-{{$colorClass}} font-weight-bolder label-inline ml-2">{{$pro['task_progress_percent']}}%</span>
                                                </div>
                                            </div>
                                            <p class="p-0">
                                                {{nl2br($pro['task_progress_description'])}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments">
                <div class="row">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                        {{--                @if($task['task_responsible'] == Auth::user()->id)--}}

                        <a  class=" gutter-b btn btn-block btn-{{$colorClass}} shadow-lgx fade show"  href="#add-task-comment" data-toggle="modal" data-backdrop="false" data-task="{{$task['id']}}" data-team="{{$task['task_team']}}" data-colorclass="{{$colorClass}}">
                            <span class="nav-text text-uppercase">Add Comment</span>
                        </a>

                        {{--                @endif--}}
                    </div>
                </div>
                <div class="gutter-t">
                    <div class="timeline timeline-3">
                        <div class="timeline-items">
                            @if(count($comments)>0)
                                @foreach($comments as $com)
                                    <div class="timeline-item">
                                        <div class="timeline-media">
                                            <img alt="Pic" src="{{asset(config("taskmanager.layout.assets_folder").'/media/users/300_25.jpg')}}"/>
                                        </div>
                                        <div class="timeline-content">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div class="mr-2">
                                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">
                                                        {{$com['name']}}
                                                    </a>

                                                    <span class="text-muted ml-2"></span>
                                                    <span class="label label-light-{{$colorClass}} font-weight-bolder label-inline ml-2">{{(new \Moment\Moment(date('Y-m-d H:i:s',strtotime($com['task_comment_date'])), 'CET'))->calendar()}}</span>
                                                </div>
                                            </div>
                                            <p class="p-0">
                                                {{nl2br($com['task_comment_description'])}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deleteTask(task){

        const url = "{{config('app.url')}}/lmtasks/delete/" + task;

        Swal.fire({
            title: "Are you sure?",
            text: "You are about to delete task",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, DELETE TASK!"
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: "get",
                    beforeSend: function(){
                        KTApp.blockPage({
                            overlayColor: 'red',
                            state: 'warning', // a bootstrap color
                            size: 'lg', //available custom sizes: sm|lg
                            message: 'Please wait...'
                        })
                    },
                    success: function(getResult){
                        KTApp.unblockPage();
                        const result = JSON.parse(getResult);
                        if(result.status == true){
                            Swal.fire("", result.message, "success");
                            window.location.reload();
                        }else {
                            Swal.fire("", result.message, "warning");
                        }

                    },
                    error: function(xhr){
                        KTApp.unblockPage();
                        Swal.fire("",xhr.statusText,"error");
                    }
                })
            }
        });
    }
</script>
