<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="{{ __('lang.npsn') }}">
    <title>{{ __('lang.npsn') }}</title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet">
    <!-- icons -->
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet" />

    <style>
        *[dir="rtl"] .custom-select-sm {
            padding-right: 1.5rem !important;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            width: 100% !important;
            margin-left: 6.5em !important;
            margin-right: 1% !important;
        }

        div.dataTables_wrapper div.dataTables_filter {
            text-align: left !important;
            margin-left: 10% !important;
        }

        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_desc:after {
            opacity: 0 !important;
        }

        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_desc:after {
            opacity: 0 !important;
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
            background: transparent !important;
            white-space: normal !important;
        }

        [dir="rtl"] .c-sidebar-nav-dropdown-items .c-sidebar-nav-link,
        *[dir="rtl"] .c-sidebar-nav-dropdown-items .c-sidebar-nav-dropdown-toggle {
            padding-right: 25px !important;
            white-space: normal !important;
        }


        .npsn_logo {
            margin-right: 35% !important;
        }

        .center_p {
            font-size: 18px !important;
            font-weight: bold !important;
            margin-top: 11% !important;
            text-align: center !important;
            margin-right: -18% !important;
        }

        .footer1_p {
            margin-left: 17% !important;
            margin-top: 3% !important;
            text-align: left !important;
            font-size: 15px !important;
            font-weight: 500 !important;
        }

        .footer_p {
            text-align: left !important;
            font-size: 15px !important;
            font-weight: 500 !important;
            margin-left: 5% !important;
        }

        .card-footer {
            padding: 0.75rem 1.25rem !important;
            border-top: 4px solid !important;
            background-color: #fff !important;
            border-color: #d8dbe0 !important;
        }

        .header_buttons {
            margin-bottom: 1% !important;
            border-radius: 5px !important;
        }



        .reportsOperation_datatable tr,
        .reportsPlaces_datatable tr,
        .reportsmedicalServices_datatable tr,
        .statisticalCommunications_datatable tr {
            font-size: 18px !important;
        }

        .reportsOperation_datatable td,
        .reportsPlaces_datatable td,
        .reportsmedicalServices_datatable td,
        .statisticalCommunications_datatable td {
            font-weight: 500 !important;
            text-align: center !important;
        }



        .print_border {
            border: 1px solid #000 !important;
        }

        .print_border_tr {
            background-color: #000 !important;
        }

        .npsn_logo_p {
            float: left;
            margin-right: 75%;
            margin-top: -5%;
            margin-bottom: 1%;
            color: #000;
            font-size: 15px;
            font-weight: 600
        }

        .portsaid_logo_p {
            float: right;
            margin-right: 1%;
            margin-top: -1%;
            margin-bottom: 1%;
            color: black;
            font-size: 15px;
            font-weight: 600;
        }

        .card-header {
            padding: 0.75rem 1.25rem !important;
            margin-bottom: 0 !important;
            border-bottom: 3px solid !important;
            background-color: #fff !important;
            border-color: #000 !important;
        }

        div.dataTables_wrapper div.dataTables_filter {
            text-align: right !important;
            margin-left: 4% !important;
            margin-top: -2% !important;
        }

        #DataTables_Table_0_length {
            display: none !important;
        }

        .dt-buttons {
            width: 100%;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            display: contents !important;
        }

        .table>thead {
            background-color: darkgrey;
            color: #15069b !important;
            font-size: 18px !important;
            border-top: 1px solid #e4e4e4 !important;
        }

        table.dataTable thead th {
            padding: 10px 18px !important;
            /* border-bottom: 1px solid #111 !important; */
        }

        .incoming_tr {
            background-color: #f3fff6 !important;
            text-align: center !important;
        }


        @media print {

            .reportsOperation_datatable,
            .reportsPlaces_datatable,
            .reportsmedicalServices_datatable,
            .statisticalCommunications_datatable {
                direction: rtl !important;
                border-color: #000 !important;
                border: 1px solid;
            }

            .table-bordered tr,
            .table-bordered th,
            .table-bordered td {
                border: 1px solid;
                border-color: #000 !important;
            }

            table.table-bordered.dataTable tbody th,
            table.table-bordered.dataTable tbody td {
                border-bottom-width: unset !important;
            }
        }

    </style>
    @yield('css')

</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12">
                <div class="card" id="printTable">
                    <div class="card-header" id='header'>
                        <div class="row" style="margin-bottom: -3%;">
                            <div class="form-group" style="float: right;margin-right: 3%;">
                                <img src="{{ url('assets/img/logos/port_said_logo.png') }}" class="portsaid_logo"
                                    width="75" height="67" alt="">
                            </div>

                            <div class="form-group" style="float: left;margin-right: 74%;margin-top: -9px;">
                                <img src="{{ url('assets/img/logos/npsn.png') }}" class="npsn_logo" width="75"
                                    height="75" alt="">
                            </div>
                            <div class="form-group col-xl-7 portsaid_logo_p">
                                <p>{{  __('lang.portsaid') }}</p>

                            </div>
                            <div class="form-group col-xl-5 npsn_logo_p">
                                <p>{{ __('lang.npsn') }}</p>
                            </div>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </div>
        </div>

        <div class="row print">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12">
                <div class="card-footer header_buttons">
                    <div class="row foundData">
                        <div class="col-xl-4" id="tb_wrapper">

                        </div>

                        <div class="col-xl-4">
                            <form id="inquiry_form2" action=""  method="POST">
                                <input type="hidden" name="data" id="data_print2">
                                @csrf
                                   <button type="button" class="w-100 btn btn-danger btn_pdf">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-file-pdf" viewBox="0 0 16 16">
                                    <path
                                        d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z">
                                    </path>
                                    <path
                                        d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z">
                                    </path>
                                </svg>
                                {{ __('lang.pdf') }}

                            </button>
                            </form>
                        </div>

                        <div class="col-xl-4">
                            <a href="{{ route('home.index') }}" class="btn btn-block btn-primary">{{ __('lang.return') }}</a>
                        </div>

                    </div>

                    <div class="row NoData" style="display: none;">
                        <div class="col-xl-4"></div>
                        <div class="col-xl-4">
                            <a href="{{ route('home.index') }}" class="btn btn-block btn-primary">{{ __('lang.return') }}</a>
                        </div>
                        <div class="col-xl-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('js/coreui-utils.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>

    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>

    @yield('javascript')
    <script>
        //   $(document).ready(function() {
        //         var reportsOperation_checkData = $(".reportsOperation_datatable").dataTable().fnGetData().length;
        //         var reportsPlaces_checkData = $(".reportsPlaces_datatable").dataTable().fnGetData().length;
        //         // var reportsPlaces_checkData = $(".reportsPlaces_datatable").dataTable().fnGetData().length;
        //         // var reportsPlaces_checkData = $(".reportsPlaces_datatable").dataTable().fnGetData().length;
        //         // var reportsPlaces_checkData = $(".reportsPlaces_datatable").dataTable().fnGetData().length;

        //         if(reportsOperation_checkData === 0 ){
        //             $('.foundData').hide();
        //             $('.NoData').show();
        //         }else{
        //             $('.NoData').hide();
        //             $('.foundData').show();
        //         }

        //         if(reportsPlaces_checkData === 0){
        //             $('.foundData').hide();
        //             $('.NoData').show();
        //         }else{
        //             $('.NoData').hide();
        //             $('.foundData').show();
        //         }
        //     });
    </script>
</body>

</html>
