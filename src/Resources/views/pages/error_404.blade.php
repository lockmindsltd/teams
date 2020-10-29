@php
    $user = \App\User::find(Auth::user()->id);
@endphp

{{-- Extends layout --}}
@extends('taskmanager::layout.default')

{{-- Content --}}
@section('content')
    <div class=" container ">

    <!--begin::Contacts-->
        <div class="d-flex flex-row">
            <!--begin::Error-->
            <div class="error error-6 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url({{config("app.url").'/'.config("taskmanager.layout.assets_folder")}}/media/error/bg6.jpg);" style="height:100%;">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-row-fluid text-center" >
                    <h1 class="error-title font-weight-boldest text-white mb-12" style="margin-top: 12rem;">Oops...</h1>
                    <p class="display-4 font-weight-bold text-white">
                        Looks like something went wrong.</br>
                        We're working on it
                    </p>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Error-->
        </div>
        <!--end::Contacts-->
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset(config("taskmanager.layout.assets_folder").'/js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
