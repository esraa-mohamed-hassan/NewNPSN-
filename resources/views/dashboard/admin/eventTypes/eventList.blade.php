@extends('dashboard.base')

@section('content')
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12">
                @if(Session::has('message'))
                <div class="alert alert-success w-50 text-center" style="transform: translate(-50%, -50%);" role="alert">{{ Session::get('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-xl-6">
                                <i class="fa fa-align-justify"></i>{{ __('lang.event_type')}}
                            </div>
                            <div class="col-xl-6">
                                <a href="{{ route('event.create') }}" class="col-xl-5 btn btn-block btn-primary" style="float: left;">{{ __('lang.add_event_type')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped event-datatable">
                        <thead>
                          <tr>
                            <th>{{ __('lang.id')}}</th>
                            <th>{{ __('lang.name')}}</th>
                            <th class="w-50">{{ __('lang.action')}}</th>
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
  $(function () {

    var table = $('.event-datatable').DataTable({
        processing: true,
        serverSide: true,
        language: {
                url: '{{ asset("/assets/lang/ar.json") }}'
            },
        ajax: "{{ route('event.index') }}",
        columns: [
            {data: 'id', name: 'id', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        responsive:true,
        searching: true,
        order: [[ 0, 'asc' ]],
    });

  });

  </script>
@endsection

