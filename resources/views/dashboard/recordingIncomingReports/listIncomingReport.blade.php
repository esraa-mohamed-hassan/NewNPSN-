@extends('dashboard.base')

@section('content')
    <style>
        table.dataTable th {
            white-space: nowrap;
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
                                    <i class="fa fa-align-justify"></i>{{ __('lang.recording_incoming_reports') }}
                                </div>
                                <div class="col-xl-6">
                                    <a href="{{ route('incomingreport.create') }}"
                                        class="col-xl-5 btn btn-block btn-primary"
                                        style="float: left;">{{ __('lang.add_incoming_reports') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped incomingReports_datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">{{ __('lang.id') }}</th>
                                        <th style="width: 10%">{{ __('lang.date_incoming_reports') }}</th>
                                        <th style="width: 10%">{{ __('lang.time_incoming_reports') }}</th>
                                        <th style="width: 25%">{{ __('lang.subject_incoming_reports') }}</th>
                                        <th style="width: 17%">{{ __('lang.procedures_npsn') }}</th>
                                        <th style="width: 25%">{{ __('lang.procedures_authorities') }}</th>
                                        <th style="width: 20%">{{ __('lang.result_incoming_reports') }}</th>
                                        <th style="width: 10%">{{ __('lang.action')}}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

    <script type="text/javascript">
        $(function() {

            $('.c-sidebar-minimizer').click();
            var table = $('.incomingReports_datatable').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: '{{ asset("/assets/lang/ar.json") }}'
                },
                ajax: "{{ route('incomingreport.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'time',
                        name: 'time'
                    },
                    {
                        data: 'subject',
                        name: 'subject'
                    },
                    {
                        data: 'procedures_npsn',
                        name: 'procedures_npsn'
                    },
                    {
                        data: 'procedures_authorities',
                        name: 'procedures_authorities'
                    },
                    {
                        data: 'result',
                        name: 'result'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                responsive: true,
                searching: true,
                order: [
                    [0, 'asc']
                ],
            });

        });
    </script>
@endsection
