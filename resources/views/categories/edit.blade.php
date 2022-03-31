@section('title', trans('cruds.category.title_singular'))
@extends('commons.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ trans('global.edit') }} {{ trans('cruds.category.title_singular') }}
        </h6>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data" id="crudsCategoryForm">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.category.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $category->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="abbreviation">{{ trans('cruds.category.fields.abbreviation') }}</label>
                <input class="form-control {{ $errors->has('abbreviation') ? 'is-invalid' : '' }}" type="text" name="abbreviation" id="abbreviation" value="{{ old('abbreviation', $category->abbreviation) }}">
                @if($errors->has('abbreviation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('abbreviation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label  for="description">{{ trans('cruds.category.fields.description') }}</label>
                <textarea id="description" name="description" rows="3" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description', $category->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    {{ __('Update') }}
                </button>
                <a class="btn btn-success" href="{{ route('admin.categories.index') }}">
                    Back to Categories
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/categories/category.js') }}"></script>
@endpush
