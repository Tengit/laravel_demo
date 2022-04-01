@section('title', trans('cruds.author.title_singular'))
@extends('commons.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ trans('global.create') }} {{ trans('cruds.author.title_singular') }}
        </h6>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.authors.store") }}" enctype="multipart/form-data" id="crudsAuthorForm">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.author.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.author.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="biography">{{ trans('cruds.author.fields.biography') }}</label>
                <textarea id="biography" name="biography" rows="3" class="form-control {{ $errors->has('biography') ? 'is-invalid' : '' }}">{{ old('biography') }}</textarea>
                @if($errors->has('biography'))
                    <div class="invalid-feedback">
                        {{ $errors->first('biography') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.author.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="address">{{ trans('cruds.author.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.author.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="birthday">{{ trans('cruds.author.fields.birthday') }}</label>
                <input class="form-control date {{ $errors->has('birthday') ? 'is-invalid' : '' }}" type="date" name="birthday" id="birthday" value="{{ old('birthday') }}">
                @if($errors->has('birthday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birthday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.author.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.author.fields.email') }}</label>
                <input class="form-control email {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.author.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-primary" href="{{ route('admin.authors.index') }}">
                    Back to Authors
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/authors/author.js') }}"></script>
@endpush
