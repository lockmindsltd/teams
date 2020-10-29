
{{-- Extends layout --}}
@extends('teams::layout.default')

{{-- Content --}}
@section('content')
    <div class=" container ">

        @if(isset($action_status))

            @if($action_status)
                @php $class = "success"; @endphp
            @else
                @php $class = "danger" @endphp
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-custom alert-{{$class}} fade show" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                        <div class="alert-text">{{$action_message}}</div>
                        <div class="alert-close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

    @endif
        <!--begin::Contacts-->
        <div class="row">
            <div class="col-md-4">
                <div class="card card-custom card-stretch">
                        <!--begin::Body-->
                    <div class="card-body pt-4">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end">
                            <div class="dropdown dropdown-inline">
                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ki ki-bold-more-hor"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover py-5">
                                        <li class="navi-item">
                                            <a href="#create-team" data-toggle="modal" data-backdrop="false" class="navi-link">
                                                <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                                <span class="navi-text">Change Details</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#create-team" data-toggle="modal" data-backdrop="false" class="navi-link">
                                                <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                                <span class="navi-text">Block Access</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::User-->
                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                <div class="symbol-label" style="background-image:url({{config("app.url").'/'.config("taskmanager.uploads_folder").$team['team_icon']}})"></div>
                            </div>
                            <div>
                                <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                                    {{$team['team_name']}}
                                </a>
                                <div class="text-muted">
                                    {{$team['created_at']}}
                                </div>
                                <div class="mt-2">
                                    <a href="#add-task" data-toggle="modal" data-backdrop="false" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1 text-uppercase">Add Task</a>
                                </div>
                            </div>
                        </div>
                        <!--end::User-->

                        <!--begin::Contact-->
                        <div class="py-9">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-muted text-hover-primary">{{$team['team_description']}}</span>
                            </div>
                        </div>
                        <!--end::Contact-->

                        <!--begin::Nav-->
                        <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                            @include("teams::pages.team.team_details_menus")
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Body-->
                </div>
            </div>
                <!--begin::Profile Card-->


            <!--end::Aside-->
            <!--begin::Content-->
            <div class="col-md-8">
                <div class="card card-custom gutter-b">

                    <!--begin::Body-->
                    <div class="card-body d-flex align-items-center justify-content-between flex-wrap py-3">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center mr-2 py-2">
                            <!--begin::Title-->
                            <h3 class="font-weight-bold mb-0 mr-10">Team Tasks</h3>
                            <!--end::Title-->

                            <!--begin::Navigation-->
                            <div class="d-flex ">
                                <!--begin::Navi-->
                                <div class="navi navi-hover navi-active navi-link-rounded navi-bold d-flex flex-row">
                                    <!--begin::Item-->

                                    <!--begin::Item-->
                                    <div class="navi-item mr-2">
                                        <a href="{{route("lmteams-team-tasks-new",['id'=>$team['id']])}}" class="navi-link @if($active_link=="new") active @endif">
                                            <span class="navi-text">New Tasks</span>
                                        </a>
                                    </div>
                                    <!--end::Item-->
                                    <div class="navi-item mr-2">
                                        <a href="{{route("lmteams-team-tasks",['id'=>$team['id']])}}" class="navi-link @if($active_link=="all") active @endif">
                                            <span class="navi-text">All Tasks</span>
                                        </a>
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="navi-item mr-2">
                                        <a href="{{route("lmteams-team-tasks-progress",['id'=>$team['id']])}}" class="navi-link @if($active_link=="progress") active @endif">
                                            <span class="navi-text">On Progress</span>
                                        </a>
                                    </div>
                                    <!--end::Item-->
                                    <!--end::Item--><!--begin::Item-->
                                    <div class="navi-item mr-2">
                                        <a href="{{route("lmteams-team-tasks-finished",['id'=>$team['id']])}}" class="navi-link @if($active_link=="finished") active @endif">
                                            <span class="navi-text">Finished</span>
                                        </a>
                                    </div>
                                    <!--begin::Item-->
                                    <div class="navi-item mr-2">
                                        <a href="{{route("lmteams-team-tasks-mytasks",['id'=>$team['id']])}}" class="navi-link @if($active_link=="mytasks") active @endif">
                                            <span class="navi-text">My Tasks</span>
                                        </a>
                                    </div>
                                    <!--end::Item-->

                                </div>
                                <!--end::Navi-->
                            </div>
                            <!--end::Navigation-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Body-->
                </div>

                @if(count($tasks) > 0)
                    <div class="card card-custom gutter-b">
                        <div class="card-body" >
                            @foreach($tasks as $task)
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
                            <a  href="#task-details" data-toggle="modal" data-backdrop="false" data-task="{{$task['id']}}" data-team="{{$task['task_team']}}" data-colorclass="{{$colorClass}}">
                                <div class="d-flex align-items-center bg-light-{{$colorClass}} rounded p-5 mb-5" >
                                    <div class="symbol mr-3">
                                        <img alt="Pic" src="{{asset('lockminds/media/users/300_25.jpg')}}"/>
                                    </div>
                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                        <span class="font-weight-normal text-dark-75 text-hover-{{$colorClass}} font-size-lg mb-1"><span class="label label-inline  label-rounded label-{{$colorClass}}">{{$task['task_status']}}</span> {{$task['task_title']}}</span>
                                        <span class="text-{{$colorClass}} font-size-sm kt-font-bold">Responsible: {{$responsible->name}}</span>
                                        <span class="text-{{$colorClass}} font-size-sm">Created by: {{$creator->name}}</span>
                                    </div>

                                    <span class="font-weight-bolder text-{{$colorClass}} py-1 font-size-lg">Progress: {{$task['task_progress']}}% <br/> <small class="font-size-sm">{{date("l Y-m-d",strtotime($task['task_start']))}}</small><br/> <small class="font-size-sm">{{date("l Y-m-d",strtotime($task['task_end']))}}</small></span>

                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="card card-custom gutter-b">

                        <div class="card-header bg-warning">
                            <div class="card-title">
                                <h3 class="card-label">
                                    There are no tasks under this section @if($active_link == 'all'), create one below @endif
                                </h3>
                            </div>
                        </div>

                    @if($active_link == 'all')
                        <div class="card-body">
                        <form method="post" class="kt-form"  enctype='multipart/form-data'>
                            @csrf
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Task Title <b class="text-danger">*</b></label>
                                <input class="form-control" name="task_title" placeholder="Team name" required />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Task Description <b class="text-danger">*</b></label>
                                <textarea name="task_description" id="kt-ckeditor-1" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Start Time <b class="text-danger">*</b></label>
                                <input type="datetime-local" name="task_start" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>End Time <b class="text-danger">*</b></label>
                                <input type="datetime-local" name="task_end" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Responsible Member <b class="text-danger">*</b></label>
                                <select style="width: 100%;" class="form-control" name="task_responsible" required>

                                    @if(count($members) > 0)
                                        @foreach($members as $member)
                                            <option value="{{$member['team_member_id']}}">{{$member['first_name'].' '.$member['middle_name'].' '.$member['last_name'].' -- '.$member['team_member_id']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Status <b class="text-danger">*</b></label>
                                <select style="width: 100%;"  name="task_status" class="form-control" required>
                                    <option value="new">New</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group align-item-right">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 pull-right align-item-right">
                                <button type="submit" class="btn btn-dark pull-right btn-block text-uppercase">Create Task</button>
                            </div>
                        </div>
                    </form>
                        </div>
                        @endif
                    </div>
                    @endif
            </div>
            <!--end::Content-->
        </div>
        <!--end::Contacts-->
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')

    <!--begin::Page Vendors(used by this page)-->
    <script src="{{asset('vendor/teams/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.6')}}"></script>
    <!--end::Page Vendors-->

    <script>
        "use strict";
        // Class definition

        var KTCkeditor = function () {
            // Private functions
            var demos = function () {
                ClassicEditor
                    .create( document.querySelector( '#kt-ckeditor-1' ) )
                    .then( editor => {
                        console.log( editor );
                    } )
                    .catch( error => {
                        console.error( error );
                    } );

                ClassicEditor
                    .create( document.querySelector( '#kt-ckeditor-2' ) )
                    .then( editor => {
                        console.log( editor );
                    } )
                    .catch( error => {
                        console.error( error );
                    } );

                ClassicEditor
                    .create( document.querySelector( '#kt-ckeditor-3' ) )
                    .then( editor => {
                        console.log( editor );
                    } )
                    .catch( error => {
                        console.error( error );
                    } );

                ClassicEditor
                    .create( document.querySelector( '#kt-ckeditor-4' ) )
                    .then( editor => {
                        console.log( editor );
                    } )
                    .catch( error => {
                        console.error( error );
                    } );

                ClassicEditor
                    .create( document.querySelector( '#kt-ckeditor-5' ) )
                    .then( editor => {
                        console.log( editor );
                    } )
                    .catch( error => {
                        console.error( error );
                    } );
            }

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function() {
            KTCkeditor.init();
        });
    </script>

    <div class="modal fade" id="task-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" style="border:0px;">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Task Details</h5>
                    <a data-dismiss="modal" href="javascript:(0);" modal-dismiss="modal" class="pull-right modal-title text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-icon-white text-white text-light" style="color:#ffffff">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect id="bound" x="0" y="0" width="24" height="24"/>
                                <path d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z" id="Oval-25" fill="#FFFFFF" fill-rule="nonzero"/>
                                <rect id="Rectangle" fill="#FFFFFF" opacity="0.3" x="11" y="3" width="2" height="10" rx="1"/>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="modal-body text-back" id="printArea">

                </div>
                <div class="modal-footer">
                    <small class="text-light font-size-sm ml-2"> &copy <?php echo date('Y') ;?> {{config("app.name")}} | Task Details</small>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-task" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" style="border:0px;">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Create Task</h5>
                    <a data-dismiss="modal" href="javascript:(0);" modal-dismiss="modal" class="pull-right modal-title text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-icon-white text-white text-light" style="color:#ffffff">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect id="bound" x="0" y="0" width="24" height="24"/>
                                <path d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z" id="Oval-25" fill="#FFFFFF" fill-rule="nonzero"/>
                                <rect id="Rectangle" fill="#FFFFFF" opacity="0.3" x="11" y="3" width="2" height="10" rx="1"/>
                            </g>
                        </svg></a>
                </div>
                <div class="modal-body text-back" id="printArea">
                    <form method="post" class="kt-form"  enctype='multipart/form-data'>
                        @csrf
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Task Title <b class="text-danger">*</b></label>
                                <input class="form-control" name="task_title" placeholder="Team name" required />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Task Description <b class="text-danger">*</b></label>
                                <textarea name="task_description" id="kt-ckeditor-1" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Start Time <b class="text-danger">*</b></label>
                                <input type="datetime-local" name="task_start" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>End Time <b class="text-danger">*</b></label>
                                <input type="datetime-local" name="task_end" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label>Responsible Member <b class="text-danger">*</b></label>
                                <select style="width: 100%;" class="form-control" name="task_responsible" required>

                                    @if(count($members) > 0)
                                        @foreach($members as $member)
                                            <option value="{{$member['team_member_id']}}">{{$member['first_name'].' '.$member['middle_name'].' '.$member['last_name'].' -- '.$member['team_member_id']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Status <b class="text-danger">*</b></label>
                                <select style="width: 100%;"  name="task_status" class="form-control" required>
                                    <option value="new">New</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group align-item-right">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 pull-right align-item-right">
                                <button type="submit" class="btn btn-dark pull-right btn-block text-uppercase">Create Task</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-dark">
                    <small class="text-muted font-size-sm ml-2"> &copy <?php echo date('Y') ;?> {{config("app.name")}} | Create Task</small>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-task-progress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-mg" role="document">
            <div class="modal-content" style="border:0px;">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Task Progress</h5>
                    <a data-dismiss="modal" href="javascript:(0);" modal-dismiss="modal" class="pull-right modal-title text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-icon-white text-white text-light" style="color:#ffffff">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect id="bound" x="0" y="0" width="24" height="24"/>
                                <path d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z" id="Oval-25" fill="#FFFFFF" fill-rule="nonzero"/>
                                <rect id="Rectangle" fill="#FFFFFF" opacity="0.3" x="11" y="3" width="2" height="10" rx="1"/>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="modal-body text-back">
                        <form class="kt-form row" method="post" id="add-task-progress-form">
                                @csrf
                                <input type="hidden" name="team" id="team_team_id">
                                <input type="hidden" name="task" id="team_task_id">

                            <div class="form-group col-12">
                                <label>Description</label>
                                <textarea required class="form-control" name="progress_description" placeholder="Progress description"></textarea>
                            </div>
                            <div class="form-group col-12">
                                <label>Action Time</label>
                                <input  required type="datetime-local" name="progress_time" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label>Progress Done (in percentage)</label>
                                <input id="progress-percentage" max="100" required type="number" name="progress_done" class="form-control" placeholder="e.g 5%">
                            </div>
                            <div class="col-md-8"></div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="active btn btn-block btn-default pull-right ">Submit</button>
                            </div>
                        </form>
                </div>
                <div class="modal-footer">
                    <small class="text-light font-size-sm ml-2"> &copy <?php echo date('Y') ;?> {{config("app.name")}} | Add Task Progress</small>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-task-comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-mg" role="document">
            <div class="modal-content" style="border:0px;">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Task Comment</h5>
                    <a data-dismiss="modal" href="javascript:(0);" modal-dismiss="modal" class="pull-right modal-title text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-icon-white text-white text-light" style="color:#ffffff">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect id="bound" x="0" y="0" width="24" height="24"/>
                                <path d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z" id="Oval-25" fill="#FFFFFF" fill-rule="nonzero"/>
                                <rect id="Rectangle" fill="#FFFFFF" opacity="0.3" x="11" y="3" width="2" height="10" rx="1"/>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="modal-body text-back">
                    <form class="kt-form row" method="post" id="add-task-comment-form">
                        @csrf
                        <input type="hidden" name="team" id="team_team_id_comment">
                        <input type="hidden" name="task" id="team_task_id_comment">
                        <div class="form-group col-12">
                            <label>Action Time</label>
                            <input  required type="datetime-local" name="comment_time" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label>Comment</label>
                            <textarea required class="form-control" name="comment_description" placeholder="Comment content"></textarea>
                        </div>
                        <div class="col-md-8"></div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="active btn btn-block btn-default pull-right ">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <small class="text-light font-size-sm ml-2"> &copy <?php echo date('Y') ;?> {{config("app.name")}} | Add Task Comment</small>
                </div>
            </div>
        </div>
    </div>

    <script>
    $("select").select2({placeholder:"Select Option"});
    $( function(){
        var oldClass ="";
        $('#task-details').on('show.bs.modal', function (event) {
            const handler = $(event.relatedTarget) // Button that triggered the modal
            const team = handler.data('team');
            const task = handler.data('task');
            const colorClass = handler.data('colorclass');
            const modal = $(this)
            modal.find(".modal-header").removeClass(oldClass);
            modal.find(".modal-footer").removeClass(oldClass);
            modal.find(".modal-header").addClass("bg-"+colorClass);
            modal.find(".modal-footer").addClass("bg-"+colorClass);
            oldClass = "bg-"+colorClass;
            modal.find(".modal-body").text("Please wait ... ");

            const url = "/lmteams/taskdetails/" + team + "/" + task;

           modal.find(".modal-body").load(url,function( response, status, xhr ) {
               if ( status == "error" ) {
                   var msg = "Sorry but there was an error: ";
                   modal.find('.modal-body').html( msg + xhr.status + " " + xhr.statusText );
               }
           });

        })

        var oldClassProgress ="";
        $('#add-task-progress').on('show.bs.modal', function (event) {
            const handler = $(event.relatedTarget) // Button that triggered the modal
            const team = handler.data('team');
            const task = handler.data('task');
            const progress = handler.data('progress');
            const colorClass = handler.data('colorclass');
            const modal = $(this)
            modal.find(".modal-header").removeClass(oldClassProgress);
            modal.find(".modal-footer").removeClass(oldClassProgress);
            modal.find(".modal-header").addClass("bg-"+colorClass);
            modal.find(".modal-footer").addClass("bg-"+colorClass);
            modal.find('#team_task_id').val(task);
            modal.find('#team_team_id').val(team);
            modal.find('#progress-percentage').attr("min",progress);
            modal.find('#progress-percentage').val(progress);
            oldClassProgress = "bg-"+colorClass;

        })

        var oldClassComment ="";
        $('#add-task-comment').on('show.bs.modal', function (event) {
            const handler = $(event.relatedTarget) // Button that triggered the modal
            const team = handler.data('team');
            const task = handler.data('task');
            const colorClass = handler.data('colorclass');
            const modal = $(this)
            modal.find(".modal-header").removeClass(oldClassComment);
            modal.find(".modal-footer").removeClass(oldClassComment);
            modal.find(".modal-header").addClass("bg-"+colorClass);
            modal.find(".modal-footer").addClass("bg-"+colorClass);
            modal.find('#team_task_id_comment').val(task);
            modal.find('#team_team_id_comment').val(team);
            oldClassComment = "bg-"+colorClass;

        })

        $("form#add-task-progress-form").submit( function(event){
           event.preventDefault();
           const url = "{{route('lmteams-team-task-addprogress')}}";
           const  formData = $(this).serialize();
            $.ajax({
                url: url,
                type: "get",
                data:formData,
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
        });

        $("form#add-task-comment-form").submit( function(event){
            event.preventDefault();
            const url = "{{route('lmteams-team-task-addcomment')}}";
            const  formData = $(this).serialize();
            $.ajax({
                url: url,
                type: "get",
                data:formData,
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
        });
    })

    </script>
@endsection
