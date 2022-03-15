@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-8 col-xl-7">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('lang.gathering_places')}}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="{{ __('lang.gathering_type')}}">{{ __('lang.gathering_type')}}</label>
                            <input class="form-control" type="text" placeholder="{{ __('lang.gathering_type')}}" name="gathering_type" value="{{ $gathering_place->gathering_type }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.address')}}">{{ __('lang.address')}}</label>
                            <input class="form-control" type="text" placeholder="{{ __('lang.address')}}" name="address" value="{{ $gathering_place->address }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.carry_capacity')}}">{{ __('lang.carry_capacity')}}</label>
                            <input class="form-control" type="text" placeholder="{{ __('lang.carry_capacity')}}" name="carry_capacity" value="{{ $gathering_place->carry_capacity }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.phone')}}">{{ __('lang.phone')}}</label>
                            <input class="form-control" type="tel" placeholder="{{ __('lang.phone')}}" name="phone" value="{{ $gathering_place->phone }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.no_roles')}}">{{ __('lang.no_roles')}}</label>
                            <input class="form-control" type="tel" placeholder="{{ __('lang.no_roles')}}" name="no_roles" value="{{ $gathering_place->no_roles }}" readonly autofocus>
                        </div>
                        <div class="form-group">
                            <label for="{{ __('lang.building_area')}}">{{ __('lang.building_area')}}</label>
                            <input class="form-control" type="tel" placeholder="{{ __('lang.building_area')}}" name="building_area" value="{{ $gathering_place->building_area }}" readonly autofocus>
                        </div>
                        <a href="{{ route('gatheringPlaces.index') }}" class="col-sm-3 col-md-3 col-lg-4 col-xl-3 btn btn-block btn-primary">{{ __('lang.return')}}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection
