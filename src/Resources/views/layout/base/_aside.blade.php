{{-- Aside --}}
<!-- plugins:css -->
<link rel="stylesheet" href="{{ url('Dashboard/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{ url('Dashboard/vendors/css/vendor.bundle.base.css')}}">
<link rel="stylesheet" href="{{ url('Dashboard/vendors/css/vendor.bundle.addons.css')}}">
@php
    $kt_logo_image = 'logo-light.png';
@endphp

@if (config('brand.self.theme') === 'light')
    @php $kt_logo_image = 'logo-dark.png' @endphp
@elseif (config('brand.self.theme') === 'dark')
    @php $kt_logo_image = 'logo-light.png' @endphp
@endif

<div class="aside aside-left {{ \Lockminds\Teams\Classes\Metronic::printClasses('aside', false) }} d-flex flex-column flex-row-auto" id="kt_aside"  >

    {{-- Brand --}}
    <div class="brand flex-column-auto {{ \Lockminds\Teams\Classes\Metronic::printClasses('brand', false) }}" id="kt_brand">
        <div class="brand-logo">
            <a href="{{ url('/') }}">
                <img alt="{{ config('app.name') }}" style="height: 90px; width: 100%;" src="https://worknasiplus.com/images/worknasiplus.png"/>
            </a>
        </div>

        @if (config('aside.self.minimize.toggle'))
            <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                {{ \Lockminds\Teams\Classes\Metronic::getSVG("media/svg/icons/Navigation/Angle-double-left.svg", "svg-icon-xl") }}
            </button>
        @endif

    </div>

    {{-- Aside menu --}}
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        @if (config('lm_team_aside.self.display') === false)
            <div class="header-logo">
                <a href="{{ url('/') }}">
                    <img alt="{{ config('app.name') }}" style="height: 90px; width: 100%;" src="https://worknasiplus.com/images/worknasiplus.png"/>
                </a>
            </div>
        @endif

        <br>
        <a href="/post-project">

          <button class="workspace_btn btn btn-warning btn-lg" style=" border-color:#f05a28;  background-color: #f05a28;">Post A Job

          <i class="mdi mdi-plus"></i>
        </button>
      </a>

      <br>
      <a href="/lmteams">

        <button class="workspace_btn btn btn-warning btn-lg" style=" border-color:#f05a28;  background-color: #f05a28;">Create Team

        <i class="mdi mdi-plus"></i>
      </button>
    </a>


        <div id="kt_aside_menu"
             class="aside-menu my-4 {{ \Lockminds\Teams\Classes\Metronic::printClasses('aside_menu', false) }}"
             data-menu-vertical="1"
            {{ \Lockminds\Teams\Classes\Metronic::printAttrs('aside_menu') }}>

            <ul class="menu-nav {{ \Lockminds\Teams\Classes\Metronic::printClasses('aside_menu_nav', false) }}">
                @if(Auth::user()->user_type=="fl_admin")

                    <li class="menu-item @if(request()->routeIs('lmtasks')) menu-item-active @endif" aria-haspopup="true" >
                        <a  href="/freelancer" class="menu-link ">
                            <i class="menu-icon mdi mdi-television"></i>

                            <span class="menu-text">Dashboard         </span></a>
                    </li>

                    <li class="menu-item @if(request()->routeIs('lmtasks')) menu-item-active @endif" aria-haspopup="true" >
                        <a  href="/browse-jobs" class="menu-link " >
                            <i class="menu-icon mdi mdi-gavel "></i>


                            <span class="menu-text">Bid Jobs</span></a>
                    </li>



                    <li class="menu-item @if(request()->routeIs('lmtasks')) menu-item-active @endif" aria-haspopup="true" >
                        <a  href="/freelancer/jobsapplied" class="menu-link ">

                            <i class="menu-icon mdi mdi-briefcase"></i>


                            <span class="menu-text" >Jobs Applied </span></a>
                    </li>





                    <li class="menu-item @if(request()->routeIs('lmtasks')) menu-item-active @endif" aria-haspopup="true" >
                        <a  href="/freelancer/jobsawarded" class="menu-link ">

                            <i class="menu-icon mdi mdi-trophy-award"></i>


                            <span class="menu-text">Jobs Awarded       </span> </a>
                    </li>




                    <li class="menu-item @if(request()->routeIs('lmtasks')) menu-item-active @endif" aria-haspopup="true" >
                        <a  href="/freelancer/myprojects" class="menu-link ">

                            <i class="menu-icon mdi mdi-folder-multiple"></i>


                            <span class="menu-text" > My Projects</span></a>
                    </li>




                    <li class="menu-item @if(request()->routeIs('lmtasks')) menu-item-active @endif" aria-haspopup="true" >
                        <a  href="/freelancer/mytransactions" class="menu-link ">
                            <i class="menu-icon mdi mdi-credit-card"></i>
                            <span class="menu-text">My Transactions</span></a>
                    </li>




                @endif


                @if(Auth::user()->user_type=="em")

                    <li class="menu-item @if(request()->routeIs('lmtasks')) menu-item-active @endif" aria-haspopup="true" >
                        <a  href="/employer" class="menu-link ">
                            <i class="menu-icon mdi mdi-television"></i>

                            <span class="menu-text">Dashboard         </span></a>
                    </li>



                    <li class="menu-item @if(request()->routeIs('lmtasks')) menu-item-active @endif" aria-haspopup="true" >
                        <a  href="/employer/myjobs" class="menu-link ">

                            <i class="menu-icon mdi mdi-folder-multiple"></i>


                            <span class="menu-text" > My Jobs</span></a>
                    </li>


                    <li class="menu-item @if(request()->routeIs('lmtasks')) menu-item-active @endif" aria-haspopup="true" >
                        <a  href="/employer/mybids" class="menu-link ">

                            <i class="menu-icon mdi mdi-folder-multiple"></i>


                            <span class="menu-text" > Bids</span></a>
                    </li>




                    <li class="menu-item @if(request()->routeIs('lmtasks')) menu-item-active @endif" aria-haspopup="true" >
                        <a  href="/employer/mytransactions" class="menu-link ">

                            <i class="menu-icon mdi mdi-credit-card"></i>


                            <span class="menu-text" > My Transactions</span></a>
                    </li>

                    <li class="menu-item @if(request()->routeIs('lmtasks')) menu-item-active @endif" aria-haspopup="true" >
                        <a  href="/employer/jobshistory" class="menu-link ">

                            <i class="menu-icon mdi mdi-briefcase"></i>


                            <span class="menu-text" > Job History</span></a>
                    </li>








                @endif







                <li class="menu-item @if(request()->routeIs('lmteams')) menu-item-active @endif" aria-haspopup="true" >
                    <a  href="{{route('lmteams')}}" class="menu-link ">
                        <i class="menu-icon mdi mdi-account"></i>

                        <span class="menu-text">Teams</span>
                    </a>
                </li>



                <li class="menu-item @if(request()->routeIs('lmtasks')) menu-item-active @endif" aria-haspopup="true" >
                    <a  href="{{route('lmtasks')}}" class="menu-link "><span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                           <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                        <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                        <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                            <!--end::Svg Icon-->
                        </span>

                        <span class="menu-text">Tasks @php
                                $tasksModel = new \Lockminds\Teams\Models\LockmindsTeamTasks();
                                $number = $tasksModel::where('task_status','new')->Where('task_responsible',$user->id)->count();
                            @endphp
                            @if($number > 0) &nbsp<span class="label label-sm label-rounded label-danger font-weight-bolder">{{$number}}</span></span> @endif
                    </a>
                </li>




                <li class="menu-item @if(request()->routeIs('lmtools-messages')) menu-item-active @endif" aria-haspopup="true" >
                    <a  href="{{route('lmtools-messages')}}" class="menu-link ">
                        <i class="menu-icon mdi mdi-message-text"></i>

                        @php
                            $unred = 0;
                            $database = app('firebase.database');
                            $reference = $database->getReference('member_chats/member_'.$user->id);
                            $chats= $reference->getValue();
                        @endphp

                        @if(!empty($chats) && count($chats)>0)
                            @foreach($chats as $key => $item)
                                @php
                                    $raw = explode("_",$key);
                                    $friend = \App\User::find($raw[1]);
                                @endphp
                                @php
                                    $unred = 0;
                                    $text = "";
                                     foreach ($item as $itum){
                                            if($itum['from'] != "member_".$user->id && !$itum['seen']){
                                               $unred++;
                                            }
                                        }
                                @endphp
                            @endforeach
                        @endif
                        <span class="menu-text">Messages &nbsp @if($unred > 0) <span class="label label-sm label-rounded label-danger">{{$unred}}</span>@endif</span>
                    </a>
                </li>



                <li class="menu-item @if(request()->routeIs('lmtools-invitations')) menu-item-active @endif" aria-haspopup="true" >
                    <a  href="{{route('lmtools-invitations')}}" class="menu-link "><span class="svg-icon menu-icon">
                          <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Notification2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"/>
                                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                          </span>
                        </span>
                        @php
                            $invs = \Lockminds\Teams\Models\LockmindsInvitations::Where("invitation_member",$user->id)->leftJoin('lockminds_teams', 'invitation_team', '=', 'lockminds_teams.id')->get();
                        @endphp
                        <span class="menu-text">Invitations &nbsp @if($count = $invs->count() > 0) <span class="label label-sm label-rounded label-danger">{{$count}}</span>@endif</span>
                    </a>
                </li>



            </ul>
        </div>

    </div>

</div>
