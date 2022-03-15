@extends('dashboard.showLayout')

@section('content')
    <style>
        .reportsOperation_datatable {
            direction: rtl;
        }

        .title_header1 {
            color: black;
            margin-top: 1.25rem !important;
            margin-right: -3%;
            font-size: 20px;
        }

        @media print {
            .table-bordered {
                border: 1px solid;
                border-color: #000000 !important;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 1px solid;
                border-bottom-color: #000000 !important;

            }

            .table-bordered th,
            .table-bordered td {
                border: 1px solid;
                border-color: #000000 !important;

            }

            table.table-bordered.dataTable {
                border-right-width: 1px;
                border-bottom-width: 0 !important;
            }

            table.table-bordered.dataTable tbody td {
                border-bottom-width: 1px !important;
            }

            .portsaid_logo_p {
                font-size: 15px;
                float: right;
                margin-right: -8%;
                margin-left: 50%;
                margin-top: -11%;
                margin-bottom: -2%;
                color: #000;
                font-size: 20px;
                font-weight: 600;
            }

            .npsn_logo_p {
                font-size: 15px;
                float: left;
                margin-right: 71%;
                margin-top: -2%;
                margin-bottom: 1%;
                color: #000;
                font-size: 20px;
                font-weight: 600;

            }

            .title_header {
                text-algin: center;
                margin-left: 25%;
                font-size: 25px;
                margin-top: 2%;
                margin-bottom: 3%;
                color: #000;
            }

            @page {
                size: A4 landscape;
                margin: 4mm 8mm 4mm 8mm;
            }
        }

    </style>
    <div class="form-group col-xl-12 text-center title_header1">
        <strong>{{ __('lang.typical_reports_operation') }}</strong>
    </div>

    <input type="hidden" name="data" id="data_print">

    <div class="card-body">
        <table class="table table-responsive-sm table-bordered table-striped reportsOperation_datatable"
            style="table-layout: fixed;">
            <thead class="text-center">
                <tr class="incoming_tr ">
                    <th style="width: 3%;">{{ __('lang.id') }}</th>
                    <th>{{ __('lang.name') }}</th>
                    <th>{{ __('lang.job') }}</th>
                    <th>{{ __('lang.address') }}</th>
                    <th>{{ __('lang.work_phone') }}</th>
                    <th>{{ __('lang.phone') }}</th>
                </tr>
            </thead>

        </table>


    </div>

@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            var table = $('.reportsOperation_datatable').DataTable({
                language: {
                    url: '{{ asset('/assets/lang/ar.json') }}'
                },
                dom: 'lfBrtip',
                buttons: [{
                    extend: 'print',
                    position: 'bottom',
                    text: '{{ __('lang.print') }}',
                    autoPrint: true,
                    exportOptions: {
                        columns: ':visible',
                        stripHtml: true
                    },
                    title: '<div class="title_header"><strong> {{ __('lang.typical_reports_operation') }} </strong></div>',
                    customize: function(win) {
                        var last = null;
                        var current = null;
                        var bod = [];

                        var css =
                            '@page { size: A4 landscape;}.table-bordered{border-color:#000}',
                            head = win.document.head || win.document.getElementsByTagName(
                                'head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        } else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                        $(win.document.body).find('th').addClass('text-center');
                        $(win.document.body).find('.table-bordered').css('border-color',
                            '#000!important');
                        $(win.document.body).find('.table thead th').each(function(index) {
                            $(this).css(' border-bottom-color', '#000');
                        });
                        $(win.document.body).find('.table-bordered th').each(function(index) {
                            $(this).css('border-color', '#000');
                        });
                        $(win.document.body).find('.table-bordered td').each(function(index) {
                            $(this).css('border-color', '#000');
                        });
                        $(win.document.body).prepend(
                            '<div class="card-header" style="margin-top: -9px;border-bottom: 3px solid #000">' +
                            '<div class="row" style="margin-bottom: -2%;">' +
                            '<div class="form-group col-xl-5" style="float: left;margin-left: 6%;margin-top: -10px;"><img src="{{ url('assets/img/logos/npsn.png') }}" class="npsn_logo" width="110" height="110" alt=""></div>' +
                            '<div class="form-group col-xl-5 npsn_logo_p"><strong><p>{{ __('lang.npsn') }}</p></strong></div>' +
                            '</div><div class="row" style="float: right;">' +
                            '<div class="form-group col-xl-7" style="float: right;margin-left: 50%;margin-top: -48%;"><img src="{{ url('assets/img/logos/port_said_logo.png') }}" class="portsaid_logo" width="100" height="90" alt=""></div>' +
                            '<div class="form-group col-xl-7 portsaid_logo_p"><strong><p>{{ __('lang.portsaid') }}</p></strong></div>' +
                            '</div></div>'
                        )
                    }
                }],
                processing: true,
                ajax: "{{ route('reportsOperation.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: false
                    },
                    {
                        data: 'job',
                        name: 'job',
                        orderable: false
                    },
                    {
                        data: 'address',
                        name: 'address',
                        orderable: false
                    },
                    {
                        data: 'work_phone',
                        name: 'work_phone',
                        orderable: false
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                        orderable: false
                    },
                ],
                responsive: true,
                searching: true,
                order: [
                    [0, 'asc']
                ],
            });

            setTimeout(function() {
                var reportsOperations_checkData = $(".reportsOperation_datatable").dataTable().fnGetData()
                    .length;

                if (reportsOperations_checkData === 0) {
                    $('.foundData').hide();
                    $('.NoData').show();
                } else {
                    $('.NoData').hide();
                    $('.foundData').show();
                }

                table.buttons().container().appendTo('div#tb_wrapper');

                $('.buttons-print').each(function() {
                    $(this).removeClass('btn-secondary').addClass('btn-primary')
                });
                $('.buttons-print span').each(function() {
                    $(this).html(
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">' +
                        '<path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>' +
                        '<path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>' +
                        '</svg> print ');
                });

            }, 1000);



            $('.btn_pdf').click(function() {
                var data_table = $(".reportsOperation_datatable").dataTable().fnGetData();
                $("#data_print2").val(JSON.stringify(data_table));
                $("#inquiry_form2").attr('action', '{{ route("reportsOperation.pdf") }}')
                $("#inquiry_form2").submit();
            });
        });
    </script>
@endsection
