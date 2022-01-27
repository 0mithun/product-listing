<!-- jQuery -->
<script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('backend') }}/dist/js/adminlte.js"></script>

<script defer src="{{ asset('backend') }}/plugins/alpinejs/alpine.min.js"></script>
<!-- toastr notification -->
<script src="{{ asset('backend') }}/plugins/toastr/toastr.min.js"> </script>
<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}", 'Success!')
    @elseif(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}", 'Warning!')
    @elseif(Session::has('error'))
        toastr.error("{{ Session::get('error') }}", 'Error!')
    @endif
    // toast config
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "hideMethod": "fadeOut"
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Navbar Collapse Toggle
    var isNavCollapse = JSON.parse(localStorage.getItem("sidebar_collapse"))
    isNavCollapse ? $('body').addClass('sidebar-collapse') : null;

    $('#nav_collapse').on('click', function() {
        localStorage.setItem("sidebar_collapse", isNavCollapse == true ? false : true);
    });
</script>
<!-- Custom Script -->
@yield('script')

<script>
    {!! $setting->body_script !!}
</script>
