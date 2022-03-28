@extends('commons.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        Edit a {{ trans('cruds.book.title_singular') }}
    </div>

    <div class="card-header">
        <a class="btn btn-success" href="{{ route('admin.home') }}">
            Back to Books
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.books.update', $book->id) }}" enctype="multipart/form-data" id="crudsForm">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.book.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="isbn">{{ trans('cruds.book.fields.isbn') }}</label>
                <input class="form-control {{ $errors->has('isbn') ? 'is-invalid' : '' }}" type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn) }}" required>
                @if($errors->has('isbn'))
                    <div class="invalid-feedback">
                        {{ $errors->first('isbn') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="num_pages">Page's number</label>
                <input class="form-control {{ $errors->has('num_pages') ? 'is-invalid' : '' }}" type="text" name="num_pages" id="num_pages" value="{{ old('num_pages', $book->num_pages) }}" required>
                @if($errors->has('num_pages'))
                    <div class="invalid-feedback">
                        {{ $errors->first('num_pages') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label class="required" for="quantity">Quantity</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantity" id="quantity" value="{{ old('quantity', $book->quantity) }}" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label class="required" for="price">Price</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', $book->price) }}" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label class="required" for="edition">Edition</label>
                <input class="form-control {{ $errors->has('edition') ? 'is-invalid' : '' }}" type="text" name="edition" id="edition" value="{{ old('edition', $book->edition) }}" required>
                @if($errors->has('edition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('edition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="date_published">Date published</label>
                <input class="form-control date {{ $errors->has('date_published') ? 'is-invalid' : '' }}" type="date" name="date_published" id="date_published" value="{{ old('date_published', $book->date_published) }}" required>
                @if($errors->has('date_published'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_published') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="content">Content</label>
				<textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" rows="3">{{ old('content', $book->content) }}</textarea>
                @if($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.book.fields.description') }}</label>
				<textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" rows="3">{{ old('description', $book->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.book.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="category">{{ trans('cruds.category.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    <option
                        value="">-Select Category-</option>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id', $book->category_id) == $id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                <label class="required" for="publisher">Publisher</label>
                <select class="form-control select2 {{ $errors->has('publisher_id') ? 'is-invalid' : '' }}" name="publisher_id" id="publisher_id" required>
                        <option
                            value="">-Select Category-</option>
                    @foreach($publishers as $id => $publisher)
                        <option value="{{ $id }}" {{ old('publisher_id', $book->publisher_id) == $id ? 'selected' : '' }}>{{ $publisher->name }}</option>
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
                
                <select class="form-control select2 {{ $errors->has('condition') ? 'is-invalid' : '' }}" name="condition" id="condition" required>
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
                <button class="btn btn-danger" type="submit">
                    {{ __('Update') }}
                </button>
                <a class="btn btn-success" href="{{ route('admin.home') }}">
                    Back to Books
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/common/custom.js') }}"></script>
@endpush