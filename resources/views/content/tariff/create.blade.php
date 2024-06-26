@extends('layouts.app')
@section('title', ' - Add Tariff')
@section('content')
<link rel="stylesheet" href="{{ asset('css/custom/tariff.css') }}" />
<div class="container-fluid mb100">
   
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    {{ __('application.tariff.create_new') }}
                    <a class="btn btn-sm btn-primary pull-right" href="{{ route('tariff.index') }}">{{ __('application.tariff.tariff_list') }}</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tariff.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="place_id" class="col-md-4 col-form-label text-md-right"> {{ __('application.tariff.place') }} <span class="tcr i-req">*</span></label>
                            <div class="col-md-8">
                                <select name="place_id" id="place_id" class="select2 form-control{{ $errors->has('place_id') ? ' is-invalid' : '' }}" required>
                                    @foreach ($places as $key => $place)
                                       <option value="{{ $place->id }}">{{ $place->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('place_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('place_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"> {{ __('application.tariff.name') }}<span class="tcr i-req">*</span></label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autocomplete="off" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('application.tariff.start_date') }}<span class="tcr i-req">*</span></label>

                            <div class="col-md-8">
                                <input id="start_date" type="text" class="form-control dateTimePicker {{ $errors->has('start_date') ? ' is-invalid' : '' }}" name="start_date" value="{{ old('start_date') }}" autocomplete="off" required>

                                @if ($errors->has('start_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('application.tariff.end_date') }} <span class="tcr i-req">*</span> </label>

                            <div class="col-md-8">
                                <input id="end_date"  type="text" class="form-control dateTimePicker{{ $errors->has('end_date') ? ' is-invalid' : '' }}" name="end_date" value="{{ old('end_date') }}" autocomplete="off" required>

                                @if ($errors->has('end_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                @endif
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right"> {{ __('application.tariff.type') }} <span class="tcr i-req">*</span></label>
                            <div class="col-md-8">
                                <select name="category_id" id="category_id" class="select2 form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" required>
                                    
                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="min_amount" class="col-md-4 col-form-label text-md-right"> {{ __('application.tariff.min_amount') }} <span class="tcr i-req">*</span></label>

                            <div class="col-md-8">
                                <input id="min_amount" type="number" step="any" class="form-control {{ $errors->has('min_amount') ? ' is-invalid' : '' }}" name="min_amount" value="{{ old('min_amount') }}" autocomplete="off" required>

                                @if ($errors->has('min_amount'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('min_amount') }}</strong>
                                    </span>
                                @endif
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('application.tariff.amount') }}<span class="tcr i-req">*</span>  <i class="f-12"> (Per/hour)</i></label>

                            <div class="col-md-8">
                                <input id="amount" type="number" step="any" class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{ old('amount') }}" autocomplete="off" required>

                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('application.tariff.status') }}<span class="tcr i-req">*</span> </label>
                            <div class="col-md-8">

                                <select name="status" id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" required>
                                    <option value="1" {{ (old('status') == '1') ? ' selected' : '' }}>{{ __('application.tariff.enable') }}</option>
                                    <option value="0" {{ (old('status') == '0') ? ' selected' : '' }}>{{ __('application.tariff.disable') }}</option>
                                </select>

                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>                                            

                        <div class="form-group row mb-0 d-flex justify-content-end">
                            <div class="col-md-4 offset-md-2 justify-content-end d-flex">
                                <button type="submit" class="btn btn-success me-2">
                                    {{ __('application.tariff.save') }}
                                </button>
                                <button type="reset" class="btn btn-secondary" id="frmClear">
                                    {{ __('application.tariff.clear') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
@push('scripts')
<script>
    var categories = @json($categories);
</script>
<script src="{{ asset('js/custom/settings/tariff.js') }}"></script>
@endpush