@php
    $user = \App\User::find(Auth::user()->id);
@endphp

{{-- Extends layout --}}
@extends('taskmanager::layout.default')

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
                                                <span class="navi-text">New team</span>
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
                                <div class="symbol-label" style="background-image:url({{ config("app.url").$user->image}})"></div>
                                <i class="symbol-badge bg-success"></i>
                            </div>
                            <div>
                                <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                                    {{$user->first_name.' '.$user->last_name}}
                                </a>
                                <div class="text-muted">
                                    @if(!empty($user->user_type))
                                        @php echo substr($user->user_type, strrpos($user->user_type, '_' )) @endphp
                                    @endif
                                </div>
                                <div class="mt-2">
                                    <a href="#create-team" data-toggle="modal" data-backdrop="false" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Create Tean</a>
                                </div>
                            </div>
                        </div>
                        <!--end::User-->

                        <!--begin::Contact-->
                        <div class="py-9">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">Email:</span>
                                <a href="#" class="text-muted text-hover-primary">{{$user->email}}</a>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">Phone:</span>
                                <span class="text-muted">{{$user->mobile_number}}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="font-weight-bold mr-2">Location:</span>
                                <span class="text-muted">{{$user->city_id}}</span>
                            </div>
                        </div>
                        <!--end::Contact-->

                        <!--begin::Nav-->
                        <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                            @include("taskmanager::pages.team.team_list_vertical")
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
                <div class="row">
                    <div class="col-12">
                        <div class="card card-custom card-stretch">
                            <div class="card-header">
                                <h3 class="card-title">Create a Team</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" class="kt-form" id="create-team-form" enctype='multipart/form-data'>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <label>Team Name <b class="text-danger">*</b></label>
                                            <input class="form-control" name="team_name" placeholder="Team name" required />
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <label>Team Icon</label>
                                            <input class="form-control" name="team_icon" type="file" />
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <label>Team Description <b class="text-danger">*</b></label>
                                            <Textarea class="form-control" name="team_description" placeholder="Team Description" required ></Textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group align-item-right">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4 pull-right align-item-right">
                                            <button type="submit" class="btn btn-dark pull-right">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Contacts-->
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset(config("taskmanager.layout.assets_folder").'/js/pages/widgets.js') }}" type="text/javascript"></script>

    <div class="modal fade" id="create-team" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content" style="border:0px;">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Create Team</h5>
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
                    <form method="post" class="kt-form" id="create-team-form" enctype='multipart/form-data'>
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Team Name <b class="text-danger">*</b></label>
                                <input class="form-control" name="team_name" placeholder="Team name" required />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Team Icon</label>
                                <input class="form-control" name="team_icon" type="file" />
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Team Description <b class="text-danger">*</b></label>
                                <Textarea class="form-control" name="team_description" placeholder="Team Description" required ></Textarea>
                            </div>
                        </div>
                        <div class="row form-group align-item-right">
                            <div class="col-md-8"></div>
                            <div class="col-md-4 pull-right align-item-right">
                                <button type="submit" class="btn btn-dark pull-right">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-dark">
                    <small class="text-muted font-size-sm ml-2"> &copy <?php echo date('Y') ;?> {{config("app.name")}} | Create Team</small>
                </div>
            </div>
        </div>
    </div>

@endsection
