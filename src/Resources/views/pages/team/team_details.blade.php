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
        <div class="d-flex flex-row">


            <!--begin::Aside-->
            <div class="col-md-4" id="kt_profile_aside">
                <!--begin::Profile Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Body-->
                    <div class="card-body pt-4">

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
                            </div>
                        </div>
                        <!--end::User-->

                        <!--begin::Contact-->
                        <div class="py-9">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-muted text-hover-primary">{{mb_strimwidth($team['team_description'], 0, 200, "...")}}</span>
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
                <!--end::Profile Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="col-md-8">
                <div class="alert alert-secondary" role="alert">
                    {{nl2br($team['team_description'])}}
                </div>

{{--                <div class="card card-custom gutter-b">--}}
{{--                    <!--begin::Body-->--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="card-title">--}}
{{--                            <h3 class="card-label">--}}
{{--                                Team Members--}}
{{--                            </h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-toolbar">--}}
{{--                            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">--}}
{{--                                <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                    <i class="ki ki-bold-more-hor "></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right" style="">--}}
{{--                                    <!--begin::Navigation-->--}}
{{--                                    <ul class="navi navi-hover">--}}
{{--                                        <li class="navi-header font-weight-bold py-4">--}}
{{--                                            <span class="font-size-lg">Quick Actions</span>--}}
{{--                                            <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>--}}
{{--                                        </li>--}}
{{--                                        <li class="navi-separator mb-3 opacity-70"></li>--}}
{{--                                        <li class="navi-item">--}}
{{--                                            <a href="#" class="navi-link">--}}
{{--                                            <span class="navi-text">--}}
{{--                                                Block All Members--}}
{{--                                            </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="navi-item">--}}
{{--                                            <a href="#" class="navi-link">--}}
{{--                                            <span class="navi-text">--}}
{{--                                                Enable All Members--}}
{{--                                            </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="navi-separator mt-3 opacity-70"></li>--}}
{{--                                        <li class="navi-footer py-4">--}}
{{--                                            <a href="#add-team-members" data-toggle="modal" data-backdrop="false" class="btn btn-clean font-weight-bold btn-sm" href="#">--}}
{{--                                                <i class="ki ki-plus icon-sm"></i>--}}
{{--                                                Add new--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                    <!--end::Navigation-->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                @php $classes = array("success",'danger','info','brand','danger','dark'); @endphp--}}

{{--                @if(!empty($members))--}}

{{--                    @foreach($members as $member)--}}
{{--                        <!--begin::Col-->--}}
{{--                            @php--}}
{{--                                $color = $member['team_member_enabled'] ? "green" : "red";--}}
{{--                            @endphp--}}
{{--                            @if($member['team_member_id'] != $user->id)--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <!--begin::Card-->--}}
{{--                                    <div class="card card-custom gutter-b card-stretch " style="border-top: solid {{$color}} 3px;">--}}
{{--                                        <!--begin::Body-->--}}
{{--                                        <div class="card-body pt-4 d-flex flex-column justify-content-between ">--}}
{{--                                            <!--begin::Toolbar-->--}}
{{--                                            <div class="d-flex justify-content-end">--}}
{{--                                                <div class="dropdown dropdown-inline">--}}
{{--                                                    <a href="#" class="btn btn-clean btn-hover-light-danger btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                        <i class="ki ki-bold-more-hor"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">--}}
{{--                                                        <!--begin::Navigation-->--}}
{{--                                                        <ul class="navi navi-hover py-5">--}}
{{--                                                            @if($member['team_member_enabled'])--}}
{{--                                                                <li class="navi-item">--}}
{{--                                                                    <a  href="javascript:(0);" data-team="{{$team['id']}}" data-member="{{$member['team_member_id']}}"  class="navi-link block-team-member">--}}
{{--                                                                        <span class="navi-icon"><i class="flaticon-circle"></i></span>--}}
{{--                                                                        <span class="navi-text">Block</span>--}}
{{--                                                                    </a>--}}
{{--                                                                </li>--}}
{{--                                                            @else--}}
{{--                                                                <li class="navi-item">--}}
{{--                                                                    <a  href="javascript:(0);" data-team="{{$team['id']}}" data-member="{{$member['team_member_id']}}"  class="navi-link enable-team-member">--}}
{{--                                                                        <span class="navi-icon"><i class="flaticon2-checkmark"></i></span>--}}
{{--                                                                        <span class="navi-text">Enable</span>--}}
{{--                                                                    </a>--}}
{{--                                                                </li>--}}
{{--                                                            @endif--}}
{{--                                                            <li class="navi-item">--}}
{{--                                                                <a  href="javascript:(0);" data-team="{{$team['id']}}" data-member="{{$member['team_member_id']}}"  class="navi-link remove-team-member">--}}
{{--                                                                    <span class="navi-icon"><i class="flaticon2-checkmark"></i></span>--}}
{{--                                                                    <span class="navi-text">Remove</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                        <!--end::Navigation-->--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Toolbar-->--}}
{{--                                            <!--begin::User-->--}}
{{--                                            <div class="d-flex align-items-center mb-7">--}}
{{--                                                <!--begin::Pic-->--}}
{{--                                                <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">--}}
{{--                                                    <div class="symbol symbol-75 mr-3">--}}
{{--                                                        <div class="symbol-label" style="background-image: url({{config("app.url").'/'.config("taskmanager.uploads_folder").$member['avatar']}})"></div>--}}
{{--                                                        <i class="symbol-badge bg-danger"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!--end::Pic-->--}}
{{--                                                <!--begin::Title-->--}}
{{--                                                <div class="d-flex flex-column">--}}
{{--                                                    <a href="#" class="text-dark font-weight-bold text-hover-danger font-size-h4 mb-0">{{ucwords(strtolower($member->first_name.' '.$member->last_name))}}</a>--}}
{{--                                                    <span class="text-muted font-weight-bold">@if($member->team_member_owner == $member->team_member_id) Admin @else Member @endif </span>--}}
{{--                                                </div>--}}
{{--                                                <!--end::Title-->--}}
{{--                                            </div>--}}
{{--                                            <!--end::User-->--}}
{{--                                            <!--begin::Desc-->--}}
{{--                                            <p class="mb-7">--}}
{{--                                                {{mb_strimwidth($member['biography'], 0, 200, "...")}}--}}
{{--                                            </p>--}}
{{--                                            <!--end::Desc-->--}}
{{--                                            <a href="{{route('lmteams-chatting',['team'=>$team['id'],'member'=>$member['team_member_id']])}}" class="btn btn-block btn-sm btn-light-danger font-weight-bolder text-uppercase py-4">Start Chatting</a>--}}
{{--                                        </div>--}}
{{--                                        <!--end::Body-->--}}
{{--                                    </div>--}}
{{--                                    <!--end::Card-->--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        <!--end::Col-->--}}
{{--                        @endforeach--}}
{{--                    @else--}}

{{--                        <div class="alert alert-danger col-12" role="alert">--}}
{{--                            This has no member(s) yet, Add One below--}}
{{--                        </div>--}}
{{--                        <form method="post" class="card col-12" id="create-team-form" enctype='multipart/form-data'>--}}
{{--                            @csrf--}}
{{--                            <br/>--}}
{{--                            <div class="row form-group">--}}
{{--                                <div class="col-12">--}}
{{--                                    <label>Pick Member(s) <b class="text-danger">*</b></label>--}}
{{--                                    <select multiple class="form-control members" name="members[]" placeholder="Team name" required>--}}

{{--                                        @if(!empty($users = \Illuminate\Foundation\Auth\User::all()))--}}
{{--                                            @foreach($users as $freelancer)--}}
{{--                                                <option value="{{$freelancer->id}}">{{$freelancer->first_name." ".$freelancer->first_name." - ".$freelancer->id}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        @endif--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row form-group">--}}
{{--                                <div class="col-12">--}}
{{--                                    <label>Welcome message <b class="text-danger">*</b></label>--}}
{{--                                    <Textarea class="form-control" name="welcome_message" placeholder="Team Description" required ></Textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row form-group align-item-right">--}}
{{--                                <div class="col-md-8"></div>--}}
{{--                                <div class="col-md-4 pull-right align-item-right">--}}
{{--                                    <button type="submit" class="btn btn-block btn-danger pull-right">Add Member(s)</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    @endif--}}
{{--                </div>--}}


            </div>
            <!--end::Content-->
        </div>
        <!--end::Contacts-->
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')

    <div class="modal fade" id="add-team-members" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content" style="border:0px;">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Team Members</h5>
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
                    <form method="post" class="card col-12" id="create-team-form" enctype='multipart/form-data'>
                        @csrf
                        <br/>
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Pick Member(s) <b class="text-danger">*</b></label>
                                <select style="width: 100%;" multiple class="form-control members" name="members[]" placeholder="Team name" required>

                                    @if(!empty($users = \Illuminate\Foundation\Auth\User::all()))
                                        @foreach($users as $freelancer)
                                            <option value="{{$freelancer->id}}">{{$freelancer->first_name.' '.$freelancer->first_name."-".$freelancer->id}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Welcome message <b class="text-danger">*</b></label>
                                <Textarea class="form-control" name="welcome_message" placeholder="Team Description" required ></Textarea>
                            </div>
                        </div>
                        <div class="row form-group align-item-right">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 pull-right align-item-right">
                                <button type="submit" class="btn btn-block btn-danger pull-right">Add Member(s)</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-dark">
                    <small class="text-muted font-size-sm ml-2"> &copy <?php echo date('Y') ;?> {{config("app.name")}} | Add Members</small>
                </div>
            </div>
        </div>
    </div>
    <script>

        $(function() {
            $('select.members').select2({placeholder: "Select Member(s)"})
            $("a.enable-team-member").click(function (event) {
                const member = $(this).data("member");
                const team = $(this).data("team");
                const url = "{{config('app.url')}}/lmteams/enable/" + team + "/" + member;

                Swal.fire({
                    title: "Are you sure?",
                    text: "You are about to set a Member to ENABLED STATE",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, SET ENABLED!"
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



            });
            $("a.block-team-member").click(function (event) {
                const member = $(this).data("member");
                const team = $(this).data("team");
                const url = "{{config('app.url')}}/lmteams/block/" + team + "/" + member;

                Swal.fire({
                    title: "Are you sure?",
                    text: "You are about to set a Member to BLOCKED STATE",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, SET BLOCKED!"
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
            });
            $("a.remove-team-member").click(function (event) {
                const member = $(this).data("member");
                const team = $(this).data("team");
                const url = "{{config('app.url')}}/lmteams/remove/" + team + "/" + member;

                Swal.fire({
                    title: "Are you sure?",
                    text: "You are about to set a Member to REMOVE THIS MEMBER",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, ROMEVE!"
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
            });
        });

    </script>
@endsection
