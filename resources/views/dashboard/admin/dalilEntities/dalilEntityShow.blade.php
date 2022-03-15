@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-7">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('lang.dalil_entity') }}
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="{{ __('lang.Dentity') }}">{{ __('lang.Dentity') }}</label>
                                <input class="form-control" type="text" placeholder="{{ __('lang.Dentity') }}"
                                    name="entity" value="{{ $dalil_entity->entity }}" readonly autofocus>
                            </div>
                            @if (count($dalil_entity->subEntities) != 0)
                                <div class="form-group">
                                    <label for="{{ __('lang.Dentity') }}">{{ __('lang.Dentity') }}</label>
                                    <select name="sub_entity" id="sub_entity" class="form-control">
                                        @foreach ($dalil_entity->subEntities as $sub_entity)
                                            <option value="{{ $sub_entity->id }}">{{ $sub_entity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <a href="{{ route('dalilEntity.index') }}"
                                class="col-sm-3 col-md-3 col-lg-4 col-xl-3 btn btn-block btn-primary">{{ __('lang.return') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection
