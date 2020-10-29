{{-- Header Mobile --}}
<div id="kt_header_mobile" class="header-mobile {{ \Lockminds\Teams\Classes\Metronic::printClasses('header-mobile', false) }}" {{ \Lockminds\Teams\Classes\Metronic::printAttrs('header-mobile') }}>
    <div class="mobile-logo">
        <a href="{{ url('/') }}">

            @php
                $kt_logo_image = 'logo-light.png'
            @endphp

            @if (config('lm_team_layouts.aside.self.display') == false)

                @if (config('lm_team_layouts.header.self.theme') === 'light')
                    @php $kt_logo_image = 'logo-dark.png' @endphp
                @elseif (config('lm_team_layouts.header.self.theme') === 'dark')
                    @php $kt_logo_image = 'logo-light.png' @endphp
                @endif

            @else

                @if (config('lm_team_layouts.brand.self.theme') === 'light')
                    @php $kt_logo_image = 'logo-dark.png' @endphp
                @elseif (config('lm_team_layouts.brand.self.theme') === 'dark')
                    @php $kt_logo_image = 'logo-light.png' @endphp
                @endif

            @endif

            <img alt="{{ config('app.name') }}" style="height: 60px; width: 100%;" src="https://worknasiplus.com/images/worknasiplus.png"/>
        </a>
    </div>
    <div class="d-flex align-items-center">

        @if (config('lm_team_layouts.aside.self.display'))
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle"><span></span></button>
        @endif

        @if (config('lm_team_layouts.header.menu.self.display'))
            <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle"><span></span></button>
        @endif

        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
            {{ \Lockminds\Teams\Classes\Metronic::getSVG('media/svg/icons/General/User.svg', 'svg-icon-xl') }}
        </button>
    </div>
</div>
