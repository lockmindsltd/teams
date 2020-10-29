@if(config('lm_team_layouts.self.layout') == 'blank')
    <div class="d-flex flex-column flex-root">
        @yield('content')
    </div>
@else

    @include('teams::layout.base._header-mobile')

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">

            @if(config('lm_team_layouts.aside.self.display'))
                @include('teams::layout.base._aside')
            @endif

            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('teams::layout.base._header')

                @if(config('lm_team_layouts.subheader.display'))
                    @if(array_key_exists(config('lm_team_layouts.subheader.layout'), config('lm_team_layouts.subheader.layouts')))
                        @include('teams::layout.partials.subheader._'.config('lm_team_layouts.subheader.layout'))
                    @else
                        @include('teams::layout.partials.subheader._'.array_key_first(config('lm_team_layouts.subheader.layouts')))
                    @endif
                @endif

                <div class="content {{ \Lockminds\Teams\Classes\Metronic::printClasses('content', false) }} d-flex flex-column flex-column-fluid" id="kt_content">
                    @include('teams::layout.base._content')
                </div>

                @include('teams::layout.base._footer')
            </div>
        </div>
    </div>

@endif

@if (config('lm_team_layouts.self.layout') != 'blank')

    @if (config('lm_team_layouts.extras.search.layout') == 'offcanvas')
        @include('teams::layout.partials.extras.offcanvas._quick-search')
    @endif

    @if (config('lm_team_layouts.extras.notifications.layout') == 'offcanvas')
        @include('teams::layout.partials.extras.offcanvas._quick-notifications')
    @endif

    @if (config('lm_team_layouts.extras.quick-actions.layout') == 'offcanvas')
        @include('teams::layout.partials.extras.offcanvas._quick-actions')
    @endif

    @if (config('lm_team_layouts.extras.user.layout') == 'offcanvas')
        @include('teams::layout.partials.extras.offcanvas._quick-user')
    @endif

    @if (config('lm_team_layouts.extras.quick-panel.display'))
        @include('teams::layout.partials.extras.offcanvas._quick-panel')
    @endif

    @if (config('lm_team_layouts.extras.toolbar.display'))
        @include('teams::layout.partials.extras._toolbar')
    @endif

    @if (config('lm_team_layouts.extras.chat.display'))
        @include('teams::layout.partials.extras._chat')
    @endif

    @include('teams::layout.partials.extras._scrolltop')

@endif
