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
                                    <i class="fa fa-align-justify"></i>{{ __('lang.recording_dalil_phone') }}
                                </div>
                                <div class="col-xl-6">
                                    <a href="{{ route('dalilPhone.create') }}"
                                        class="col-xl-5 btn btn-block btn-primary"
                                        style="float: left;">{{ __('lang.add_dalil_phone') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped dalilPhone_datatable">
                                <thead>
                                    <tr>
                                        <th>{{ __('lang.id') }}</th>
                                        <th>{{ __('lang.Dentity') }}</th>
                                        <th>{{ __('lang.name') }}</th>
                                        <th>{{ __('lang.job') }}</th>
                                        <th>{{ __('lang.Dphone') }}</th>
                                        <th>{{ __('lang.mobile') }}</th>
                                        <th>{{ __('lang.fax') }}</th>
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
            var table = $('.dalilPhone_datatable').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    url: '{{ asset("/assets/lang/ar.json") }}'
                },
                ajax: "{{ route('dalilPhone.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'dalil_entity',
                        name: 'dalil_entity'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'job',
                        name: 'job'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'mobile',
                        name: 'mobile'
                    },
                    {
                        data: 'fax',
                        name: 'fax'
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
