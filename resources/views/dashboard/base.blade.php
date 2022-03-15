<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="{{ __('lang.npsn') }}">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>{{ __('lang.npsn') }}</title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet">
    <!-- icons -->
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/jquery.timepicker.min.css') }}" rel="stylesheet">

    <style>
        .img_log{
            width: 27%;
            margin-left: 2%;
        }

        .p_brand{
            float: right;
            margin: 1%;
            text-align: center;
            padding: 1%;
            font-size: 18px;
            color: #87d9fe;
            font-weight: 800;
        }

        [dir="rtl"] .c-sidebar-nav-dropdown-items .c-sidebar-nav-link,
        *[dir="rtl"] .c-sidebar-nav-dropdown-items .c-sidebar-nav-dropdown-toggle {
            padding-right: 25px;
            white-space: normal;
        }

        *[dir="rtl"] .custom-select-sm {
            padding-right: 1.5rem;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            width: 100% !important;
        }

        div.dataTables_wrapper div.dataTables_filter {
            text-align: left !important;
            margin-left: 10%;
        }

        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_desc:after {
            opacity: 0;
        }

        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_desc:after {
            opacity: 0;
        }

        .sorting_asc {
            padding-right: 12px !important;
        }

        .tox-notifications-container {
            display: none !important;
        }

        .tox-statusbar {
            display: none !important;
        }

        .c-sidebar .c-sidebar-nav-link,
        .c-sidebar .c-sidebar-nav-dropdown-toggle {
            color: rgba(255, 255, 255, 0.8);
            background: transparent;
            white-space: normal;
        }

        table.dataTable {
            font-size: 18px;
            font-weight: 500;
        }

    </style>

    @yield('css')


</head>

<body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

        @include('dashboard.shared.nav-builder')

        @include('dashboard.shared.header')

        <div class="c-body">

            <main class="c-main">

                @yield('content')

            </main>
            @include('dashboard.shared.footer')
        </div>
    </div>



    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('js/coreui-utils.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/db3uvgf1t4g5p64xsf4cwk87jcjdhao0k6uiwagepm31w1qu/tinymce/5/tinymce.min.js" referrerpolicy="origin" SameSite="Strict"></script>
    <script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.ar.min.js') }}"></script>
    <script src="{{ asset('/js/jQuery.print.min.js') }}"></script>


    <script>
        /* Bootstrap validation */
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        /* Bootstrap validation */

        /* tinymce  */
        tinymce.init({
            selector: '.mytextarea',
            language: 'ar',
            directionality: 'rtl',
            height: "400",
            menubar: false,
            plugins: [
                'lists advlist autolink lists print preview',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code wordcount'
            ],
            toolbar: 'fontselect  | formatselect | fontsizeselect |' +
                'bold italic underline | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist | outdent indent | ' +
                '',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:18pt }',
            fontsize_formats: '12pt 14pt 16pt 18pt 24pt 36pt 48pt',
            element_format: 'html'

        });
        /* tinymce  */
    </script>

    @yield('javascript')

</body>

</html>
