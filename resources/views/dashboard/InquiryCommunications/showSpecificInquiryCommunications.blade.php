@extends('dashboard.base')

@section('content')
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .table td {
        font-weight: 600;
        font-size: 18px;
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid;
        border-top-color: #d8dbe0;
        border-bottom: 1px solid;
        border-bottom-color: #d8dbe0;
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
        font-size: 20px;
        font-weight: 600;
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
        font-size: 20px;
        font-weight: 600;
    }

    .center_p {
        font-size: 22px;
        font-weight: 900;
        margin-top: 7%;
        text-align: center;
        margin-right: -18%;
        border-bottom: 2px solid #3c4b64;
    }

    .centerprint_p {
        font-size: 30px;
        font-weight: 900;
        text-align: center;
        margin-right: -12%;
        margin-top: -11%;
        color: black;
    }

    .footer1_p {
        margin-left: 17%;
        margin-top: 3%;
        text-align: left;
        font-size: 18px;
        font-weight: 600;
    }

    .footer_p {
        text-align: left;
        font-size: 18px;
        font-weight: 600;
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

    .table>thead {
        color: #15069b;
        font-size: 18px;
    }

    .incomingReports_datatable {
        direction: rtl;
    }

    .p_text {
        /* border-bottom: 2px solid #af0524; */
        display: contents;
        display: inline-block;
        padding-bottom: 2px;
        color: #af0524;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: -1%;
        float: right;
        direction: rtl;
    }

    .table>tbody {
        font-size: 14px;
        color: black;
    }

    .incoming_tr {
        background-color: #f3fff6;
        text-align: center;
    }

    .text-data {
        font-size: 16px;
        font-weight: 700;
        color: black;
    }

    @media print {


        .print_content {
            display: block !important;
        }

        .noprint_content {
            display: none !important;
        }

        @page {
            size: A4 landscape;
            margin: 8mm 4mm 4mm 4mm;
        }

        table {
            page-break-inside: avoid;
            page-break-after: always;
            page-break-before: always;
            border-collapse: collapse;
            display: block;
            position: relative;
        }

        .card-body {
            display: block;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: always;
            page-break-before: always;
            height: fit-content;
        }

        td {
            page-break-inside: avoid;
            page-break-after: always;
            page-break-before: always;
        }

        thead {
            color: #000;
            border-top: 2px solid black;
            font-weight: 700;
            font-size: 22px !important;
            position: block;

        }

        .footer1_p {
            margin-top: -3%;
            margin-left: 10%;
            margin-bottom: 2%;
            font-weight: 800;
            font-size: 23px;
            color: black;
        }

        .footer_p {
            font-weight: 800;
            font-size: 23px;
            color: black;
        }

        .npsn_logo1 {
            float: left;
            margin-left: -14%;
            margin-top: 0%;
        }

        .npsn_logo_div {
            float: left;
            margin-right: 71%;
            margin-top: -6%;
            margin-bottom: 1%;
        }

        .npsn_logo_p {
            font-size: 20px;
            font-weight: 600;
            color: black;
        }

        .portsaid_logo1 {
            float: right;
            margin-left: 50%;
            margin-top: -55%;
        }

        .portsaid_logo_div {
            float: right;
            margin-right: -1%;
            margin-left: 45%;
            margin-top: -27%;
        }

        .portsaid_logo_p {
            font-size: 20px;
            font-weight: 600;
            color: black;

        }

        .card-footer {
            border-top: none !important;
        }

        .card-header {
            border-bottom: none !important;
            padding-bottom: 0%;
            margin-bottom: -1%;
            margin-top: 0%;
        }

        .incomingReports_datatable {
            direction: rtl;
        }

        .p_text {
            display: contents;
            display: inline-block;
            padding-bottom: 2px;
            color: #af0524;
            font-weight: 700;
            font-size: 20px;
            margin-bottom: -1%;
            float: right;
            direction: rtl;
        }

        .table td {
            font-weight: 700;
            font-size: 20px;
            padding: 0.75rem;
        }

        .table-bordered th,
        .table-bordered td {
            border: 2px solid !important;
            border-color: black !important;
            border-top: 0px !important;
        }

    }

    .print_content {
        display: none;
    }

    .noprint_content {
        display: block !important;
    }

    table.dataTable thead .sorting:before,
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before,
        table.dataTable thead .sorting_desc_disabled:after {
            position: absolute;
            bottom: 0.9em;
            display: block;
            opacity: 0;
        }

</style>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12">
                    <div class="card-header header_buttons">
                        <div class="row">
                            <div class="col-xl-6">
                                <button type="button" class="w-100 btn btn-primary btn_print">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-printer" viewBox="0 0 16 16">
                                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                        <path
                                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                    </svg>
                                    {{ __('lang.print') }}
                                </button>
                            </div>

                            <div class="col-xl-6">
                                <form id="inquiry_form2" action="{{ route('specificInquiry.pdf') }}"  method="POST">
                                    <input type="hidden" value="{{ json_encode($all_data) }}" name="data" id="data_print2">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12">
                    @if (Session::has('message'))
                        <div class="alert alert-success w-50 text-center" style="transform: translate(-50%, -50%);"
                            role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <div class="card card_print">
                        <div class="card-header noprint_content">
                            <div class="row">
                                <div class="col-xl-4">
                                    <img src="{{ url('assets/img/logos/port_said_logo.png') }}" class="portsaid_logo"
                                        width="75" height="67" alt="">
                                    <p class="portsaid_logo_p">{{ __('lang.portsaid') }}</p>
                                </div>
                                <div class="col-xl-4">
                                    <p class="center_p">{{ __('lang.report_incoming_communication') }}
                                        <br>
                                        <span>تاريخ 9 سبتمبر 2021 إلى تاريخ 9 سبتمبر 2021</span>
                                    </p>
                                </div>
                                <div class="col-xl-4">
                                    <img src="{{ url('assets/img/logos/npsn.png') }}" class="npsn_logo" width="75"
                                        height="75" alt="">
                                    <p class="npsn_logo_p">{{ __('lang.npsn') }}</p>
                                </div>
                            </div>
                        </div>


                        <div class="card-header print_content">
                            <div class="row">
                                <div class="form-group col-xl-5 npsn_logo1">
                                    <img src="{{ url('assets/img/logos/npsn.png') }}" class="npsn_logo"
                                        width="110" height="110" alt="">
                                </div>
                                <div class="form-group col-xl-5 npsn_logo_div">
                                    <strong>
                                        <p class="npsn_logo_p">
                                            {{ __('lang.npsn') }}</p>
                                    </strong>
                                </div>
                            </div>
                            <p class="centerprint_p print_content">{{ __('lang.report_incoming_communication') }}
                                <br>
                                <span>تاريخ 9 سبتمبر 2021 إلى تاريخ 9 سبتمبر 2021</span>
                            </p>
                            <div class="row" style="float: right;">
                                <div class="form-group col-xl-7 portsaid_logo1">
                                    <img src="{{ url('assets/img/logos/port_said_logo.png') }}"
                                        class="portsaid_logo" width="100" height="90" alt="">
                                </div>
                                <div class="form-group col-xl-7 portsaid_logo_div">
                                    <strong>
                                        <p class="portsaid_logo_p">
                                            {{ __('lang.portsaid') }}
                                        </p>
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">

                            <table class="table table-responsive-sm table-striped table-bordered incomingReports_datatable">
                                <thead>
                                    <tr class="incoming_tr">
                                        <th style="width: 10%">{{ __('lang.entity') }}</th>
                                        <th style="width: 9%">{{ __('lang.date_incoming_reports') }}</th>
                                        <th style="width: 6%">{{ __('lang.time_incoming_reports') }}</th>
                                        <th style="width: 23%">{{ __('lang.subject_incoming_reports') }}</th>
                                        <th style="width: 10%">إجراءات الشبكة</th>
                                        <th style="width: 31%">{{ __('lang.procedures_authorities') }}</th>
                                        <th style="width: 21%">{{ __('lang.result_incoming_reports') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($all_data as $key => $data)
                                        <tr>
                                            <td class="text-center">{{ $data->entity }} </td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $data->date)->translatedFormat('d M Y') }}
                                            </td>
                                            <td class="text-center"> {{ $data->time }} </td>
                                            <td class="text-center text-data"> {!! $data->subject !!} </td>
                                            <td class="text-center text-data"> {!! $data->procedures_npsn !!} </td>
                                            <td class="text-center text-data"> {!! $data->procedures_authorities !!} </td>
                                            <td class="text-center text-data"> {!! $data->result !!} </td>
                                        </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>


                        <div class="card-footer" style="border-top: 2px solid #6a6c70;">
                            <div class="row">
                                <div class="col-xl-4"></div>
                                <div class="col-xl-4"></div>
                                <div class="col-xl-4">
                                    <p class="footer1_p">{{ __('lang.npsn_name') }}</p>
                                    <p class="footer_p">{{ __('lang.npsn_manager') }}</p>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="all_data" id="all_data" value="{{ json_encode($all_data) }}">

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('javascript')
    <script>
        $('.btn_print').click(function() {
            $('.card_print').print({
                globalStyles: true,
                mediaPrint: true,
                stylesheet: null,
                noPrintSelector: ".noprint_content",
                iframe: true,
                append: null,
                prepend: null,
                manuallyCopyFormValues: true,
                deferred: $.Deferred(),
                // timeout: 750,
                // title: null,
                // doctype: '<!doctype html>'
            });
        });

        $('.btn_pdf').click(function() {
            $("#inquiry_form2").submit();
        });

        $('.c-sidebar-minimizer').click();
    </script>
@endsection
