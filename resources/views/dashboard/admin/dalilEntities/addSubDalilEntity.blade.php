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
                      <i class="fa fa-align-justify"></i> {{ __('lang.dalil_entity')}}</div>
                    <div class="card-body">
                        <br>
                        <form method="POST" class="col-sm-12 col-md-12 col-lg-8 col-xl-7 needs-validation" novalidate action="{{ route('entity.storeAddEntity') }}">
                            @csrf
                            @method('POST')
                            <input type="hidden" value="{{ $id }}" name="entity_id" id="entity_id">
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" placeholder="{{ __('lang.Dentity')}}" name="name" value="" required autofocus>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-description c-icon c-icon-sm"></i>
                                    </span>
                                </div>
                                <div class="valid-feedback">
                                    {{ __('lang.looks_good')}}
                                </div>
                                <div class="invalid-feedback">
                                    {{ __('lang.please_choose').__('lang.Dentity')}}.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <button class="btn btn-block btn-success" type="submit">{{ __('lang.save')}}</button>
                                </div>
                                <div class="col-xl-6">
                                    <a href="{{ route('dalilEntity.index') }}" class="btn btn-block btn-primary">{{ __('lang.return')}}</a>
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
