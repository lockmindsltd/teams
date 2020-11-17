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


            <!--begin::Aside-->
            <div class="col-md-4">
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
                                    <a href="#add-team-member" data-toggle="modal" data-backdrop="false" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Add Member</a>
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
                <!--end::Profile Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="col-md-8 " id="kt_chat_content" >

                <div id="read-chats" class="card card-custom card-stretch" style="display: none;">
                    <!--begin::Header-->
                    <div class="card-header align-items-center px-4 py-3">
                        <div class="text-left flex-grow-1">
                            <!--begin::Aside Mobile Toggle-->
                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none" id="kt_app_chat_toggle">
                        <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Adress-book2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3"></path>
                                    <path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"></path>
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>
                            </button>
                            <!--end::Aside Mobile Toggle-->
                        </div>
                        <div class="text-center text-center">
                            <div class="symbol-group symbol-hover justify-content-center">
                                <h3 class="card-title">Chat Room</h3>
                            </div>
                        </div>
                        <div class="text-right flex-grow-1">
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"></polygon>
        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
    </g>
</svg><!--end::Svg Icon--></span>                        </button>
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover py-5">
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                                <span class="navi-text">Mute Notification Sounds</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="flaticon2-list-3"></i></span>
                                                <span class="navi-text">Mute Chat Sounds</span>
                                            </a>
                                        </li>

                                        <li class="navi-separator my-3"></li>

                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="flaticon2-magnifier-tool"></i></span>
                                                <span class="navi-text">Help</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
                                                <span class="navi-text">Privacy</span>
                                                <span class="navi-link-badge">
                                                    <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="javascript:attemptLogout();" class="navi-link">
                                                <span class="navi-icon"><i class="flaticon2-lock"></i></span>
                                                <span class="navi-text">Go Offline</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Scroll-->
                        <div id="messages" class="messages scroll scroll-pull" style="height: 344px; overflow-y: scroll;"  data-mobile-height="350" >
                            <!--begin::Messages-->

                            <!--end::Messages-->
                            <!--end::Scroll-->
                        </div>
                    </div>
                    <!--end::Body-->

                    <!--begin::Footer-->
                    <div class="card-footer align-items-center">
                        <!--begin::Compose-->
                        <textarea id="message" class="form-control border-0 p-0" rows="2" placeholder="Type a message"></textarea>
                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <div class="mr-3">
                                <a href="#" class="btn btn-clean btn-icon btn-md mr-1"><i class="flaticon2-photograph icon-lg"></i></a>
                                <a href="#" class="btn btn-clean btn-icon btn-md"><i class="flaticon2-photo-camera  icon-lg"></i></a>
                            </div>
                            <div>
                                <button onclick="sendMessage()" type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
                            </div>
                        </div>
                        <!--begin::Compose-->
                    </div>
                    <!--end::Footer-->
                </div>

                <div id="firebase-login" style="display: none">
                    <div class="card card-custom bg-light gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0">
                            <h3 class="card-title font-weight-bold text-danger">You are OFFLINE, please provide your details to be online</h3>
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-2">
                            <!--begin::Form-->
                            <div class="form-group">
                                <input id="attempt-login-email" value="{{$user->email}}" readonly type="text" class="form-control border-0" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input id="attempt-login-password" type="password" class="form-control border-0" name="name" placeholder="Password">
                            </div>
                            <div class="mt-10">
                                <button onclick="attemptLogin()" class="btn btn-primary font-weight-bold">Submit</button>
                            </div>

                            <!--end::Form-->
                        </div>
                        <!--end::Body-->
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
    <script>

        $(function(){
            // Get the input field
            let input = document.getElementById("message");

            input.addEventListener("keydown", ({key}) => {
                //key.preventDefault();

                if (key.shiftKey) {
                    alert("");
                }


                if (key === "Enter") {
                    sendMessage()
                }

            });

        })

        firebaseApp.auth().onAuthStateChanged(function(user) {
            if (user) {
                userData = user;
                promptLogin =  false;
                localFunctions()
            } else {
                promptLogin = true;
                displayLogin();
            }
        });

        function localFunctions(){
            readChats()
        }

        function sendMessage(){

            $( function(){

                let message = $('textarea#message');

                if(message.val().trim().length === 0)
                    return;
                let text = message.val().trim();
                message.val("");
                postMessage(text);
            });

        }

        function addMessageOut(message){
            $( function(){
                let container = $('div.messages');
                let content = "<!--begin::Message Out-->\n" +
                    "                                <div class=\"d-flex flex-column mb-5 align-items-end\">\n" +
                    "                                    <div class=\"d-flex align-items-center\">\n" +
                    "                                        <div>\n" +
                    "                                            <span class=\"text-muted font-size-sm\">"+moment(Number(message.date)).fromNow()+"</span>\n" +
                    "                                            <a href=\"#\" class=\"text-dark-75 text-hover-primary font-weight-bold font-size-h6\">You</a>\n" +
                    "                                        </div>\n"+
                    "                                    </div>\n" +
                    "                                    <div class=\"mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px\">\n" + message.message +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                                <!--end::Message Out-->";
                container.append(content);

                let objDiv = document.getElementById("messages");
                objDiv.scrollTop = objDiv.scrollHeight;
            })
        }

        function addMessageIn(message){
            if(message.name == undefined){
                name = "";
            }else{
                name = message.name;
            }
            let container = $('div.messages');
            let content = " <!--begin::Message In-->\n" +
                "                                <div class=\"d-flex flex-column mb-5 align-items-start\">\n" +
                "                                    <div class=\"d-flex align-items-center\">\n" +
                "                                        <div>\n" +
                "                                            <a href=\"#\" class=\"text-dark-75 text-hover-primary font-weight-bold font-size-h6\">"+name+"</a>\n" +
                "                                            <span class=\"text-muted font-size-sm\">"+moment(Number(message.date)).fromNow()+"</span>\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                    <div class=\"mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px\">\n" + message.message+
                "                                    </div>\n" +
                "                                </div>\n" +
                "                                <!--end::Message In-->";
            container.append(content);

            let objDiv = document.getElementById("messages");
            objDiv.scrollTop = objDiv.scrollHeight;

        }

        function addMessage(message){

            let dir = "end";
            let col = "bg-light-primary";


            if(message.sender == "{{$user->id}}"){

                dir = "end";
                col = "bg-light-primary";

            } else {

                dir = "start";
                col = "bg-light-info";
            }

            $( function(){
                let container = $('div.messages');
                let content = "<!--begin::Message Out-->\n" +
                    "                                <div class=\"d-flex flex-column mb-5 align-items-"+dir+"\">\n" +
                    "                                    <div class=\"d-flex align-items-center\">\n" +
                    "                                        <div>\n" +
                    "                                            <a href=\"#\" class=\"text-dark-75 text-hover-primary font-weight-bold font-size-h6\">"+message.name+"</a>\n" +
                    "                                            <span class=\"text-muted font-size-sm\">"+moment(Number(message.date)).fromNow()+"</span>\n" +
                    "                                        </div>\n"+
                    "                                    </div>\n" +
                    "                                    <div class=\"mt-2 rounded p-5  text-dark-50 font-weight-bold font-size-lg text-right max-w-400px "+col+"\">\n" + message.message +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                                <!--end::Message Out-->";
                container.append(content);

                let objDiv = document.getElementById("messages");
                objDiv.scrollTop = objDiv.scrollHeight;
            })
        }


        function postMessage(message){

            let currentDate = new Date().getTime().toString();

            let ref = firebaseDatabase.ref('team_chats/team_{{$team['id']}}');


            let key = ref.push().getKey();

            ref.child(key).set({
                type: 'text',
                date: currentDate,
                sender: "{{$user->id}}",
                message: message,
                seen: false,
                name: "{{$user->first_name.' '.$user->last_name}}"
            });
        }

        function displayLogin(){
            let form = $('div#firebase-login');
            let chats = $('div#read-chats');
            chats.hide();
            form.show();
        }

        function hideLogin(){
            let form = $('div#firebase-login');
            let chats = $('div#read-chats');
            chats.show();
            form.hide();
        }

        function readChats(){


            if(promptLogin == true)
            {
                displayLogin()
                return;
            }

            hideLogin();

            let ref = firebaseDatabase.ref('team_chats/team_{{$team['id']}}');

            ref.on('child_added', function (snapshot){

                addMessage(snapshot.val())


            })
        }


    </script>
@endsection
