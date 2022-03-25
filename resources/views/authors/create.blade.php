
@section('title', trans('cruds.author.title_singular'))
@extends('commons.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.author.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("authors.store") }}" enctype="multipart/form-data" id="crudsForm">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.author.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                <span class="text-danger font-weight-bold text-center">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="biography">{{ trans('cruds.author.fields.biography') }}</label>
                <textarea name="biography" id="biography" class="form-control {{ $errors->has('biography') ? 'is-invalid' : '' }}" placeholder="" required>{{ old('biography', '') }}</textarea>
                @if($errors->has('biography'))
                    <span class="text-danger font-weight-bold text-center">{{ $errors->first('biography') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.author.fields.address') }}</label>
                <textarea name="address" id="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="">{{ old('address', '') }}</textarea>
                @if($errors->has('address'))
                    <span class="text-danger font-weight-bold text-center">{{ $errors->first('address') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.author.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', '') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger font-weight-bold text-center">{{ $errors->first('email') }}</span>                        
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection