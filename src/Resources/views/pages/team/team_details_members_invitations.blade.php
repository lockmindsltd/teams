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
                        <div class="alert-icon"><i class="flaticon-danger"></i></div>
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


            <!--begin::Aside-->
            <div class="col-md-4">
                @php $color = $team['team_enabled'] ? "green" : "red"; @endphp
                <!--begin::Profile Card-->
                <div class="card card-custom card-stretch" style="border-top: solid {{$color}} 3px;">
                    <!--begin::Body-->
                    <div class="card-body pt-4">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end">
                            <div class="dropdown dropdown-inline">
                                <a href="#" class="btn btn-clean btn-hover-light-danger btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-danger">
                                    {{$team['team_name']}}
                                </a>
                                <div class="text-muted">
                                     Members
                                </div>
                                @can('edit teams')<div class="mt-2">
{{--                                    <a href="#add-team-members" data-toggle="modal" data-backdrop="false" class="btn btn-sm btn-danger font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Add Member</a>--}}
                                    <a href="{{route('lmteams-team-members-invite',['id'=>$team['id']])}}"  class="btn btn-sm btn-warning font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Add Member</a>
                                </div>
                                @endcan
                            </div>
                        </div>
                        <!--end::User-->

                        <!--begin::Contact-->
                        <div class="py-9">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-muted text-hover-danger">{{$team['team_description']}}</span>
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

                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                Invitations
                                <small>View invitation status</small>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card-bodsy">
                    @php
                        $invs = \Lockminds\Teams\Models\LockmindsInvitations::Where("invitation_team",$team['id'])->leftJoin('users', 'invitation_member', '=', 'users.id')->get();
                    @endphp

                    @if($invs->count()>0)
                        @foreach($invs as $item)
                            <!--begin::Item-->
                                @php
                                    $invitor = App\User::find($item['invitation_invitor']);
                                    if(!$item['invitation_status']){
                                        $statusClass = "bg-light--warning";
                                    }else{
                                        $statusClass = "bg-light-dark";
                                    }
                                @endphp
                                <div id="team-{{$item['intitation_team']}}" class="shadow mb-3 {{$statusClass}} rounded p-5">
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 mr-2">
                                        <p><span class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1"><span class="font-size-h3">{{$item['first_name'].' '.$item['last_name']}}</span> </span></p>
                                        <p><b>{{nl2br($item['invitation_message'])}}</b></p>
                                    </div>
                                    <!--end::Title-->

                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <hr/>
                                            <h6>Invitation Status</h6>
                                            @if(!$item['invitation_status'])
                                                <h3>Pending</h3>
                                            @else
                                                <h3>Declined</h3>
                                                <p>{{nl2br($item['invitation_reason'])}}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            <!--begin::Lable-->
                                            @can('edit teams')
                                                <a onclick="decline({{$item['invitation_member']}})" href="#"><span class="btn btn-sm btn-warning  font-weight-bolder py-1 font-size-lg">Cancel</span></a>
                                                <!--end::Lable-->
                                            @endcan
                                        </div>
                                    </div>

                                </div>
                                <!--end::Item-->
                            @endforeach
                        @endif
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Contacts-->
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    @can('edit teams')
    <div class="modal fade" id="add-team-members" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                                            <option value="{{$freelancer->id}}">{{$freelancer->first_name.' '.$freelancer->last_name."-".$freelancer->id}}</option>
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
    @endcan
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

        function decline(member){
            let data = {'team':'{{$team['id']}}','member':member}
            Swal.fire({
                title: "Are you sure?",
                text: "You want to Cancel invitation",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Accept!"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "{{route('lmtools-decline-invitation')}}",
                        data: data,
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
                                $("div#team-"+team).hide();
                            }else {
                                Swal.fire("", result.message, "warning");
                            }
                        },
                        error: function(xhr){
                            KTApp.unblockPage();
                            Swal.fire("",xhr.statusText,'warning');
                        }
                    })
                }
            });
        }


    </script>


@endsection
