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
                                    <i class="fa fa-align-justify"></i>{{ __('lang.recording_event_data') }}
                                </div>
                                <div class="col-xl-6">
                                    <a href="{{ route('recordingEvent.create') }}"
                                        class="col-xl-5 btn btn-block btn-primary"
                                        style="float: left;">{{ __('lang.add_recording_eventData') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped recordingEvent_datatable">
                                <thead>
                                    <tr>
                                        <th>{{ __('lang.id') }}</th>
                                        <th>{{ __('lang.event_type') }}</th>
                                        <th>{{ __('lang.entity') }}</th>
                                        <th>{{ __('lang.date_incoming_reports') }}</th>
                                        <th>{{ __('lang.time_incoming_reports') }}</th>
                                        <th>{{ __('lang.special_entity') }}</th>
                                        <th>{{ __('lang.event') }}</th>
                                        <th>{{ __('lang.procedures') }}</th>
                                        <th>{{ __('lang.result_recording_event') }}</th>
                                        <th>{{ __('lang.action') }}</th>
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
            var table = $('.recordingEvent_datatable').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: '{{ asset("/assets/lang/ar.json") }}'
                },
                ajax: "{{ route('recordingEvent.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'event_type',
                        name: 'event_type'
                    },
                    {
                        data: 'entity_type',
                        name: 'entity_type'
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
                        data: 'special_entity',
                        name: 'special_entity'
                    },
                    {
                        data: 'event',
                        name: 'event'
                    },
                    {
                        data: 'procedures',
                        name: 'procedures'
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
