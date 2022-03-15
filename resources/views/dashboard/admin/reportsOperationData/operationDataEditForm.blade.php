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
                        <form method="POST" class="col-sm-12 col-md-12 col-lg-8 col-xl-7 needs-validation" novalidate action="{{ route('operationData.update') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $operation_data->id }}">
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('lang.name')}}" name="name" value="{{ $operation_data->name }}" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.name')}}.
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('lang.job')}}" name="job" value="{{ $operation_data->job }}" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.job')}}.
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('lang.address')}}" name="address" value="{{ $operation_data->address }}" required autofocus>
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
                                <input class="form-control" type="tel" placeholder="{{ __('lang.work_phone')}}" name="work_phone" value="{{ $operation_data->work_phone }}" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.work_phone')}}.
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="tel" placeholder="{{ __('lang.phone')}}" name="phone" value="{{ $operation_data->phone }}" required autofocus>
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
                            <div class="row">
                                <div class="col-xl-6">
                                    <button class="btn btn-block btn-success" type="submit">{{ __('lang.save')}}</button>
                                </div>
                                <div class="col-xl-6">
                                    <a href="{{ route('operationData.index') }}" class="btn btn-block btn-primary">{{ __('lang.return')}}</a>
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
