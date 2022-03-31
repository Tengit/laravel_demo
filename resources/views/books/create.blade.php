@section('title', trans('cruds.book.title_singular'))
@extends('commons.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ trans('global.create') }} {{ trans('cruds.book.title_singular') }}
        </h6>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.books.store") }}" enctype="multipart/form-data" id="crudsBookForm">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.book.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="isbn">{{ trans('cruds.book.fields.isbn') }}</label>
                <input class="form-control {{ $errors->has('isbn') ? 'is-invalid' : '' }}" type="text" name="isbn" id="isbn" value="{{ old('isbn', '') }}">
                @if($errors->has('isbn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('isbn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="num_pages">Page's number</label>
                <input class="form-control {{ $errors->has('num_pages') ? 'is-invalid' : '' }}" type="text" name="num_pages" id="num_pages" value="{{ old('num_pages', '') }}">
                @if($errors->has('num_pages'))
                    <div class="invalid-feedback">
                        {{ $errors->first('num_pages') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label class="required" for="quantity">Quantity</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantity" id="quantity" value="{{ old('quantity', '') }}">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label class="required" for="price">Price</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', '') }}">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label class="required" for="edition">Edition</label>
                <input class="form-control {{ $errors->has('edition') ? 'is-invalid' : '' }}" type="text" name="edition" id="edition" value="{{ old('edition', '') }}">
                @if($errors->has('edition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('edition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="date_published">{{ trans('cruds.book.fields.date_published') }}</label>
                <input class="form-control date {{ $errors->has('date_published') ? 'is-invalid' : '' }}" type="date" name="date_published" id="date_published" value="{{ old('date_published') }}">
                @if($errors->has('date_published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="content">{{ trans('cruds.book.fields.content') }}</label>
                <textarea id="content" name="content" rows="3" class="form-control summernote {{ $errors->has('content') ? 'is-invalid' : '' }}">{{ old('content') }}</textarea>
                @if($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="description">{{ trans('cruds.book.fields.description') }}</label>
                <textarea name="description" rows="3" class="form-control summernote {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="category">{{ trans('cruds.book.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                        <option
                            value="">-Select Category-</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                <label class="required" for="author">{{ trans('cruds.book.fields.author') }}</label>
                <select name="authorlist[]" id="authorlist" class="form-control select2 selectpicker" multiple data-live-search="true">
                    <option value="" disabled selected>-Select Author-</option>
                    @foreach ($authors as $author)
                        @if( old('authorlist') )
                            <option value="{{ $author->id }}" {{ in_array($author->id, old('authorlist')) ? 'selected' : '' }}>{{ $author->name }}</option>   
                        @else
                            <option value="{{ $author->id }}">{{$author->name}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('authorlist'))
                    <div class="invalid-feedback">
                        {{ $errors->first('authorlist') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="publisher">{{ trans('cruds.book.fields.publisher') }}</label>
                <select class="form-control select2 {{ $errors->has('publisher_id') ? 'is-invalid' : '' }}" name="publisher_id" id="publisher_id">
                        <option
                            value="">-Select Publisher-</option>
                    @foreach($publishers as $publisher)
                        <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('publisher_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('publisher_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="condition">{{ trans('cruds.book.fields.condition') }}</label>
                <select class="form-control select2 {{ $errors->has('condition') ? 'is-invalid' : '' }}" name="condition" id="condition">
                        <option
                            value="">-Select Condition-</option>
                        <option value="Old" {{ old('condition') == 'Old' ? 'selected' : '' }}>Old</option>
                        <option value="New" {{ old('condition') == 'New' ? 'selected' : '' }}>New</option>
                </select>
                @if($errors->has('condition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('condition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.book.fields.image') }}</label>
                <input type="file" name="image" class="form-control" placeholder="image">
                @if($errors->has('images'))
                    <div class="invalid-feedback">
                        {{ $errors->first('images') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-primary" href="{{ route('admin.home') }}">
                    Back to Books
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/books/book.js') }}"></script>
@endpush
