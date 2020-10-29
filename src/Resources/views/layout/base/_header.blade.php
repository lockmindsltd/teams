{{-- Header --}}
<div id="kt_header" class="header {{ \Lockminds\Teams\Classes\Metronic::printClasses('header', false) }}"
    {{ \Lockminds\Teams\Classes\Metronic::printAttrs('header') }}>

    {{-- Container --}}
    <div class="container-fluid d-flex align-items-center justify-content-between">
        @if (config('lm_team_layouts.header.self.display'))

            @php
                $kt_logo_image = 'logo-light.png';
            @endphp

            @if (config('lm_team_layouts.header.self.theme') === 'light')
                @php $kt_logo_image = 'logo-dark.png' @endphp
            @elseif (config('lm_team_layouts.header.self.theme') === 'dark')
                @php $kt_logo_image = 'logo-light.png' @endphp
            @endif

            {{-- Header Menu --}}
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

                @if(config('lm_team_layouts.aside.self.display') == false)
                    <div class="header-logo">
                        <a href="{{ url('/') }}">
                            <img alt="Logo" src="https://worknasiplus.com/images/worknasiplus.png"/>
                        </a>
                    </div>
                @endif

                <div id="kt_header_menu" class="header-menu header-menu-mobile {{ \Lockminds\Teams\Classes\Metronic::printClasses('header_menu', false) }}" {{ \Lockminds\Teams\Classes\Metronic::printAttrs('header_menu') }}>
                    <ul class="menu-nav {{ \Lockminds\Teams\Classes\Metronic::printClasses('header_menu_nav', false) }}">

                    </ul>
                </div>

            </div>

        @else

        @endif

        @include('teams::layout.partials.extras._topbar')
    </div>
</div>
