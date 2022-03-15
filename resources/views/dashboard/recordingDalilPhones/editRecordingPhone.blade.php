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
                            <i class="fa fa-align-justify"></i> {{ __('lang.recording_dalil_phone') }}
                        </div>
                        <div class="card-body">
                            <br>
                            <form method="POST" class="col-sm-12 col-md-12 col-lg-12 col-xl-12 needs-validation" novalidate
                                action="{{ route('dalilPhone.update') }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $dalil_phone->id }}">
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
                                                    {{ $dalil_phone->entity_id == $dalil_entity->id ? 'selected' : '' }}
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
                                @if (!empty($dalil_phone->sub_entity_id))

                                    <div class="form-group row" id="sub_entity">
                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-1">
                                            <label for="sub_Dentity">{{ __('lang.sub_dentity') }}</label>
                                        </div>

                                        <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                            <select class="selectpicker col-sm-10 col-md-10 col-lg-11 col-xl-11"
                                                data-live-search="true" name="sub_Dentity" id="sub_Dentity"
                                                title="{{ __('lang.select') . __('lang.sub_dentity') }}">
                                                @foreach ($sub_entities as $sub_entity)
                                                    <option value="{{ $sub_entity->id }}"
                                                        title="{{ $sub_entity->name }}"
                                                        {{ $dalil_phone->sub_entity_id == $sub_entity->id ? 'selected' : '' }}
                                                        data-tokens="{{ $sub_entity->name }}">
                                                        {{ $sub_entity->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="valid-feedback">
                                            {{ __('lang.looks_good') }}
                                        </div>
                                        <div class="invalid-feedback">
                                            {{ __('lang.please_choose') . __('lang.sub_dentity') }}.
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group form-group-lg row">
                                    <div class="col-sm-2 col-md-4 col-lg-6 col-xl-1">
                                        <label for="name">{{ __('lang.name') }}</label>
                                    </div>

                                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">

                                        <input class="form-control" type="text" placeholder="{{ __('lang.name') }}"
                                            name="name" value="{{ $dalil_phone->name }}" required autofocus>

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
                                            name="job" value="{{ $dalil_phone->job }}" required autofocus>

                                    </div>
                                    <div class="valid-feedback">
                                        {{ __('lang.looks_good') }}
                                    </div>
                                    <div class="invalid-feedback">
                                        {{ __('lang.please_choose') . __('lang.job') }}.
                                    </div>
                                </div>

                                <div class="form-group form-group-lg row">
                                    <div class="col-sm-2 col-md-4 col-lg-6 col-xl-1">
                                        <label for="phone">{{ __('lang.Dphone') }}</label>
                                    </div>

                                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
                                        <input class="form-control" type="tel" placeholder="{{ __('lang.Dphone') }}"
                                            name="phone" value="{{ $dalil_phone->phone }}" autofocus>

                                    </div>

                                </div>
                                <div class="form-group form-group-lg row">
                                    <div class="col-sm-2 col-md-4 col-lg-6 col-xl-1">
                                        <label for="mobile">{{ __('lang.mobile') }}</label>
                                    </div>

                                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
                                        <input class="form-control" type="tel" placeholder="{{ __('lang.mobile') }}"
                                            name="mobile" value="{{ $dalil_phone->mobile }}" autofocus>

                                    </div>
                                </div>
                                <div class="form-group form-group-lg row">
                                    <div class="col-sm-2 col-md-4 col-lg-6 col-xl-1">

                                        <label for="fax">{{ __('lang.fax') }}</label>
                                    </div>

                                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
                                        <input class="form-control" type="tel" placeholder="{{ __('lang.fax') }}"
                                            name="fax" value="{{ $dalil_phone->fax }}" autofocus>
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

        // function getEntities(id){
        //     $.ajax({
        //         method: 'GET',
        //         url: '/recording_dalil_phone/get_entities/' + id,
        //         success: function(response) {
        //             if (response.message == "success") {
        //                 if (response.result.sub_entities.length > 0) {
        //                     var data = response.result.sub_entities;
        //                     $('#sub_entity').show();
        //                     data.forEach((elm, index) => {
        //                         var html = '<option value="' + elm.id + '">' + elm.name +
        //                             '</option>';
        //                         $('#sub_Dentity').append(html);
        //                     });
        //                     $('#sub_Dentity').selectpicker('refresh');
        //                 } else {
        //                     $('#sub_entity').hide();
        //                 }
        //             }
        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {}
        //     });
        // }

        // var id = $('#Dentity').val();
        // if(id !== null){
        //     getEntities(id);
        // }

        // $("#Dentity").change(function() {
        //     var dalil_entity_id = $('#Dentity').val();
        //     getEntities(dalil_entity_id);
        // });
    </script>
@endsection
