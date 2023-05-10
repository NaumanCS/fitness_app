<!DOCTYPE html>
<html lang="en">

<head>
    <base href="">
    @include('layouts.partials.head')
    @include('layouts.assets.css')
</head>

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            @include('layouts.partials.sidebar')
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper w-100" id="kt_wrapper">
                @include('layouts.partials.navbar')
                @yield('content')
                @include('layouts.partials.footer')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    @include('layouts.assets.script')
</body>

</html>
