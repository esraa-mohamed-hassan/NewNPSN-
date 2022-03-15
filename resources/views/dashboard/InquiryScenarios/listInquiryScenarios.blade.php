@extends('dashboard.base')

@section('content')
    <link href="{{ asset('css/bootstrap3.3.7.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-select1.12.2.min.css') }}" rel="stylesheet">
    <style>
        .bs-caret {
            display: none !important;
        }

        .bootstrap-select .dropdown-toggle .filter-option {
            text-align: right;
        }

        body {
            font-size: large;
        }

        .breadcrumb {
            background-color: transparent;
        }

        .ui-timepicker-standard {
            z-index: 9999 !important;
        }

        .dropdown-menu {
            text-align: right !important;
        }

        .bootstrap-select.btn-group .dropdown-toggle .filter-option {
            text-align: right !important;
            font-size: 20px;
        }

        .pull-left {
            float: right !important;
            margin-right: -4% !important;
        }

        .bootstrap-select {
            margin-right: -1.85%;
        }

        .bootstrap-select>.dropdown-toggle {
            padding-right: 25px !important;
        }

        .bootstrap-select.btn-group .dropdown-menu li a {
            font-size: 20px;
        }

        .bs-searchbox .form-control {
            font-size: 20px;
        }

        .bootstrap-select.btn-group .dropdown-menu .inner {
            overflow-y: scroll;
            height: 300px;
        }

        .form-control {
            font-size: 15px;
        }

        #inquiries_scenarios_datatable_filter {
            display: none;
        }

        #inquiries_scenarios_datatable_length {
            display: none;
        }

        table.dataTable {
            border: 2px solid #ddd;
            text-align: center;
        }

        .table>thead>tr>th {
            text-align: center;
        }

        .table>tbody>tr>td,
        .table>tbody>tr>th,
        .table>tfoot>tr>td,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>thead>tr>th {
            border: 1px solid #ddd;
        }

        .table>thead {
            background-color: darkgrey;
            color: #15069b;
            font-size: 18px;
            border-top: 1px solid #e4e4e4;
        }

        .table>tbody {
            font-size: 18px;
            font-weight: 600;
            text-align: center;
        }

        .hr_hide {
            display: none;
        }

        div.dataTables_wrapper div.dataTables_paginate {
            text-align: left;
        }

        .p_text {
            color: #af0524;
            font-size: 35px;
            font-weight: 900;
            margin-bottom: 2%;
            border-bottom: 2px solid #af0524;
            display: inline-block;
            margin-right: 34%;
        }

        .incoming_tr {
            background-color: #f3fff6;
            text-align: center;
        }

        .datepicker {
            direction: rtl;
        }

    </style>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12">
                    @if (Session::has('message'))
                        <div class="alert alert-success w-50 text-center" style="transform: translate(-50%, -50%);"
                            role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-xl-6">
                                    <i class="fa fa-align-justify"></i>{{ __('lang.inquiries_scenario') }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <form class="col-sm-12 col-md-12 col-lg-12 col-xl-12 needs-validation" novalidate action=""
                                id="inqury_form">
                                @csrf
                                @method('POST')

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="{{ __('lang.event_type') }}"
                                            style="margin-left: 2%;">{{ __('lang.event_type') }}</label>
                                        <br>
                                        <select class="col-sm-10 col-md-8 col-lg-6 col-xl-10 selectpicker"
                                            data-live-search="true" name="event_type" id="event_type"
                                            title="{{ __('lang.select') . __('lang.event') }}">
                                            @foreach ($event_types as $event_type)
                                                <option value="{{ $event_type->name }}" title="{{ $event_type->name }}"
                                                    data-tokens="{{ $event_type->name }}">{{ $event_type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                            {{ __('lang.looks_good') }}
                                        </div>
                                        <div class="invalid-feedback">
                                            {{ __('lang.please_choose') . __('lang.event_type') }}.
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col-xl-6">
                                        <button class="btn btn-block btn-success" id="btn_inqury"
                                            type="button">{{ __('lang.inqury') }}</button>
                                    </div>
                                    <div class="col-xl-6">
                                        <button class="btn btn-block btn-primary" id="btn_clear"
                                            type="button">{{ __('lang.clear') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="card-body hr_hide">
                            <br>
                            <hr style="border-top: 3px solid #4f5d73;margin-top: -1%;" class="hr_hide">

                            <p class="p_text text-center hr_hide">{{ __('lang.scenario_results') }}</p>

                            <table class="table table-responsive-sm table-striped inquiries_scenarios_datatable"
                                id="inquiries_scenarios_datatable" style="display: none;">
                                <thead>
                                    <tr class="incoming_tr">
                                        <th style="width: 2%!important;">{{ __('lang.id') }}</th>
                                        <th>{{ __('lang.event_type') }}</th>
                                        <th style="width: 17%!important;">{{ __('lang.goal_achieved') }}</th>
                                        <th style="width: 15%!important;">{{ __('lang.urgent_actions') }}</th>
                                        <th style="width: 17%!important;">{{ __('lang.creating_management_team') }}</th>
                                        <th style="width: 25%!important;">{{ __('lang.information_required') }}</th>
                                        <th style="width: 30%!important;">{{ __('lang.decision') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="inqury_body">

                                </tbody>
                            </table>
                        </div>

                        <div class="card-header header_buttons hr_hide">
                            <div class="row">
                                <div class="col-xl-6">
                                    <form id="form_printer" action="{{ route('inquiryScenarios.print') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="data" id="data_print">
                                        <button type="button" class="w-100 btn btn-primary" id="btn-printer">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                                                <path
                                                    d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                                                </path>
                                            </svg>
                                            طباعة
                                        </button>
                                    </form>
                                </div>

                                <div class="col-xl-6">
                                    <form id="inquiry_form2" action="{{ route('inquiryScenarios.pdf') }}"  method="POST">
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
                                        PDF طباعة
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')
    <script src="{{ asset('js/bootstrap3.3.7.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select1.12.2.min.js') }}"></script>
    <script type="text/javascript">
        $('.c-sidebar-minimizer').click();

        $('select').selectpicker();

        $("#btn-printer").click(function(event) {
            var allData = [];
            var data_table = $("#inquiries_scenarios_datatable").dataTable().fnGetData();
            data_table.forEach((elm, index) => {
                var obj = {};

                obj["id"] = elm[0];
                obj["event_type"] = elm[1];
                obj["goal_achieved"] = elm[2];
                obj["urgent_actions"] = elm[3];
                obj["creating_management_team"] = elm[4];
                obj["information_required"] = elm[5];
                obj["decision"] = elm[6];
                allData.push(obj);
            });
            console.log(allData);

            $("#data_print").val(JSON.stringify(allData));
            $('#form_printer').submit();
        });

        $("#btn_clear").click(function(event) {
            $('#event_type').val('');
            $('#event_type').selectpicker('refresh');
            $('#inqury_body').html('');
            $('.hr_hide').hide();
        });

        $("#btn_inqury").click(function(event) {

            $('#inquiries_scenarios_datatable').hide();
            $('#inquiries_scenarios_datatable').show();
            $('.hr_hide').show();
            $.ajax({
                url: "{{ route('inquiryScenarios.store') }}",
                "type": "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                data: $("#inqury_form").serializeArray(),
                success: function(data) {
                    console.log(data);
                    $('#inqury_body').html('');
                    if (data.result.length > 0) {
                        $('.header_buttons').show();
                        data.result.forEach((elm, index) => {
                            if (data.status == 'success') {
                                var ID = index + 1;
                                var html = '<tr>' +
                                    '<td>' + ID + '</td>' +
                                    '<td>' + elm.event_type + '</td>' +
                                    '<td>' + elm.goal_achieved + '</td>' +
                                    '<td>' + elm.urgent_actions + '</td>' +
                                    '<td>' + elm.creating_management_team + '</td>' +
                                    '<td>' + elm.information_required + '</td>' +
                                    '<td>' + elm.decision + '</td>' +
                                    '</tr>';
                                $('#inqury_body').append(html);
                            }
                        });
                    } else {
                        var html = '<tr class="text-center">' +
                            '<td colspan="8">{{ __('lang.no_data') }}</td>' +
                            '</tr>'
                        $('#inqury_body').append(html);
                        $('.header_buttons').hide();
                    }

                }
            });

        });


        $('.btn_pdf').click(function() {
            var allData = [];
            var data_table = $("#inquiries_scenarios_datatable").dataTable().fnGetData();
            data_table.forEach((elm, index) => {
                var obj = {};

                obj["id"] = elm[0];
                obj["event_type"] = elm[1];
                obj["goal_achieved"] = elm[2];
                obj["urgent_actions"] = elm[3];
                obj["creating_management_team"] = elm[4];
                obj["information_required"] = elm[5];
                obj["decision"] = elm[6];
                allData.push(obj);
            });

            $("#data_print2").val(JSON.stringify(allData));
            $("#inquiry_form2").submit();
        });
    </script>
@endsection
