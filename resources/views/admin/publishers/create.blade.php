@section('title', trans('cruds.publisher.title_singular'))
@extends('commons.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ trans('global.create') }} {{ trans('cruds.publisher.title_singular') }}
        </h6>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.publishers.store") }}" enctype="multipart/form-data" id="crudsPublisherForm">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.publisher.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.publisher.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="description">{{ trans('cruds.publisher.fields.description') }}</label>
                <textarea id="description" name="description" rows="3" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.publisher.fields.email') }}</label>
                <input class="form-control email {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-primary" href="{{ route('admin.publishers.index') }}">
                    Back to Publishers
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/publishers/publisher.js') }}"></script>
@endpush
