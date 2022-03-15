@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('lang.edit')}}</div>
                    <div class="card-body">
                        <br>
                        <form method="POST" class="col-sm-12 col-md-12 col-lg-8 col-xl-7 needs-validation" novalidate action="{{ route('medicalServices.update') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $medical_service->id }}">
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('lang.hospital')}}" name="hospital" value="{{ $medical_service->hospital }}" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.hospital')}}.
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('lang.address')}}" name="address" value="{{ $medical_service->address }}" required autofocus>
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
                                <input class="form-control" type="tel" placeholder="{{ __('lang.phone')}}" name="phone" value="{{ $medical_service->phone }}" required autofocus>
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
                                <input class="form-control" type="tel" placeholder="{{ __('lang.no_doctors')}}" name="no_doctors" value="{{ $medical_service->no_doctors }}" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.no_doctors')}}.
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <input class="form-control" type="tel" placeholder="{{ __('lang.no_beds')}}" name="no_beds" value="{{ $medical_service->no_beds }}" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.no_beds')}}.
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="tel" placeholder="{{ __('lang.no_operating_rooms')}}" name="no_operating_rooms" value="{{ $medical_service->no_operating_rooms }}" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.no_operating_rooms')}}.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <button class="btn btn-block btn-success" type="submit">{{ __('lang.save')}}</button>
                                </div>
                                <div class="col-xl-6">
                                    <a href="{{ route('medicalServices.index') }}" class="btn btn-block btn-primary">{{ __('lang.return')}}</a>
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
