{{-- Extends layout --}}
@extends('teams::layout.default_custom')

@section("subheader")
    @include('teams::pages.tasks.subheader')
@endsection
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

        <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class=" container-fluid ">
                    <!--begin::Todo-->
                    <div class="d-flex flex-row">
                        @include('teams::pages.tasks.aside_menu')

                <!--begin::List-->
                <div class="flex-row-fluid ml-lg-8">
                    <div class="d-flex flex-column flex-grow-1">
                        @include("teams::pages.tasks.header_menu")

                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-12">
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch" id="kt_todo_list">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center flex-wrap py-6 border-0 h-auto">
                                       <h3>On Progress Tasks</h3>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div class="card-body p-0">
                                        <!--begin::Responsive container-->
                                        <div class="table-responsive">

                                            @php
                                                $tasksModel = new \Lockminds\Teams\Models\LockmindsTeamTasks();
                                                $tasks = $tasksModel::Where('task_status',"on progress")->Where('task_responsible',$user->id)->leftJoin('lockminds_teams','lockminds_team_tasks.task_team','lockminds_teams.id')->get();

                                                    foreach ($tasks as $task){
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
                                                                    ?>
                                                            <!--begin::Items-->
                                                                <a href="#task-details" data-toggle="modal" data-backdrop="false" data-task="<?= $task['id']?>" data-team="<?=$task['task_team']?>" data-colorclass="<?=$colorClass?>" class="list list-hover min-w-500px" data-inbox="list">
                                                                    <!--begin::Item-->
                                                                    <div class="d-flex align-items-start list-item card-spacer-x py-4" data-inbox="message">

                                                                        <!--begin::Info-->
                                                                        <div class="flex-grow-1 mt-1 mr-2" data-toggle="view">
                                                                            <!--begin::Title-->
                                                                            <div class="font-weight-bolder mr-2 text-dark"><?= $task['task_title']?></div>
                                                                            <!--end::Title-->

                                                                            <!--begin::Labels-->
                                                                            <div class="mt-2">
                                                                                <span class="label label-light-dark font-weight-bold label-inline"><?= $task['team_name']?></span>
                                                                                <span class="label label-light-primary text-primary font-weight-bold label-inline">responsible: <?= $responsible->first_name.' '.$responsible->last_name?></span>
                                                                                <span class="label label-light-<?= $colorClass?> font-weight-bold label-inline"><?= $task['task_status']?></span>
                                                                                <span class="label label-light-<?= $colorClass?> font-weight-bold label-inline"><?= $task['task_progress']?>%</span>
                                                                            </div>
                                                                            <!--end::Labels-->
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::Details-->
                                                                        <div class="d-flex align-items-center justify-content-end flex-wrap" data-toggle="view">
                                                                            <!--begin::Datetime-->
                                                                            <div class="font-weight-bolder text-<?= $colorClass?>" data-toggle="view">
                                                                                <?= (new \Moment\Moment(date('Y-m-d H:i:s',strtotime($task['task_start'])), 'CET'))->calendar() ?>
                                                                            </div>
                                                                            <!--end::Datetime-->

                                                                            <!--begin::User Photo-->
                                                                            <span class="symbol symbol-30 ml-3">
                                                                                <span class="symbol-label" style="background-image: url(<?=asset($responsible->image) ?>)"></span>
                                                                            </span>
                                                                            <!--end::User Photo-->
                                                                        </div>
                                                                        <!--end::Details-->
                                                                    </div>
                                                                    <!--end::Item-->
                                                                </a>
                                                                <!--end::Items-->
                                                       <?php }

                                            @endphp

                                        </div>
                                        <!--end::Responsive container-->

                                        @include("teams::pages.tasks.pagination")
                                    </div></div>
                                    <!--end::Body-->
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                        </div>
                        <!--end::List-->
                    </div>
                    <!--end::Todo-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->

    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    @include('teams::pages.tasks.scripts')
@endsection
