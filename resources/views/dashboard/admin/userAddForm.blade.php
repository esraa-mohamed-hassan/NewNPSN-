@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('lang.add_user')}}</div>
                    <div class="card-body">
                        <br>
                        <form method="POST" class="col-sm-12 col-md-12 col-lg-8 col-xl-7 needs-validation" novalidate action="{{ route('users.store') }}">
                            @csrf
                            @method('POST')
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('lang.name')}}" name="name" value="" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <svg class="c-icon c-icon-sm">
                                          <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                                      </svg>
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
                                <input class="form-control" type="email" placeholder="{{ __('lang.email')}}" name="email" value="" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                  {{ __('lang.please_choose').__('lang.email')}}.
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" minlength="8" placeholder="{{ __('lang.password')}}" name="password" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="cil-lock-locked"></i></span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.password')}}.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <button class="btn btn-block btn-success" type="submit">{{ __('lang.save')}}</button>
                                </div>
                                <div class="col-xl-6">
                                    <a href="{{ route('users.index') }}" class="btn btn-block btn-primary">{{ __('lang.return')}}</a>
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
