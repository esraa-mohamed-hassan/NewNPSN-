@extends('dashboard.base')

@section('content')
    <style>
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 0px solid;
            border-top-color: #d8dbe0;
        }

        .portsaid_logo {
            display: block;
            margin: auto;
            float: right;
            margin-top: 0%;
            margin-right: 2%;
        }

        .portsaid_logo_p {
            text-align: right;
            margin-top: 21%;
            font-size: 15px;
            font-weight: 500;
        }

        .npsn_logo {
            display: block;
            margin: auto;
            float: left;
            margin-top: -1%;
            margin-left: 21%;
        }

        .npsn_logo_p {
            text-align: left;
            margin-top: 21%;
            font-size: 15px;
            font-weight: 500;
        }

        .center_p {
            font-size: 18px;
            font-weight: bold;
            margin-top: 11%;
            text-align: center;
            margin-right: -18%;
        }

        .footer1_p {
            margin-left: 17%;
            margin-top: 3%;
            text-align: left;
            font-size: 15px;
            font-weight: 500;
        }

        .footer_p {
            text-align: left;
            font-size: 15px;
            font-weight: 500;
            margin-left: 5%;
        }

        .card-footer {
            padding: 0.75rem 1.25rem;
            border-top: 4px solid;
            background-color: #fff;
            border-color: #d8dbe0;
        }

        .header_buttons {
            margin-bottom: 1%;
            border-radius: 5px !important;
        }

        .p_text {
            border-bottom: 2px solid #af0524;
            display: inline-block;
            padding-bottom: 2px;
            color: #af0524;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: -1%;
            float: right;
        }

        .table>thead {
            background-color: darkgrey;
            color: #15069b;
            font-size: 18px;
        }

        .incomming_tr {
            background-color: #f3fff6;
            text-align: center;
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
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped incomingReports_datatable"
                                style="table-layout: fixed;">
                                <thead>
                                    <tr class="incomming_tr">
                                        <th>{{ __('lang.Dentity') }}</th>
                                        @if (!empty($dalil_phone->subEntities))
                                            <th>{{ __('lang.sub_dentity') }}</th>
                                        @endif
                                        <th>{{ __('lang.name') }}</th>
                                        <th>{{ __('lang.job') }}</th>
                                        <th>{{ __('lang.Dphone') }}</th>
                                        <th>{{ __('lang.mobile') }}</th>
                                        <th>{{ __('lang.fax') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"> {{ $dalil_phone->entities->entity }} </td>
                                        @if (!empty($dalil_phone->subEntities))
                                            <td class="text-center"> {{ $dalil_phone->subEntities->name }} </td>
                                        @endif
                                        <td class="text-center"> {{ $dalil_phone->name }} </td>
                                        <td class="text-center"> {{ $dalil_phone->job }} </td>
                                        <td class="text-center"> {{ $dalil_phone->phone }} </td>
                                        <td class="text-center"> {{ $dalil_phone->mobile }} </td>
                                        <td class="text-center"> {{ $dalil_phone->fax }} </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12">
                                    <div class="header_buttons">
                                        <div class="row">
                                            <div class="col-xl-2"></div>
                                            <div class="col-xl-8">
                                                <a href="{{ route('dalilPhone.index') }}"
                                                    class="btn btn-block btn-primary">{{ __('lang.return') }}</a>
                                            </div>
                                            <div class="col-xl-2"></div>
                                        </div>
                                    </div>
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

@endsection
