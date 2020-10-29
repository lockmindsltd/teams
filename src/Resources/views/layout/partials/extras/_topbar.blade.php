{{-- Topbar --}}
<div class="topbar">

    {{-- Search --}}
    @if (config('lm_team_layouts.extras.search.display'))
        @if (config('lm_team_layouts.extras.search.layout') == 'offcanvas')
            <div class="topbar-item">
                <div class="btn btn-icon btn-clean btn-lg mr-1" id="kt_quick_search_toggle">
                    {{ \Lockminds\Teams\Classes\Metronic::getSVG("media/svg/icons/General/Search.svg", "svg-icon-xl svg-icon-primary") }}
                </div>
            </div>
        @else
            <div class="dropdown" id="kt_quick_search_toggle">
                {{-- Toggle --}}
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1">
                       {{ \Lockminds\Teams\Classes\Metronic::getSVG("media/svg/icons/General/Search.svg", "svg-icon-xl svg-icon-primary") }}
                    </div>
                </div>

                {{-- Dropdown --}}
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    @include('teams::layout.partials.extras.dropdown._search-dropdown')
                </div>
            </div>
        @endif
    @endif

    {{-- Notifications --}}
    @if (config('lm_team_layouts.extras.notifications.display'))
        @if (config('lm_team_layouts.extras.notifications.layout') == 'offcanvas')
            <div class="topbar-item">
                <div class="btn btn-icon btn-clean btn-lg mr-1 pulse pulse-primary" id="kt_quick_notifications_toggle">
                    {{ \Lockminds\Teams\Classes\Metronic::getSVG("media/svg/icons/Code/Compiling.svg", "svg-icon-xl svg-icon-primary") }}
                    <span class="pulse-ring"></span>
                </div>
            </div>
        @else
            <div class="dropdown">
                {{-- Toggle --}}
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                        {{ \Lockminds\Teams\Classes\Metronic::getSVG("media/svg/icons/Code/Compiling.svg", "svg-icon-xl svg-icon-primary") }}
                        <span class="pulse-ring"></span>
                    </div>
                </div>

                {{-- Dropdown --}}
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <form>
                        @include('teams::layout.partials.extras.dropdown._notifications')
                    </form>
                </div>
            </div>
        @endif
    @endif

    {{-- Quick Actions --}}
    @if (config('lm_team_layouts.extras.quick-actions.display'))
        @if (config('lm_team_layouts.extras.quick-actions.layout') == 'offcanvas'))
            <div class="topbar-item">
                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1" id="kt_quick_actions_toggle">
                    {{ \Lockminds\Teams\Classes\Metronic::getSVG("media/svg/icons/Media/Equalizer.svg", "svg-icon-xl svg-icon-primary") }}
                </div>
            </div>
        @else
            <div class="dropdown">
                {{-- Toggle --}}
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                        {{ \Lockminds\Teams\Classes\Metronic::getSVG("media/svg/icons/Media/Equalizer.svg", "svg-icon-xl svg-icon-primary") }}
                    </div>
                </div>

                {{-- Dropdown --}}
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    @include('teams::layout.partials.extras.dropdown._quick-actions')
                </div>
            </div>
        @endif
    @endif

    {{-- My Cart --}}
    @if (config('lm_team_layouts.extras.cart.display'))
        <div class="dropdown">
            {{-- Toggle --}}
            <div class="topbar-item"  data-toggle="dropdown" data-offset="10px,0px">
                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                    {{ \Lockminds\Teams\Classes\Metronic::getSVG("media/svg/icons/Shopping/Cart3.svg", "svg-icon-xl svg-icon-primary") }}
                </div>
            </div>

            {{-- Dropdown --}}
            <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-xl dropdown-menu-anim-up">
                <form>
                    @include('teams::layout.partials.extras.dropdown._cart')
                </form>
            </div>
        </div>
    @endif

    {{-- Quick panel --}}
    @if (config('lm_team_layouts.header.topbar.quick-panel.display'))
        <div class="topbar-item">
            <div class="btn btn-icon btn-clean btn-lg mr-1" id="kt_quick_panel_toggle">
                {{ \Lockminds\Teams\Classes\Metronic::getSVG("media/svg/icons/Layout/Layout-4-blocks.svg", "svg-icon-xl svg-icon-primary") }}
            </div>
        </div>
    @endif

    {{-- Languages --}}
    @if (config('lm_team_layouts.extras.languages.display'))
        <div class="dropdown">
            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                    <img class="h-20px w-20px rounded-sm" src="{{ asset(config("lm_team_layouts.assets_folder").'/media/svg/flags/226-united-states.svg') }}" alt=""/>
                </div>
            </div>

            <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                @include('teams::layout.partials.extras.dropdown._languages')
            </div>
        </div>
    @endif

    {{-- User --}}
    @if (config('lm_team_layouts.extras.user.display'))
        @if (config('lm_team_layouts.extras.user.layout') == 'offcanvas')
            <div class="topbar-item">
                <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">
                        @if(!empty($user->first_name))
                            {{ucfirst($user->first_name)}}
                        @endif
                    </span>
                    <span class="symbol symbol-35 symbol-light-success">
                        <span class="symbol-label font-size-h5 font-weight-bold">
                             @if(!empty($user->first_name))
                                {{ucfirst($user->first_name[0])}}
                            @endif
                        </span>
                    </span>
                </div>
            </div>
        @else
            <div class="dropdown">
                {{-- Toggle --}}
                <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
                        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{$user->first_name}}</span>
                        <span class="symbol symbol-35 symbol-light-success">
                            <span class="symbol-label font-size-h5 font-weight-bold">{{strtoupper($user->first_name[0])}}</span>
                        </span>
                    </div>
                </div>

                {{-- Dropdown --}}
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
                    @include('teams::layout.partials.extras.dropdown._user')
                </div>
            </div>
        @endif
    @endif

</div>
<p></p>
