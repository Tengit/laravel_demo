@extends('commons.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.book.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.books.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.book.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="isbn">{{ trans('cruds.book.fields.isbn') }}</label>
                <input class="form-control {{ $errors->has('isbn') ? 'is-invalid' : '' }}" type="text" name="isbn" id="isbn" value="{{ old('isbn', '') }}" required>
                @if($errors->has('isbn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('isbn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.category.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                        <option
                            value="">-Select Category-</option>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
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