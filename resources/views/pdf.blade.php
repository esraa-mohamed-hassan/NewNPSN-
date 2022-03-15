<!doctype html>
<html lang="ar">

<head>
    <title>Laravel 8 DOM PDF Tutorial - Programming Fields</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <style>
        @page {
            margin: 4mm 1mm 4mm 1mm;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;

        }

        .td_none_b {
            border-top: none !important;
        }

        thead, th {
            color: #15069b !important;
            font-size: 18px !important;
            font-weight: bold;
            border-bottom: 2px solid;
            border-bottom-color: gray;
            border-top: 2px solid;
            border-top-color: gray;
            padding: 16px 16px;

        }


        td {
            padding: 16px 16px;
            font-size: 16px;
            font-weight: bold;
        }

         tr:last-child > td {
            border-bottom: none !important;
        }

        .text-data {
            font-size: 19px;
            font-weight: 600;
        }

        .portsaid_logo {
            float: right;
            margin-top: 1px;
            margin-right: 4%;

        }

        .portsaid_logo_p {
            text-align: right;
            float: right;
            font-size: 18px;
            font-weight: 600;
            margin-right: 3%;
            padding-top: 80px;
        }

        .npsn_logo {
            float: left;
            margin-top: -85px;
            margin-left: 10%;
        }

        .npsn_logo_p {
            text-align: left;
            float: left;
            margin-top: -2%;
            font-size: 17px;
            font-weight: 600;
            margin-left: 3%;
        }

        .center_p {
            font-size: 20px;
            font-weight: bold;
            margin-top: -8%;
            text-align: center;
            margin-right: -3%;
        }

        .footer1_p {
            margin-top: 1%;
            margin-left: 10%;
            margin-bottom: 2%;
            font-size: 20px;
            font-weight: 700;
        }

        .footer_p {
            font-size: 20px;
            font-weight: 700;
            margin-left: 6%;
        }


        .card-header {
            margin-bottom: 1%;
            border-bottom: none;
        }

        .card-footer {
            border-top: 1px solid black;
        }

        .incomingReports_datatable {
            direction: rtl;
        }

        .incoming_tr,
        .incoming_tr th {
            background-color: #f3fff6;
            text-align: center;
        }

        .td_style {
            border-bottom: none;
            background-color: white;
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

        .table td {
            padding: 0.75rem !important;
            vertical-align: top !important;
            border-top: 0px solid !important;
            border-top-color: #d8dbe0 !important;
            border-bottom: 2px solid !important;
            border-bottom-color: #d8dbe0 !important;

        }



    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="animated fadeIn">

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-xl-4">
                                    <img src="{{ public_path('assets/img/logos/port_said_logo.png') }}"
                                        class="portsaid_logo" width="75" height="75" alt="">
                                    <p class="portsaid_logo_p">{{ __('lang.portsaid') }}</p>
                                </div>
                                <div class="col-xl-4" style=" margin-top: 2%;">
                                    <p class="center_p">{{ __('lang.report_incoming_communication') }}
                                        <br>
                                        <span>تاريخ 9 سبتمبر 2021 إلى تاريخ 9 سبتمبر 2021</span>
                                    </p>
                                </div>
                                <div class="col-xl-4" style=" margin-top: -3%;">
                                    <img src="{{ public_path('assets/img/logos/npsn.png') }}" class="npsn_logo"
                                        width="75" height="75" alt="">
                                    <p class="npsn_logo_p">{{ __('lang.npsn') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table class="table table-responsive-sm table-striped incomingReports_datatable">
                                <thead>
                                    <tr class="incoming_tr">
                                        <th>{{ __('lang.date_incoming_reports') }}</th>
                                        <th>{{ __('lang.time_incoming_reports') }}</th>
                                        <th style="width: 20%">{{ __('lang.subject_incoming_reports') }}</th>
                                        <th>{{ __('lang.procedure_npsn2') }}</th>
                                        <th style="width: 20%">{{ __('lang.procedures_authorities') }}</th>
                                        <th>{{ __('lang.result_incoming_reports') }}</th>
                                    </tr>
                                </thead>


                                <tbody>
                                @foreach ($data as $elm)

                                <tr class="td_style" style="background-color: white;border-bottom: none;">
                                        <td style="border-bottom: none;margin-top:1%;" colspan="6">
                                            <strong>
                                                <p class="p_text">
                                                    {{ __('lang.entity') . ': ' . $elm->entity }}</p>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center text-data td_none_b">
                                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $elm->date)->translatedFormat('d M Y') }}
                                        </td>
                                        <td class="text-center text-data td_none_b"> {{ $elm->time }} </td>
                                        <td class="text-center text-data td_none_b"> {!! rtrim($elm->subject) !!} </td>
                                        <td class="text-center text-data td_none_b"> {!! rtrim($elm->procedures_npsn) !!} </td>
                                        <td class="text-center text-data td_none_b"> {!! rtrim($elm->procedures_authorities) !!} </td>
                                        <td class="text-center text-data td_none_b"> {!! rtrim($elm->result) !!} </td>
                                    </tr>
                                    @endforeach

                                </tbody>


                            </table>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-xl-4"></div>
                                <div class="col-xl-4"></div>
                                <div class="col-xl-4">
                                    <p class="footer1_p">{{ __('lang.npsn_name') }}</p>
                                    <p class="footer_p">{{ __('lang.npsn_manager') }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
</body>

</html>
