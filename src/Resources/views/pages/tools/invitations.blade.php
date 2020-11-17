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
        <div class="row">
            <div class="col-12 card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bolder text-dark">Invitations</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0">
                @php
                    $invs = \Lockminds\Teams\Models\LockmindsInvitations::Where("invitation_member",$user->id)->leftJoin('lockminds_teams', 'invitation_team', '=', 'lockminds_teams.id')->get();
                @endphp

                @if($invs->count()>0)
                    @foreach($invs as $item)
                        <!--begin::Item-->
                        @php
                        $invitor = App\User::find($item['invitation_invitor']);
                        @endphp
                    <div id="team-{{$item['intitation_team']}}" class=" mb-9 bg-light-warning rounded p-5">
                            <!--begin::Title-->
                            <div class="d-flex flex-column flex-grow-1 mr-2">
                                <p>You have been invited by <span class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1"><span class="font-size-h3">{{$invitor->first_name.' '.$invitor->last_name}}</span> to Join <span class="font-size-h3">{{$item['team_name']}}</span></span> </p>
                                <p><b>{{nl2br($item['invitation_message'])}}</b></p>
                            </div>
                            <!--end::Title--><hr/>
                        <div class="row">
                            <div class="col-md-8">
                                @if(!$item['invitation_status'])
                                    <h3>Pending</h3>
                                @else
                                    <h3>Declined</h3>
                                    <p>{{nl2br($item['invitation_reason'])}}</p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <!--begin::Lable-->
                                <a onclick="accept({{$item['invitation_team']}})" href="#"><span class="btn btn-sm btn-success font-weight-bolder font-size-lg pull-right">Accept</span></a>&nbsp
                                <a onclick="decline({{$item['invitation_team']}})" href="#"><span class="btn btn-sm btn-warning  font-weight-bolder font-size-lg pull-right">Decline</span></a>
                                <!--end::Lable-->
                            </div>
                        </div>

                    </div>
                    <!--end::Item-->
                        @endforeach
                    @endif
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script>
        function accept(team){
            let data = {'team':team,'member':'{{$user->id}}'}
            Swal.fire({
                title: "Are you sure?",
                text: "You want to accept invitation",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Accept!"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "{{route('lmtools-accept-invitation')}}",
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
                                window.location.href = "{{route('lmteams-team-details-red')}}?team="+team;
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

        function decline(team){

            var reason = prompt("Please enter a reason for not accepting", "");
            if (reason != null && reason != "") {
                let data = {'team':team,'member':'{{$user->id}}','reason':reason}
                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to decline invitation",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Accept!"
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: "{{route('lmtools-decline-invitation-update')}}",
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
            }else{
                Swal.fire("", "You just provide a reason", "warning");
            }


        }

    </script>
@endsection
