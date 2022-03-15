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

    </style>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12">
                    @if (Session::has('message'))
                        <div class="alert alert-success w-50 text-center" style="transform: translate(-50%, -50%);"
                            role="alert">{{ Session::get('message') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('lang.recording_incoming_reports') }}
                        </div>
                        <div class="card-body">
                            <br>
                            <form method="POST" class="col-sm-12 col-md-12 col-lg-12 col-xl-12 needs-validation" novalidate
                                action="{{ route('incomingreport.store') }}">
                                @csrf
                                @method('POST')

                                <div class="form-group mb-3">
                                    <label for="{{ __('lang.entity') }}">{{ __('lang.entity') }}</label>
                                    <br>
                                    <select class="col-sm-10 col-md-8 col-lg-6 col-xl-10  selectpicker"
                                        data-live-search="true" name="report_entity"
                                        title="{{ __('lang.select') . __('lang.entity') }}">
                                        @foreach ($entities as $entity)
                                            <option value="{{ $entity->entity_name }}"
                                                title="{{ $entity->entity_name }}"
                                                data-tokens="{{ $entity->entity_name }}">{{ $entity->entity_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.entity') }}.
                                    </div>
                                </div>

                                <div class="form-group mb-3 col-xl-7" style="margin-right: -1.85%;">
                                    <label
                                        for="{{ __('lang.date_incoming_reports') }}">{{ __('lang.date_incoming_reports') }}</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-date">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-calendar-plus" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z">
                                                </path>
                                                <path
                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z">
                                                </path>
                                            </svg>
                                        </span>
                                        <input style="border-right: none;" class="form-control"
                                            data-date-format="yyyy-mm-dd" required name="date" id="datepicker">
                                    </div>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.date_incoming_reports') }}.
                                    </div>
                                </div>

                                <div class="form-group mb-3 col-xl-7" style="margin-right: -1.85%;">
                                    <label
                                        for="{{ __('lang.time_incoming_reports') }}">{{ __('lang.time_incoming_reports') }}</label>
                                    <input class="form-control form-control-solid " type="text" required name="time"
                                        id="timepicker1" placeholder="{{ __('lang.time_incoming_reports') }}">
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.time_incoming_reports') }}.
                                    </div>
                                </div>

                                <br>
                                <div class="form-group mb-3">
                                    <label
                                        for="{{ __('lang.subject_incoming_reports') }}">{{ __('lang.subject_incoming_reports') }}</label>
                                    <textarea class="form-control mytextarea" id="subject" name="subject" required></textarea>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.subject_incoming_reports') }}.
                                    </div>
                                </div>

                                <br>
                                <hr style="border-top: 3px solid #4f5d73;">

                                <div class="form-group mb-3">
                                    <label
                                        for="{{ __('lang.procedures_npsn') }}">{{ __('lang.procedures_npsn') }}</label>
                                    <textarea class="form-control mytextarea" id="procedures_npsn" name="procedures_npsn"
                                        required></textarea>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.procedures_npsn') }}.
                                    </div>
                                </div>

                                <br>
                                <hr style="border-top: 3px solid #4f5d73;">

                                <div class="form-group mb-3">
                                    <label
                                        for="{{ __('lang.procedures_authorities') }}">{{ __('lang.procedures_authorities') }}</label>
                                    <textarea class="form-control mytextarea" id="procedures_authorities"
                                        name="procedures_authorities" required></textarea>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.procedures_authorities') }}.
                                    </div>
                                </div>

                                <br>
                                <hr style="border-top: 3px solid #4f5d73;">

                                <div class="form-group mb-3">
                                    <label
                                        for="{{ __('lang.result_incoming_reports') }}">{{ __('lang.result_incoming_reports') }}</label>
                                    <textarea class="form-control mytextarea" id="result" name="result" required></textarea>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.result_incoming_reports') }}.
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <button class="btn btn-block btn-success"
                                            type="submit">{{ __('lang.save') }}</button>
                                    </div>
                                    <div class="col-xl-6">
                                        <a href="{{ route('incomingreport.index') }}"
                                            class="btn btn-block btn-primary">{{ __('lang.return') }}</a>
                                    </div>
                                </div>
                            </form>
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
    <script>
        // Data Picker Initialization
        $('#datepicker').datepicker("setDate", new Date());

        $('#datepicker').datepicker({
            dateFormat: 'yyyy-mm-dd',
            weekStart: 1,
            daysOfWeekHighlighted: "6,0",
            autoclose: true,
            todayHighlight: true,
            locale: 'ar',
            language: 'ar',
        });


        // $('#timepicker1').timepicker({
        //     timeFormat: 'h:mm a',
        //     interval: 1,
        //     minTime: "00:00am",
        //     maxTime: '11:59pm',
        //     defaultTime: new Date(),
        //     startTime: '00:00am',
        //     dynamic: true,
        //     dropdown: true,
        //     scrollbar: true
        // });

        $('select').selectpicker();
    </script>
@endsection
