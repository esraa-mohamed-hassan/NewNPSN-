@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-8 col-xl-7">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('lang.medical_services')}}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="{{ __('lang.hospital')}}">{{ __('lang.hospital')}}</label>
                            <input class="form-control" type="text" placeholder="{{ __('lang.hospital')}}" name="hospital" value="{{ $medical_service->hospital }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.address')}}">{{ __('lang.address')}}</label>
                            <input class="form-control" type="text" placeholder="{{ __('lang.address')}}" name="address" value="{{ $medical_service->address }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.phone')}}">{{ __('lang.phone')}}</label>
                            <input class="form-control" type="tel" placeholder="{{ __('lang.phone')}}" name="phone" value="{{ $medical_service->phone }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.no_doctors')}}">{{ __('lang.no_doctors')}}</label>
                            <input class="form-control" type="text" placeholder="{{ __('lang.no_doctors')}}" name="no_doctors" value="{{ $medical_service->no_doctors }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.no_beds')}}">{{ __('lang.no_beds')}}</label>
                            <input class="form-control" type="tel" placeholder="{{ __('lang.no_beds')}}" name="no_beds" value="{{ $medical_service->no_beds }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.no_operating_rooms')}}">{{ __('lang.no_operating_rooms')}}</label>
                            <input class="form-control" type="tel" placeholder="{{ __('lang.no_operating_rooms')}}" name="no_operating_rooms" value="{{ $medical_service->no_operating_rooms }}" readonly autofocus>
                        </div>
                        <a href="{{ route('medicalServices.index') }}" class="col-sm-3 col-md-3 col-lg-4 col-xl-3 btn btn-block btn-primary">{{ __('lang.return')}}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection
