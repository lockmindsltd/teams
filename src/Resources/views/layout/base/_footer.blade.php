{{-- Footer --}}

<div class="container footer bg-white py-4 d-flex flex-lg-column {{ \Lockminds\Teams\Classes\Metronic::printClasses('footer', false) }}" id="kt_footer">
    {{-- Container --}}
    <div class="{{ \Lockminds\Teams\Classes\Metronic::printClasses('footer-container', false) }} d-flex flex-column flex-md-row align-items-center justify-content-between">
        {{-- Copyright --}}
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2">{{ date("Y") }} &copy;</span>
            <a href="/" target="_blank" class="text-dark-75 text-hover-primary">{{ config("app.name") }}</a>
        </div>

    </div>
</div>
