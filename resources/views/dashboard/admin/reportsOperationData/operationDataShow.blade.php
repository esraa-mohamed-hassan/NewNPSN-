@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-8 col-xl-7">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('lang.operation_data')}}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="{{ __('lang.name')}}">{{ __('lang.name')}}</label>
                            <input class="form-control" type="text" placeholder="{{ __('lang.name')}}" name="name" value="{{ $operation_data->name }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.job')}}">{{ __('lang.job')}}</label>
                            <input class="form-control" type="text" placeholder="{{ __('lang.job')}}" name="job" value="{{ $operation_data->job }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.address')}}">{{ __('lang.address')}}</label>
                            <input class="form-control" type="text" placeholder="{{ __('lang.address')}}" name="address" value="{{ $operation_data->address }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.work_phone')}}">{{ __('lang.work_phone')}}</label>
                            <input class="form-control" type="tel" placeholder="{{ __('lang.work_phone')}}" name="work_phone" value="{{ $operation_data->work_phone }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.phone')}}">{{ __('lang.phone')}}</label>
                            <input class="form-control" type="tel" placeholder="{{ __('lang.phone')}}" name="phone" value="{{ $operation_data->phone }}" readonly autofocus>
                        </div>
                        <a href="{{ route('operationData.index') }}" class="col-sm-3 col-md-3 col-lg-4 col-xl-3 btn btn-block btn-primary">{{ __('lang.return')}}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection
