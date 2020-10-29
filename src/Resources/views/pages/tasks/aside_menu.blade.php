<!--begin::Aside-->
<div class="flex-row-auto offcanvas-mobile w-200px w-xxl-275px" id="kt_todo_aside">
    <!--begin::Card-->
    <div class="card card-custom card-stretch">
        <!--begin::Body-->
        <div class="card-body px-5">
            <!--begin:Nav-->
            <div class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">
                <!--begin:Item-->
                <div class="navi-item my-2">
                    <a href="{{route('lmtasks')}}" class="navi-link @if(request()->routeIs('lmtasks')) active @endif">
                                                                <span class="navi-icon mr-4">
                                                                    <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-heart.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M13.8,4 C13.1562,4 12.4033,4.72985286 12,5.2 C11.5967,4.72985286 10.8438,4 10.2,4 C9.0604,4 8.4,4.88887193 8.4,6.02016349 C8.4,7.27338783 9.6,8.6 12,10 C14.4,8.6 15.6,7.3 15.6,6.1 C15.6,4.96870845 14.9396,4 13.8,4 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>                    </span>
                        <span class="navi-text font-weight-bolder font-size-lg">All Tasks</span>
                        <span class="navi-label">
                                                    @php
                                                        $tasksModel = new \Lockminds\Teams\Models\LockmindsTeamTasks();
                                                        $number = $tasksModel::where("task_responsible",$user->id)->orWhere('task_creator',$user->id)->count();
                                                    @endphp
                                                    <span class="label label-rounded label-light-success font-weight-bolder">{{$number}}</span>
                                                 </span>
                    </a>
                </div>
                <!--end:Item-->

                <!--begin:Item-->
                <div class="navi-item my-2">
                    <a href="{{route('lmtasks-new')}}" class="navi-link @if(request()->routeIs('lmtasks-new')) active @endif">
                                                 <span class="navi-icon mr-4">
                                                                    <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Half-star.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M12,4.25932872 C12.1488635,4.25921584 12.3000368,4.29247316 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 L12,4.25932872 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M12,4.25932872 L12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.277344,4.464261 11.6315987,4.25960807 12,4.25932872 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                                 </span>
                        <span class="navi-text font-weight-bolder font-size-lg">New Tasks</span>
                        <span class="navi-label">
                                                    @php
                                                        $tasksModel = new \Lockminds\Teams\Models\LockmindsTeamTasks();
                                                        $number = $tasksModel::where('task_status','new')->Where('task_responsible',$user->id)->count();
                                                    @endphp
                                                        <span class="label label-rounded label-light-success font-weight-bolder">{{$number}}</span>
                                                </span>
                    </a>
                </div>
                <!--end:Item-->

                <!--begin:Item-->
                <div class="navi-item my-2">
                    <a href="{{route('lmtasks-progress')}}" class="navi-link @if(request()->routeIs('lmtasks-progress')) active @endif">
                    <span class="navi-icon mr-4">
                        <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>                    </span>
                        <span class="navi-text font-weight-bolder font-size-lg">On Progress</span>
                        <span class="navi-label">
                                                    @php
                                                        $tasksModel = new \Lockminds\Teams\Models\LockmindsTeamTasks();
                                                        $number = $tasksModel::where('task_status','on progress')->Where('task_responsible',$user->id)->count();
                                                    @endphp
                                                        <span class="label label-rounded label-light-success font-weight-bolder">{{$number}}</span>
                                                </span>
                    </a>
                </div>
                <!--end:Item-->

                <!--begin:Item-->
                <div class="navi-item my-2">
                    <a href="{{route('lmtasks-complete')}}" class="navi-link @if(request()->routeIs('lmtasks-complete')) active @endif">
                                               <span class="navi-icon mr-4">
                                                                        <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Sending.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M8,13.1668961 L20.4470385,11.9999863 L8,10.8330764 L8,5.77181995 C8,5.70108058 8.01501031,5.63114635 8.04403925,5.56663761 C8.15735832,5.31481744 8.45336217,5.20254012 8.70518234,5.31585919 L22.545552,11.5440255 C22.6569791,11.5941677 22.7461882,11.6833768 22.7963304,11.794804 C22.9096495,12.0466241 22.7973722,12.342628 22.545552,12.455947 L8.70518234,18.6841134 C8.64067359,18.7131423 8.57073936,18.7281526 8.5,18.7281526 C8.22385763,18.7281526 8,18.504295 8,18.2281526 L8,13.1668961 Z" fill="#000000"/>
                                                        <path d="M4,16 L5,16 C5.55228475,16 6,16.4477153 6,17 C6,17.5522847 5.55228475,18 5,18 L4,18 C3.44771525,18 3,17.5522847 3,17 C3,16.4477153 3.44771525,16 4,16 Z M1,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L1,13 C0.44771525,13 6.76353751e-17,12.5522847 0,12 C-6.76353751e-17,11.4477153 0.44771525,11 1,11 Z M4,6 L5,6 C5.55228475,6 6,6.44771525 6,7 C6,7.55228475 5.55228475,8 5,8 L4,8 C3.44771525,8 3,7.55228475 3,7 C3,6.44771525 3.44771525,6 4,6 Z" fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                               </span>
                        <span class="navi-text font-weight-bolder font-size-lg">Complete Tasks</span>
                        <span class="navi-label">
                                                    @php
                                                        $tasksModel = new \Lockminds\Teams\Models\LockmindsTeamTasks();
                                                        $number = $tasksModel::where('task_status','completed')->Where('task_responsible',$user->id)->count();
                                                    @endphp
                                                        <span class="label label-rounded label-light-success font-weight-bolder">{{$number}}</span>
                                                </span>
                    </a>
                </div>
                <!--end:Item-->


{{--                <!--begin:Section-->--}}
{{--                <div class="navi-section mt-7 mb-2 font-size-h6 font-weight-bold pb-0">Teams</div>--}}
{{--                <!--end:Section-->--}}
{{--            @php--}}
{{--                $teamModel = new \Lockminds\Teams\Models\LockmindsTeams();--}}
{{--                $teams = $teamModel::all();--}}
{{--            @endphp--}}
{{--            @if(!empty($teams))--}}
{{--                @foreach($teams as $team)--}}
{{--                    @if(\Lockminds\Teams\Teams::isTeaMember($team['id'],$user->id) > 0)--}}
{{--                        @php--}}
{{--                            $tasksModel = new \Lockminds\Teams\Models\LockmindsTeamTasks();--}}
{{--                            $tasks = $tasksModel::where("task_team",$team['id'])->get();--}}
{{--                        @endphp--}}
{{--                        <!--begin:Item-->--}}
{{--                            <div class="navi-item my-2">--}}
{{--                                <a href="#" class="navi-link">--}}
{{--                                                                        <span class="navi-icon mr-4">--}}
{{--                                                                            <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                            <polygon points="0 0 24 0 24 24 0 24"/>--}}
{{--                                                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"/>--}}
{{--                                                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "/>--}}
{{--                                                            </g>--}}
{{--                                                            </svg><!--end::Svg Icon--></span>                    </span>--}}
{{--                                    <span class="navi-text font-weight-bolder font-size-lg">{{$team['team_name']}}</span>--}}
{{--                                    <span class="navi-label">--}}
{{--                                                                            <span class="label label-rounded label-light-success font-weight-bold">{{$tasks->count()}}</span>--}}
{{--                                                                        </span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <!--end:Item-->--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                @endif--}}

            </div>
            <!--end:Nav-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
</div>
<!--end::Aside-->
