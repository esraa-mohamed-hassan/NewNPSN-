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
                                <i class="fa fa-align-justify"></i>{{ __('lang.gathering_places')}}
                            </div>
                            <div class="col-xl-6">
                                <a href="{{ route('gatheringPlaces.create') }}" class="col-xl-5 btn btn-block btn-primary" style="float: left;">{{ __('lang.add_gathering_places')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped gatheringPlaces-datatable">
                        <thead>
                          <tr>
                            <th>{{ __('lang.id')}}</th>
                            <th>{{ __('lang.gathering_type')}}</th>
                            <th>{{ __('lang.address')}}</th>
                            <th>{{ __('lang.carry_capacity')}}</th>
                            <th>{{ __('lang.phone')}}</th>
                            <th>{{ __('lang.no_roles')}}</th>
                            <th>{{ __('lang.building_area')}}</th>
                            <th style="width: 243px;">{{ __('lang.action')}}</th>
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

    var table = $('.gatheringPlaces-datatable').DataTable({
        processing: true,
        serverSide: true,
        language: {
                url: '{{ asset("/assets/lang/ar.json") }}'
            },
        ajax: "{{ route('gatheringPlaces.index') }}",
        columns: [
            {data: 'id', name: 'id', orderable: false, searchable: false},
            {data: 'gathering_type', name: 'gathering_type'},
            {data: 'address', name: 'address'},
            {data: 'carry_capacity', name: 'carry_capacity'},
            {data: 'phone', name: 'phone'},
            {data: 'no_roles', name: 'no_roles'},
            {data: 'building_area', name: 'building_area'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        responsive:true,
        searching: true,
        order: [[ 0, 'asc' ]],
    });

  });

  </script>
@endsection

