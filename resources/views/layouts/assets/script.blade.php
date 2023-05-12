<script>
    var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1400
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };
</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.js"></script>
<script src="{{ asset('admin') }}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="{{ asset('admin') }}/assets/js/scripts.bundle.js"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
{{-- <script src="{{asset('admin')}}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script> --}}
<script src="{{ asset('admin') }}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('admin') }}/assets/js/pages/widgets.js"></script>
<!--end::Page Scripts-->
<script src="{{ asset('admin') }}/assets/js/pages/crud/datatables/basic/paginations.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/dropify/dist/js/dropify.min.js"></script>


@yield('injected-scripts')

<script>
    $(document).off('click', '.delete_action').on('click', '.delete_action', function(e) {
        var id = $(this).attr('rel');
        e.preventDefault();
        swal.fire({
            title: "Are you sure to delete the selected Item?",
            text: "You will not be able to recover this Item!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0,
            closeOnConfirm: false
        }).then(function(e) {
            if (e.value) {
                $.ajax({
                    type: 'POST',
                    url: "delete",
                    data: {
                        'id': id,
                        "_token": "{{ csrf_token() }}",
                    },
                    async: false,
                    success: function(data) {
                        swal("Deleted!", "Item has been deleted.", "success");
                        location.reload();
                    },
                    error: function(data) {
                        swal("Error!", data, "danger");
                    }
                });
                swal.fire("Deleted!", "Item has been deleted.", "success");
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            }
            if ("cancel" === e.dismiss)
                swal.fire("Cancelled", "Item is safe :)", "error");
        });
    });
</script>

<script>
    // Class definition

    var KTSummernoteDemo = function() {
        // Private functions
        var demos = function() {
            $('.summernote').summernote({
                height: 150
            });
        }

        return {
            // public functions
            init: function() {
                demos();
            }
        };
    }();

    // Initialization
    jQuery(document).ready(function() {
        KTSummernoteDemo.init();
    });
</script>
<script>
    $('.dropify').dropify();
</script>
