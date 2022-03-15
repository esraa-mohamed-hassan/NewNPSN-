@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-8 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('lang.user')}}</div>
                    <div class="card-body">
                        <h4>{{ __('lang.name')}}: {{ $user->name }}</h4>
                        <h4>{{ __('lang.email')}}: {{ $user->email }}</h4>
                        <a href="{{ route('users.index') }}" class="col-sm-3 col-md-3 col-lg-4 col-xl-3 btn btn-block btn-primary">{{ __('lang.return')}}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection
