@section('title', trans('cruds.book.title_singular'))
@extends('commons.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">
            {{ trans('global.edit') }} {{ trans('cruds.book.title_singular') }}
        </h6>
    </div>

    <div class="card-header">
        <a class="btn btn-success" href="{{ route('admin.books.index') }}">
            Back to Books
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.books.update', $book->id) }}" enctype="multipart/form-data" id="crudsBookForm">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.book.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $book->title) }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="isbn">{{ trans('cruds.book.fields.isbn') }}</label>
                <input class="form-control {{ $errors->has('isbn') ? 'is-invalid' : '' }}" type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn) }}">
                @if($errors->has('isbn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('isbn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="num_pages">{{ trans('cruds.book.fields.num_pages') }}</label>
                <input class="form-control {{ $errors->has('num_pages') ? 'is-invalid' : '' }}" type="text" name="num_pages" id="num_pages" value="{{ old('num_pages', $book->num_pages) }}">
                @if($errors->has('num_pages'))
                    <div class="invalid-feedback">
                        {{ $errors->first('num_pages') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.book.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantity" id="quantity" value="{{ old('quantity', $book->quantity) }}">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.book.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', $book->price) }}">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label class="required" for="edition">{{ trans('cruds.book.fields.edition') }}</label>
                <input class="form-control {{ $errors->has('edition') ? 'is-invalid' : '' }}" type="text" name="edition" id="edition" value="{{ old('edition', $book->edition) }}">
                @if($errors->has('edition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('edition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="date_published">{{ trans('cruds.book.fields.date_published') }}</label>
                <input class="form-control date {{ $errors->has('date_published') ? 'is-invalid' : '' }}" type="date" name="date_published" id="date_published" value="{{ old('date_published', $book->date_published) }}">
                @if($errors->has('date_published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="content">{{ trans('cruds.book.fields.content') }}</label>
                <textarea name="content" id="content" rows="3" class="form-control summernote {{ $errors->has('content') ? 'is-invalid' : '' }}">{!! old('content', $book->content) !!}</textarea>
                @if($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="description">{{ trans('cruds.book.fields.description') }}</label>
                <textarea name="description" id="description" rows="3" class="form-control summernote {{ $errors->has('description') ? 'is-invalid' : '' }}">{!! old('description', $book->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
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
                            <option value="{{ $author->id }}" {{ $book->authors->contains($author->id) ? 'selected' : '' }}>{{ $author->name }}</option>
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
                <label class="required" for="category">{{ trans('cruds.book.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                    <option
                        value="">-Select Category-</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                <label class="required" for="publisher">{{ trans('cruds.book.fields.publisher') }}</label>
                <select class="form-control select2 {{ $errors->has('publisher_id') ? 'is-invalid' : '' }}" name="publisher_id" id="publisher_id">
                        <option
                            value="">-Select Publisher-</option>
                    @foreach($publishers as $publisher)
                        <option value="{{ $publisher->id }}" {{ old('publisher_id', $book->publisher_id) == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
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
                    <option @if(old('condition', $book->condition) == '') selected @endif >
                        -Select Condition-
                    </option>
                    <option @if(old('condition', $book->condition) == 'Old') selected @endif >
                        Old
                    </option>
                    <option @if(old('condition', $book->condition) == 'New') selected @endif >
                        New
                    </option>
                </select>
                @if($errors->has('condition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('condition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label for="image">{{ trans('cruds.book.fields.image') }}</label>
                <input type="file" name="image" class="form-control" placeholder="image" value="{{ old('image', $book->image) }}">
                @if( $book->image )
                    <img src="/images/books/{{ old('image', $book->image) }}" width="300px">
                @endif
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    {{ __('Update') }}
                </button>
                <a class="btn btn-success" href="{{ route('admin.books.index') }}">
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