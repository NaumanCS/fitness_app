<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendors Styles(used by this page)-->
{{-- <link href="{{asset('admin')}}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" /> --}}
<link href="{{ asset('admin') }}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
    type="text/css" />
<!--end::Page Vendors Styles-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin') }}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Glo{{ asset('admin') }}/bal Theme Styles-->
<!--begin::L{{ asset('admin') }}/ayout Themes(used by all pages)-->
<link href="{{ asset('admin') }}/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin') }}/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin') }}/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin') }}/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>



@yield('injected-css')
