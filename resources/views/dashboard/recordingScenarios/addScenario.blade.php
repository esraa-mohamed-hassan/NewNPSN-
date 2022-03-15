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

        textarea {
            resize: none;
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
                            <i class="fa fa-align-justify"></i> {{ __('lang.recording_scenarios') }}
                        </div>
                        <div class="card-body">
                            <br>
                            <form method="POST" class="col-sm-12 col-md-12 col-lg-12 col-xl-12 needs-validation" novalidate
                                action="{{ route('recordingScenario.store') }}">
                                @csrf
                                @method('POST')

                                <div class="form-group mb-3">
                                    <label for="{{ __('lang.event_type') }}">{{ __('lang.event_type') }}</label>
                                    <br>
                                    <select class="col-sm-10 col-md-8 col-lg-6 col-xl-10  selectpicker"
                                        data-live-search="true" name="event_type"
                                        title="{{ __('lang.select') . __('lang.event_type') }}">
                                        @foreach ($event_types as $event_type)
                                            <option value="{{ $event_type->name }}" title="{{ $event_type->name }}"
                                                data-tokens="{{ $event_type->name }}">{{ $event_type->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.event_type') }}.
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="{{ __('lang.goal_achieved') }}">{{ __('lang.goal_achieved') }}</label>
                                    <textarea rows="4" cols="50" class="form-control" id="mytextarea" name="goal_achieved"
                                        required></textarea>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.goal_achieved') }}.
                                    </div>
                                </div>

                                <br>
                                <hr style="border-top: 3px solid #4f5d73;">

                                <div class="form-group mb-3">
                                    <label
                                        for="{{ __('lang.urgent_actions') }}">{{ __('lang.urgent_actions') }}</label>
                                    <textarea rows="4" cols="50" class="form-control" id="urgent_actions"
                                        name="urgent_actions" required></textarea>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.urgent_actions') }}.
                                    </div>
                                </div>

                                <br>
                                <hr style="border-top: 3px solid #4f5d73;">

                                <div class="form-group mb-3">
                                    <label
                                        for="{{ __('lang.creating_management_team') }}">{{ __('lang.creating_management_team') }}</label>
                                    <textarea rows="4" cols="50" class="form-control" id="creating_management_team"
                                        name="creating_management_team" required></textarea>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.creating_management_team') }}.
                                    </div>
                                </div>

                                <br>
                                <hr style="border-top: 3px solid #4f5d73;">

                                <div class="form-group mb-3">
                                    <label
                                        for="{{ __('lang.information_required') }}">{{ __('lang.information_required') }}</label>
                                    <textarea rows="4" cols="50" class="form-control" id="information_required"
                                        name="information_required" required></textarea>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.information_required') }}.
                                    </div>
                                </div>

                                <br>
                                <hr style="border-top: 3px solid #4f5d73;">

                                <div class="form-group mb-3">
                                    <label for="{{ __('lang.decision') }}">{{ __('lang.decision') }}</label>
                                    <textarea rows="4" cols="50" class="form-control" id="decision" name="decision"
                                        required></textarea>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.decision') }}.
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <button class="btn btn-block btn-success"
                                            type="submit">{{ __('lang.save') }}</button>
                                    </div>
                                    <div class="col-xl-6">
                                        <a href="{{ route('recordingScenario.index') }}"
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
        $(function() {
            $('select').selectpicker();
        });
    </script>
@endsection
