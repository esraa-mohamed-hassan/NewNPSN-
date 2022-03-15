@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12">
                @if(Session::has('message'))
                <div class="alert alert-success w-50 text-center" style="transform: translate(-50%, -50%);" role="alert">{{ Session::get('message') }}</div>
                @endif


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('lang.gathering_places')}}</div>
                    <div class="card-body">
                        <br>
                        <form method="POST" class="col-sm-12 col-md-12 col-lg-8 col-xl-7 needs-validation" novalidate action="{{ route('gatheringPlaces.store') }}">
                            @csrf
                            @method('POST')
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('lang.gathering_type')}}" name="gathering_type" value="" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.gathering_type')}}.
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('lang.address')}}" name="address" value="" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.address')}}.
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('lang.carry_capacity')}}" name="carry_capacity" value="" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.carry_capacity')}}.
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="tel" placeholder="{{ __('lang.phone')}}" name="phone" value="" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.phone')}}.
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="tel" placeholder="{{ __('lang.no_roles')}}" name="no_roles" value="" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.no_roles')}}.
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="tel" placeholder="{{ __('lang.building_area')}}" name="building_area" value="" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.building_area')}}.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <button class="btn btn-block btn-success" type="submit">{{ __('lang.save')}}</button>
                                </div>
                                <div class="col-xl-6">
                                    <a href="{{ route('gatheringPlaces.index') }}" class="btn btn-block btn-primary">{{ __('lang.return')}}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')

@endsection
