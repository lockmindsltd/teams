<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ \Lockminds\Teams\Classes\Metronic::printAttrs('html') }} {{ \Lockminds\Teams\Classes\Metronic::printClasses('html') }}>
    <head>
        <meta charset="utf-8"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Title Section --}}
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

        {{-- Meta Data --}}
        <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset(config('team.lm_team_layouts.assets_folder').'/media/logos/favicon.ico') }}" />

        {{-- Fonts --}}
        {{ \Lockminds\Teams\Classes\Metronic::getGoogleFontsInclude() }}

        {{-- Global Theme Styles (used by all pages) --}}
        @foreach(config('lm_team_layouts.resources.css') as $style)
            <link href="{{ config('lm_team_layouts.self.rtl') ? asset(\Lockminds\Teams\Classes\Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Layout Themes (used by all pages) --}}
        @foreach (\Lockminds\Teams\Classes\Metronic::initThemes() as $theme)
            <link href="{{ config('lm_team_layouts.self.rtl') ? asset(\Lockminds\Teams\Classes\Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Includable CSS --}}
        @yield('styles')
    </head>

    <body {{ \Lockminds\Teams\Classes\Metronic::printAttrs('body') }} {{ \Lockminds\Teams\Classes\Metronic::printClasses('body') }}>

        @if (config('lm_team_layouts.page-loader.type') != '')
            @include('teams::layout.partials._page-loader')
        @endif

        @include('teams::layout.base._layout_custom')


        <script>var HOST_URL = "{{ route('quick-search') }}";</script>

        {{-- Global Config (global config for global JS scripts) --}}
        <script>
            var KTAppSettings = {!! json_encode(config('layouts.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};

        </script>

        {{-- Global Theme JS Bundle (used by all pages)  --}}
        @foreach(config('lm_team_layouts.resources.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach


        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-app.js"></script>

        <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
        <script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-analytics.js"></script>

        <!-- Add Firebase products that you want to use -->
        <script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-firestore.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-database.js"></script>
        <script src="{{asset('vendor/teams/js/init-firebase.js')}}"></script>
        <script>

            jQuery(document).ready(function() {


                $( "div.modal" ).draggable({
                    cursor: "auto",
                    handle: ".modal-header"
                });

                var $input = $( "input.number" );
                $input.on( "keyup", function( event ) {
                    // When user select text in the document, also abort.
                    var selection = window.getSelection().toString();
                    if ( selection !== '' ) {
                        return;
                    }
                    // When the arrow keys are pressed, abort.
                    if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                        return;
                    }
                    var $this = $( this );
                    // Get the value.
                    var input = $this.val();
                    var input = input.replace(/[\D\s\._\-]+/g, "");
                    input = input ? parseInt( input, 10 ) : 0;
                    $this.val( function() {
                        return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
                    } );
                });
            });

        </script>

        {{-- Includable JS --}}
        @yield('scripts')
    </body>
</html>

