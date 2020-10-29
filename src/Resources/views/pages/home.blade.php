{{-- Extends layout --}}
@extends('taskmanager::layout.default')

{{-- Content --}}
@section('content')


@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset(config("taskmanager.layout.assets_folder").'/js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
