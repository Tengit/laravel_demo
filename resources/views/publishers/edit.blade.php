@section('title', trans('cruds.publisher.title_singular'))
@extends('commons.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ trans('global.edit') }} {{ trans('cruds.publisher.title_singular') }}
        </h6>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.publishers.update', $publisher->id) }}" enctype="multipart/form-data" id="crudsPublisherForm">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.publisher.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $publisher->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.publisher.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $publisher->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="description">{{ trans('cruds.publisher.fields.description') }}</label>
                <textarea id="description" name="description" rows="3" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description', $publisher->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.publisher.fields.email') }}</label>
                <input class="form-control email {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $publisher->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.publisher.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    {{ __('Update') }}
                </button>
                <a class="btn btn-success" href="{{ route('admin.publishers.index') }}">
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
