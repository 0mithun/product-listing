<!-- jQuery -->
<script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="{{ asset('backend') }}/dist/js/adminlte.js"></script>
<!-- Alpine js -->
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

    // Mode Change Toggle
    var isDarkMode = JSON.parse(localStorage.getItem("dark_mode"))
    isDarkMode ? $('body').addClass('dark-mode') : null;
    var layout_mode = '{{ session('layout_mode') }}';

    if (isDarkMode) {
        $('#dark').removeClass('d-none')
        $('#dark').addClass('d-block')
        $('#light').removeClass('d-block')
        $('#light').addClass('d-none')
    } else {
        $('#light').removeClass('d-none')
        $('#light').addClass('d-block')
        $('#dark').removeClass('d-block')
        $('#dark').addClass('d-none')
    }

    $('#mode_change').on('click', function() {
        localStorage.setItem("dark_mode", isDarkMode == true ? false : true);
        window.location.reload();
    });
</script>
{{-- <script>
    function backedData() {
        return {
            darkMode: JSON.parse(localStorage.getItem("dark_mode")),
            navBGColor: '{{ setting()->nav_color ? setting()->nav_color : '#f8f9fa' }}',
            showMessage() {
                console.log(this.navBGColor);
                // console.log(JSON.parse(localStorage.getItem("dark_mode")))

            }
            // saveData() {
            //     if (this.form.name.length && this.form.email.length) {
            //         this.students.push({
            //             name: this.form.name,
            //             email: this.form.email
            //         })
            //         this.resetForm()
            //     }
            // }
        }
    }
</script> --}}
<!-- Custom Script -->
@yield('script')

{!! setting()->body_script !!}
