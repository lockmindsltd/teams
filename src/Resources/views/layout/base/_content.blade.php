{{-- Content --}}
@if (config('lm_team_layouts.content.extended'))
    @yield('content')
@else
    <div class="content d-flex flex-column-fluid">
        <div class="{{ \Lockminds\Teams\Classes\Metronic::printClasses('content-container', false) }}">
            @yield('content')
        </div>
    </div>
@endif
