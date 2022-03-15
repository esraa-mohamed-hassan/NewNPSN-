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
                                        <th>{{ __('lang.event_type') }}</th>
                                        <th>{{ __('lang.entity') }}</th>
                                        <th style="width: 13%;">{{ __('lang.date_incoming_reports') }}</th>
                                        <th>{{ __('lang.time_incoming_reports') }}</th>
                                        <th style="width: 15%;">{{ __('lang.special_entity') }}</th>
                                        <th>{{ __('lang.event') }}</th>
                                        <th>{{ __('lang.procedures') }}</th>
                                        <th style="width: 15%;">{{ __('lang.result_recording_event') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"> {{ $recording_event->event_type }} </td>
                                        <td class="text-center"> {{ $recording_event->entity_type }} </td>
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $recording_event->date)->translatedFormat('d M Y') }}
                                        </td>
                                        <td class="text-center"> {{ $recording_event->time }} </td>
                                        <td class="text-center"> {!! $recording_event->special_entity !!} </td>
                                        <td class="text-center"> {!! $recording_event->event !!} </td>
                                        <td class="text-center"> {!! $recording_event->procedures !!} </td>
                                        <td class="text-center"> {!! $recording_event->result !!} </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12">
                                    <div class="header_buttons">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <form id="inquiry_form2" action="{{ route('recordingEvent.pdf') }}"  method="POST">
                                                    <input type="hidden" value="{{ json_encode($recording_event) }}" name="data" id="data_print2">
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
                                            <div class="col-xl-6">
                                                <a href="{{ route('recordingEvent.index') }}"
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
<script>
     $('.btn_pdf').click(function() {
            $("#inquiry_form2").submit();
        });
</script>
@endsection
