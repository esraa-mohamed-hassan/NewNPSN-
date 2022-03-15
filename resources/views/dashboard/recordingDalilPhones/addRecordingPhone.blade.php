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
            margin-right: -3% !important;
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
                            <i class="fa fa-align-justify"></i> {{ __('lang.recording_dalil_phone') }}
                        </div>
                        <div class="card-body">
                            <br>
                            <form method="POST" class="col-sm-12 col-md-12 col-lg-12 col-xl-12 needs-validation" novalidate
                                action="{{ route('dalilPhone.store') }}">
                                @csrf
                                @method('POST')

                                <div class="form-group row">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-1">
                                        <label for="Dentity">{{ __('lang.Dentity') }}</label>
                                    </div>

                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <select class="selectpicker col-sm-10 col-md-10 col-lg-11 col-xl-11"
                                            data-live-search="true" name="Dentity" id="Dentity"
                                            title="{{ __('lang.select') . __('lang.Dentity') }}">
                                            @foreach ($dalil_entities as $dalil_entity)
                                                <option value="{{ $dalil_entity->id }}"
                                                    title="{{ $dalil_entity->entity }}"
                                                    data-tokens="{{ $dalil_entity->entity }}">
                                                    {{ $dalil_entity->entity }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.Dentity') }}.
                                    </div>
                                </div>


                                <div class="form-group row" id="sub_entity" style="display: none;">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-1">
                                        <label for="sub_Dentity">{{ __('lang.sub_dentity') }}</label>
                                    </div>

                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <select class="selectpicker col-sm-10 col-md-10 col-lg-11 col-xl-11"
                                            data-live-search="true" name="sub_Dentity" id="sub_Dentity"
                                            title="{{ __('lang.select') . __('lang.sub_dentity') }}">

                                        </select>
                                    </div>

                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.sub_dentity') }}.
                                    </div>
                                </div>

                                <div class="form-group form-group-lg row">
                                    <div class="col-sm-2 col-md-4 col-lg-6 col-xl-1">
                                        <label for="name">{{ __('lang.name') }}</label>
                                    </div>

                                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
                                        <input class="form-control" type="text" placeholder="{{ __('lang.name') }}"
                                            name="name" value="" required autofocus>
                                    </div>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.name') }}.
                                    </div>
                                </div>

                                <div class="form-group form-group-lg row">
                                    <div class="col-sm-2 col-md-4 col-lg-6 col-xl-1">
                                        <label for="job">{{ __('lang.job') }}</label>
                                    </div>

                                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
                                        <input class="form-control" type="text" placeholder="{{ __('lang.job') }}"
                                            name="job" value="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg row">
                                    <div class="col-sm-2 col-md-4 col-lg-6 col-xl-1">
                                        <label for="phone">{{ __('lang.Dphone') }}</label>
                                    </div>

                                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
                                        <input class="form-control" type="tel" placeholder="{{ __('lang.Dphone') }}"
                                            name="phone" value="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg row">
                                    <div class="col-sm-2 col-md-4 col-lg-6 col-xl-1">
                                        <label for="mobile">{{ __('lang.mobile') }}</label>
                                    </div>

                                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
                                        <input class="form-control" type="tel" placeholder="{{ __('lang.mobile') }}"
                                            name="mobile" value="" autofocus>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg row">
                                    <div class="col-sm-2 col-md-4 col-lg-6 col-xl-1">

                                        <label for="fax">{{ __('lang.fax') }}</label>
                                    </div>

                                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
                                        <input class="form-control" type="tel" placeholder="{{ __('lang.fax') }}"
                                            name="fax" value="" autofocus>
                                    </div>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.fax') }}.
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <button class="btn btn-block btn-success"
                                            type="submit">{{ __('lang.save') }}</button>
                                    </div>
                                    <div class="col-xl-6">
                                        <a href="{{ route('dalilPhone.index') }}"
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
        $("#Dentity").selectpicker();

        $("#Dentity").change(function() {
            var dalil_entity_id = $('#Dentity').val();
            $.ajax({
                method: 'GET',
                url: '{{ $_ENV["APP_URL"] }}/recording_dalil_phone/get_entities/' + dalil_entity_id,
                success: function(response) {
                    $('#sub_Dentity').html('');
                    if (response.message == "success") {
                        if (response.result.sub_entities.length > 0) {
                            var data = response.result.sub_entities;
                            $('#sub_entity').show();
                            data.forEach((elm, index) => {
                                var html = '<option value="' + elm.id + '">' + elm.name +
                                    '</option>';
                                $('#sub_Dentity').append(html);
                            });
                            $('#sub_Dentity').selectpicker('refresh');
                        } else {
                            $('#sub_entity').hide();
                        }
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {}
            });
        });
    </script>
@endsection
